<form method="POST" action="<?php echo base_url(); ?>penjualan/simpanbayar" id="formBayar">
<input type="hidden" value="<?php echo $no_faktur; ?>" name="no_faktur">
<input type="hidden" value="<?php echo $grandtotal; ?>" name="totalpenj" id="totalpenj">
<input type="hidden" value="<?php echo $totalbayar; ?>" name="totalbayar" id="totalbayar">
    <div class="input-icon mb-3">
        <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <rect x="4" y="5" width="16" height="16" rx="2" />
                <line x1="16" y1="3" x2="16" y2="7" />
                <line x1="8" y1="3" x2="8" y2="7" />
                <line x1="4" y1="11" x2="20" y2="11" />
                <line x1="11" y1="15" x2="12" y2="15" />
                <line x1="12" y1="15" x2="12" y2="18" />
            </svg>
        </span>
        <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="tglbayar" id="tglbayar" placeholder="Tanggal Bayar">
    </div>
    <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <i class="fa-solid fa-money-bill"></i>
        </span>
        <input type="text" style="text-align: right;" class="form-control" name="jmlbayar" id="jmlbayar" placeholder="Jumlah Bayar">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">BAYAR</button>
    </div>
</form>
<script>
    flatpickr(document.getElementById('tglbayar'), {});
</script>
<script>
    $(function() {
        $("#formBayar").submit(function() {
            var jmlbayar = $("#jmlbayar").val();
            var totalpenj = $("#totalpenj").val();
            var totalbayar = $("#totalbayar").val();
            var sisabayar = parseInt(totalpenj) - parseInt(totalbayar);
           // alert(totalpenj);
           // return false;
            if (jmlbayar == "" || jmlbayar == 0) {
                swal("Ups", "Jumlah Bayar Tidak Boleh Kosong", "warning");
                return false;
            } else if (parseInt(jmlbayar) > parseInt(sisabayar)) {
                swal("Ups", "Jumlah Bayar Tidak Boleh Melebihi Sisa Bayar, Sisa Bayar Anda Adalah " + sisabayar, "warning");
                return false;
            } else {
                return true;
            }
        });
    });
</script>