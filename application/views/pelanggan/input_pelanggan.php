<form action="<?php echo base_url() ?>pelanggan/simpanpelanggan" class="FormPelanggan" method="POST">
	<div class="form-group mb-3">
        <input type="text" class="form-control" name="kodepelanggan" placeholder="Kode Pelanggan">
	</div>
	<div class="form-group mb-3">
        <input type="text" class="form-control" name="namapelanggan" placeholder="Nama Pelanggan">
	</div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="alamatpelanggan" placeholder="Alamat Pelanggan">
	</div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="nohp" placeholder="No HP">
	</div>
  <?php if($this->session->userdata('kode_cabang') =="PST") { ?>
	<div class="form-group mb-3">
	<select name="cabang" class="form-select">
		<option value="">Pilih Cabang</option>
        <?php foreach($cabang as $c) { ?>
            <option value="<?php echo $c->kode_cabang; ?>"><?php echo $c->nama_cabang; ?></option>
            <?php } ?>
	</select>
	</div>
  <?php } else { ?>
    <input type="hidden" value="<?php echo $this->session->userdata('kode_cabang'); ?>" name="cabang">
    <?php } ?>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

<script>
	$(function(){
		$('.FormPelanggan').bootstrapValidator({
      fields: {
        kodepelanggan: {
          message: 'Kode Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kode Pelanggan Harus Di Isi !'
            }
          }
         },
		 namapelanggan: {
          message: 'Nama Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Pelanggan Harus Di Isi !'
            }
          }
         },
		 alamatpelanggan: {
          message: 'Alamat Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Alamat Pelanggan Harus Di Isi !'
            }
          }
         },
         nohp: {
          message: 'No HP Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'No HP Pelanggan Harus Di Isi !'
            }
          }
         },
         cabang: {
          message: 'Cabang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Cabang Harus Di Isi !'
            }
          }
         },
	    }
    });
	});
</script>