<?php
class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('Model_penjualan');
        $this->load->model('Model_pelanggan');
        $this->load->model('Model_barang');
        $this->load->model('Model_cabang');
    }
    function index($rowno = 0)
    {
        $no_faktur = "";
        $namapelanggan = "";
        $dari = "";
        $sampai = "";
        if(isset($_POST['submit'])) {
            $no_faktur = $this->input->post('no_faktur');
            $namapelanggan = $this->input->post('namapelanggan');
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $data = array(
                'no_faktur' => $no_faktur,
                'namapelanggan' => $namapelanggan,
                'dari' => $dari,
                'sampai' => $sampai
            );
            $this->session->set_userdata($data);
        } else {
            if ($this->session->userdata('no_faktur') != NULL) {
                $no_faktur = $this->session->userdata('no_faktur');
            }
            if ($this->session->userdata('namapelanggan') != NULL) {
                $namapelanggan = $this->session->userdata('namapelanggan');
            }
            if ($this->session->userdata('dari') != NULL) {
                $dari = $this->session->userdata('dari');
            }
            if ($this->session->userdata('sampai') != NULL) {
                $sampai = $this->session->userdata('sampai');
            }
        }
        $rowperpage = 2;
		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

        $jumlahdata     = $this->Model_penjualan->getDatapenjualanCount($no_faktur, $namapelanggan, $dari, $sampai)->num_rows();
		// Get records
		$datapenjualan = $this->Model_penjualan->getDatapenjualan($rowno, $rowperpage, $no_faktur, $namapelanggan, $dari, $sampai)->result();

    
        $config['base_url']         = base_url() . 'penjualan/index';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows']       = $jumlahdata;
        $config['per_page']         = $rowperpage;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // Initialize
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['penjualan'] = $datapenjualan;
        $data['row'] = $rowno;
        $data['no_faktur'] = $no_faktur;
        $data['namapelanggan'] = $namapelanggan;
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $this->template->load('template/template', 'penjualan/view_penjualan', $data);
    }

    function inputpenjualan()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $thn   = substr($tahun, 2, 2);
        $cabang = $this->session->userdata('kode_cabang');
        $getLastFaktur = $this->Model_penjualan->getLastFaktur($bulan, $tahun, $cabang)->row_array();
        $nomorterakhir = $getLastFaktur['no_faktur'];
        $no_faktur     = buatkode($nomorterakhir, $cabang . $bulan . $thn, 4);
        $data['no_faktur'] = $no_faktur;
        $data['pelanggan'] = $this->Model_pelanggan->getDataPelanggan()->result();
        $data['harga'] = $this->Model_barang->getDataHarga()->result();
        $this->template->load('template/template', 'penjualan/input_penjualan', $data);
    }

    function getJatuhtempo()
    {
        $tgltransaksi     = $this->input->post('tgltransaksi');
        $jatuhtempo       = date('Y-m-d', strtotime("+1 month", strtotime(date($tgltransaksi))));
        echo $jatuhtempo;
    }

    function cekBarang()
    {
        $jmldatabarang = $this->Model_penjualan->cekBarang()->num_rows();
        echo $jmldatabarang;
    }

    function simpanbarangtemp()
    {
       
        $kode_barang = $this->input->post('kode_barang');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');

        $cekbarangtemp = $this->Model_penjualan->cekBarangtemp($kode_barang, $id_user)->num_rows();
        if ($cekbarangtemp > 0) {
            echo "1";
        } else {
            $data = array (
                'kode_barang' => $kode_barang,
                'harga' => $harga,
                'qty' => $qty,
                'id_user' => $id_user
            );

            $simpan = $this->Model_penjualan->insertBarangtemp($data);
        }
    }

    function getDatabarangtemp()
    {
        $id_user = $this->input->post('id_user');
        $data['barangtemp'] = $this->Model_penjualan->getDatabarangtemp($id_user)->result();
        $this->load->view('penjualan/penjualan_detail_temp', $data);
    }

    function hapusBarangtemp()
    {
        $kode_barang = $this->input->post('kodebarang');
        $id_user = $this->input->post('iduser');
        $hapus = $this->Model_penjualan->deleteBarangtemp($kode_barang, $id_user);
        echo $hapus;
    }

    function simpanpenjualan()
    {
        $no_faktur = $this->input->post('no_faktur');
        $tgltransaksi = $this->input->post('tgltransaksi');
        $kode_pelanggan = $this->input->post('kode_pelanggan');
        $jenistransaksi = $this->input->post('jenistransaksi');
        $jatuhtempo = $this->input->post('jatuhtempo');
        $id_user = $this->input->post('id_user');
        $data = array(
            'no_faktur' => $no_faktur,
            'tgltransaksi' => $tgltransaksi,
            'kode_pelanggan' => $kode_pelanggan,
            'jenistransaksi' => $jenistransaksi,
            'jatuhtempo' => $jatuhtempo,
            'id_user' => $id_user
        );

        $simpan = $this->Model_penjualan->insertPenjualan($data, $jenistransaksi, $id_user, $no_faktur);
    }

    function hapuspenjualan()
    {
        $no_faktur = $this->uri->segment(3);
        $hapus = $this->Model_penjualan->deletePenjualan($no_faktur);
    }

    function cetakpenjualan()
    {
        $no_faktur = $this->uri->segment(3);
        $data['penjualan'] = $this->Model_penjualan->getPenjualan($no_faktur)->row_array();
        $data['detail'] = $this->Model_penjualan->getDetailpenjualan($no_faktur)->result();
        $this->load->view('penjualan/cetak_penjualan', $data);
    }

    function detailfaktur()
    {
        $no_faktur = $this->uri->segment(3);
        $data['penjualan'] = $this->Model_penjualan->getPenjualan($no_faktur)->row_array();
        $data['detail'] = $this->Model_penjualan->getDetailpenjualan($no_faktur)->result();
        $data['bayar'] = $this->Model_penjualan->getBayar($no_faktur)->result();
        $this->template->load('template/template', 'penjualan/detailfaktur', $data);
    }

    function inputbayar()
    {
        $data['no_faktur'] = $this->input->post('no_faktur');
        $data['grandtotal'] = $this->input->post('grandtotal');
        $data['totalbayar'] = $this->input->post('totalbayar');
        $this->load->view('penjualan/input_bayar', $data);
    }

    function simpanbayar()
    {
        $this->Model_penjualan->insertBayar();
    }

    function hapusbayar()
    {
        $nobukti = $this->uri->segment(3);
        $no_faktur = $this->uri->segment(4);
        $this->Model_penjualan->deleteBayar($nobukti, $no_faktur);
    }

    function laporanpenjualan()
    {
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
        $this->template->load('template/template', 'penjualan/frm_laporanpenjualan', $data);
    }

    function cetaklaporanpenjualan()
    {
        $cabang = $this->input->post('cabang');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['cabang'] = $cabang;
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['laporanpnj'] = $this->Model_penjualan->getLaporanpenjualan($cabang, $dari, $sampai)->result();
        if (isset($_POST['export'])) {
            // Fungsi header dengan mengirimkan raw data excel
      header("Content-type: application/vnd-ms-excel");

            // Mendefinisikan nama file ekspor "hasil-export.xls"
      header("Content-Disposition: attachment; filename=Laporan Penjualan.xls");
        }
        $this->load->view('penjualan/cetak_laporanpenjualan', $data);
    }
}