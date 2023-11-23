<form action="<?php echo base_url() ?>barang/updatebarang" class="FormBarang" method="POST">
	<div class="form-group mb-3">
        <input type="text" readonly value="<?php echo $barang['kode_barang']; ?>" class="form-control" name="kodebarang" placeholder="Kode Barang">
	</div>
	<div class="form-group mb-3">
        <input type="text" value="<?php echo $barang['nama_barang']; ?>" class="form-control" name="namabarang" placeholder="Nama Barang">
	</div>
	<div class="form-group mb-3">
	<select name="satuan" class="form-select">
		<option value="">Satuan</option>
		<option <?php if($barang['satuan'] == "seragaman") {
            echo "selected";
            } ?> value="seragaman">Seragaman</option>
        <option <?php if($barang['satuan'] == "grosir") {
            echo "selected";
            } ?> value="grosir">Grosir</option>    
	</select>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary w-100">Update</button>
	</div>
</form>

<script>
	$(function(){
		$('.FormBarang').bootstrapValidator({
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