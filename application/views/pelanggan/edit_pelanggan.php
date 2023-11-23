<form action="<?php echo base_url() ?>pelanggan/updatepelanggan" class="FormPelanggan" method="POST">
	<div class="form-group mb-3">
        <input type="text" value="<?php echo $pelanggan['kode_pelanggan']; ?>" readonly class="form-control" name="kodepelanggan" placeholder="Kode Pelanggan">
	</div>
	<div class="form-group mb-3">
        <input type="text" value="<?php echo $pelanggan['nama_pelanggan']; ?>" class="form-control" name="namapelanggan" placeholder="Nama Pelanggan">
	</div>
    <div class="form-group mb-3">
        <input type="text" value="<?php echo $pelanggan['alamat_pelanggan']; ?>" class="form-control" name="alamatpelanggan" placeholder="Alamat Pelanggan">
	</div>
    <div class="form-group mb-3">
        <input type="text" value="<?php echo $pelanggan['no_hp']; ?>" class="form-control" name="nohp" placeholder="No HP">
	</div>
	<div class="form-group mb-3">
	<select name="cabang" class="form-select">
		<option value="">Pilih Cabang</option>
        <?php foreach($cabang as $c) { ?>
            <option <?php if ($pelanggan['kode_cabang'] == $c->kode_cabang) {
                echo "selected"; 
            } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo $c->nama_cabang; ?></option>
            <?php } ?>
	</select>
	</div>
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