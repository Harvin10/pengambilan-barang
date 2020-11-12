<?php 
    require 'functions.php';

    $datas = getArray($conn2, "SELECT * FROM pengambilan_barang.barang_diambil LEFT JOIN barang.pemersatu ON barang_diambil.id_barang = pemersatu.id (LEFT JOIN barang.barang ON pemersatu = barang.id) AND (LEFT JOIN barang.warna ON pemersatu)");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Warna Barang</th>
            <th>Jenis Barang</th>
            <th>Harga Barang</th>
            <th>Jumlah Barang</th>
            <th>Pengambil Barang</th>
        </tr>
        <?php for($i = 0; $i < count($datas); $i++) : ?>
            <tr>
                <?php for($j = 1; $j < count($datas[$i]); $j++) : ?>
                    <td>
                        <?= $datas[$i][$j] ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>