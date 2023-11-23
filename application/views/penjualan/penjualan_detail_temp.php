<?php $no = 1; 
$totalpenjualan = 0;
foreach ($barangtemp as $brg) {
    $totalpenjualan = $totalpenjualan + $brg->total;
    ?>
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $brg->kode_barang; ?></td>
    <td><?php echo $brg->nama_barang; ?></td>
    <td align="right"><?php echo number_format($brg->harga, '0', '', '.'); ?></td>
    <td><?php echo $brg->qty; ?></td>
    <td align="right"><?php echo number_format($brg->total, '0', '', '.'); ?></td>
    <td>
        <a href="#" class="btn btn-danger btn-sm hapus" data-kodebarang="<?php echo $brg->kode_barang; ?>" data-iduser="<?php echo $brg->id_user; ?>">
            <li class="fa-solid fa-trash-can" style="font-size: 1rem;"></li>
        </a>

    </td>
</tr>
<?php 
    $no++;
 } ?>
 
    <tr>
        <th colspan="5">GRAND TOTAL</th>
        <th style="text-align:right">
        <p id="grandtotal"><?php echo number_format($totalpenjualan, '0', '', '.'); ?></p></th>
        <th></th>
    </tr>

 <script>
     $(function() {
        function loaddatabarang() {
            var id_user = $("#id_user").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>penjualan/getDatabarangtemp',
                data: {
                    id_user: id_user
                },
                cache: false,
                success: function(respond) {
                   $("#loaddatabarang").html(respond); 
                }
            });
        }

        function loadgrandtotal() {
            var grandtotal = $("#grandtotal").text();
            $("#totalpenjualan").text(grandtotal);
        }
        loadgrandtotal();
        $(".hapus").click(function() {
            var kodebarang = $(this).attr("data-kodebarang");
            var iduser = $(this).attr("data-iduser");
            $.ajax({
                type : 'POST',
                url:'<?php echo base_url(); ?>penjualan/hapusBarangtemp',
                data: {
                    kodebarang: kodebarang,
                    iduser: iduser
                },
                cache : false,
                success : function(respond) {
                    if(respond==1) {
                        swal("Delete", "Data Berhasil Dihapus", "success");
                        loaddatabarang();
                    }
                }
            });
        });
     });
 </script>