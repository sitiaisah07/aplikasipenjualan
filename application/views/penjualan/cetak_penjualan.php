<style>
    table{
        font-family: Arial;
    }
</style>

<table style="font-weight: bold; font-size: 20">
    <tr style="text-align: center">
        <td>Qistina Batik</td>
    </tr>
</table>
    <table style="font-weight: bold; font-size: 16">
        <tr style="text-align: center">
            <td>Menjual Macam-Macam Batik </td>
        </tr>
    <table style="font-weight: bold; font-size: 14">
        <tr>
            <td align="left">Thamrin City</td>
        </tr><br>
        <tr>
            <td align="left">Lt. 1 Blok A16 No.1,Lt. 1 Blok G 32 No.5</td>
        </tr>
        <tr>
            <td align="left">0857 1963 0076, 0812 8179 9978</td>
        </tr>
        <tr>
            <td align="left">Tanah Abang Jakarta Pusat</td>
        </tr>
    </table>
<center>
    <h4 style="font-family: Arial;">FAKTUR PENJUALAN</h4>
<table style="width: 100%;">
    <tr>
        <td>
            <table border="0">
                <tr>
                    <td>No Faktur</td>
                    <td>:</td>
                    <td><?php echo $penjualan['no_faktur']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?php echo $penjualan['tgltransaksi']; ?></td>
                </tr>
            </table>
        </td>
        <td style="width: 30%;"></td>
        <td>
        <table border="0">
                <tr>
                    <td>Kode Pelanggan</td>
                    <td>:</td>
                    <td><?php echo $penjualan['kode_pelanggan']; ?></td>
                </tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td><?php echo $penjualan['nama_pelanggan']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Pelanggan</td>
                    <td>:</td>
                    <td><?php echo $penjualan['alamat_pelanggan']; ?></td>
                </tr>
            </table>
        </td>
        </td>
    </tr>
</table>
<br>
<br>
<table style="width: 100%; border-collapse: collapse;" border="1">
<tr style="font-weight: bold; text-align: center">
    <td>NO</td>
    <td>KODE BARANG</td>
    <td>NAMA BARANG</td>
    <td>HARGA</td>
    <td>QTY</td>
    <td>SUBTOTAL</td>
</tr>
    <?php $no = 1; 
    $total = 0;
    foreach($detail as $d){ 
        $totalharga = $d->qty * $d->harga;
        $total = $total + $totalharga;
        ?>
        <tr>
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $d->kode_barang; ?></td>
            <td align="center"><?php echo $d->nama_barang; ?></td>
            <td align="right"><?php echo number_format($d->harga, '0', '', '.'); ?></td>
            <td align="center"><?php echo $d->qty; ?></td>
            <td align="right"><?php echo number_format($totalharga, '0', '', '.'); ?></td>
        </tr>
        <?php $no++;
    } ?>
    <tr style="font-weight: bold; font-size: 16">
        <td colspan="5">TOTAL</td>
        <td align="right"><?php echo number_format($total, '0', '', '.'); ?></td>
    </tr>
    <tr style="font-size: 16; font-weight:bold">
        <td colspan="6">
            <i><?php echo ucwords(terbilang($total)); ?></i>
        </td>
    </tr>
</table>
</center>