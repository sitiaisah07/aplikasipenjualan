<form action="<?php echo base_url() ?>cabang/simpancabang" class="FormCabang" method="POST">
	<div class="form-group mb-3">
        <input type="text" class="form-control" name="kodecabang" placeholder="Kode Cabang">
	</div>
	<div class="form-group mb-3">
        <input type="text" class="form-control" name="namacabang" placeholder="Nama Cabang">
	</div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="alamatcabang" placeholder="Alamat Cabang">
	</div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="telepon" placeholder="Telepon">
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

<script>
	$(function(){
		$('.FormCabang').bootstrapValidator({
      fields: {
        kodecabang: {
          message: 'Kode Cabang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kode Cabang Harus Di Isi !'
            }
          }
         },
		 namacabang: {
          message: 'Nama Cabang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Cabang Harus Di Isi !'
            }
          }
         },
		 alamatcabang: {
          message: 'Alamat Cabang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Alamat Cabang Harus Di Isi !'
            }
          }
         },
         telepon: {
          message: 'Telepon Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Telepon Harus Di Isi !'
            }
          }
         },
	    }
    });
	});
</script>