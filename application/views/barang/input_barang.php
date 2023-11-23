<form action="<?php echo base_url() ?>barang/simpanbarang" class="formBarang" method="POST">
	<div class="form-group mb-3">
        <input type="text" class="form-control" name="kodebarang" placeholder="Kode Barang">
	</div>
	<div class="form-group mb-3">
        <input type="text" class="form-control" name="namabarang" placeholder="Nama Barang">
	</div>
	<div class="form-group mb-3">
	<select name="satuan" class="form-select">
		<option value="">Satuan</option>
		<option value="seragaman">seragaman</option>
		<option value="grosir">grosir</option>
	</select>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

<script>
	$(function(){
		$('.formBarang').bootstrapValidator({
      fields: {
        kodebarang: {
          message: 'Kode Barang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kode Barang Harus Di Isi !'
            }
          }
         },
		 namabarang: {
          message: 'Nama Barang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Barang Harus Di Isi !'
            }
          }
         },
		 satuan: {
          message: 'Satuan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Satuan Harus Di Isi !'
            }
          }
         },
	    }
    });
	});
</script>