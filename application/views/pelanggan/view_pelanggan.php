<h2 class="page-title">
	Data Pelanggan
</h2>
<div class="row-mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<a href="#" class="btn btn-primary mb-3" id="tambahpelanggan">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none" />
						<line x1="12" y1="5" x2="12" y2="19" />
						<line x1="5" y1="12" x2="19" y2="12" />
					</svg>
					Tambah Data
				</a>
				<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
				<table class="table table-striped table-boerdered" id="tabelpelanggan">
					<thead>
						<tr>
							<th>NO</th>
							<th>KODE PELANGGAN</th>
							<th>NAMA PELANGGAN</th>
                            <th>ALAMAT PELANGGAN</th>
							<th>NO HP</th>
							<th>CABANG</th>
                            <th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $no = 1;
                            foreach ($pelanggan as $p) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $p->kode_pelanggan; ?></td>
                                <td><?php echo $p->nama_pelanggan; ?></td>
                                <td><?php echo $p->alamat_pelanggan; ?></td>
                                <td><?php echo $p->no_hp; ?></td>
                                <td><?php echo $p->nama_cabang; ?></td>
                                <td>
                                <a href="#" data-kodepelanggan="<?php echo $p->kode_pelanggan; ?>" class="btn btn-sm btn-primary edit">
								<li class="fa-solid fa-pen-to-square" style="font-size: 1rem;"></li></a>
									<a href="#" data-href="<?php echo base_url(); ?>pelanggan/hapuspelanggan/<?php echo $p->kode_pelanggan; ?>" class="btn btn-sm btn-danger hapus">
									<li class="fa-solid fa-trash-can" style="font-size: 1rem;"></li></a>
                                </td>
                            </tr>
                        <?php 
                            $no++; 
                        } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal modal-blur fade" id="modalpelanggan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Pelanggan</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
			<div id="loadforminputpelanggan"></div>
          </div>
        </div>
      </div>
 </div>
 <div class="modal modal-blur fade" id="modaleditpelanggan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Pelanggan</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
			<div id="loadformeditpelanggan"></div>
          </div>
        </div>
      </div>
 </div>
 <div class="modal modal-blur fade" id="modalhapuspelanggan" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Anda Yakin Hapus Data Ini?</div>
      <div>Jika DiHapus Maka Anda Akan Kehilangan Data Ini</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
    <a href="#" id="hapuspelanggan" class="btn btn-danger">Ya, Hapus</a>
    </div>
  </div>
</div>
</div>
	<script>
		$(function() {
			$("#tambahpelanggan").click(function() {
				$("#modalpelanggan").modal("show");
				$("#loadforminputpelanggan").load("<?php echo base_url(); ?>pelanggan/inputpelanggan");
			});

			$(".edit").click(function() {
				var kodepelanggan = $(this).attr("data-kodepelanggan");
				$("#modaleditpelanggan").modal("show");
				$("#loadformeditpelanggan").load("<?php echo base_url(); ?>pelanggan/editpelanggan/"+ kodepelanggan);
			})
			$(".hapus").click(function() {
				var href = $(this).attr("data-href");
				$("#modalhapuspelanggan").modal("show");
				$("#hapuspelanggan").attr("href", href);
			});
			$('#tabelpelanggan').DataTable();
		});
	</script>