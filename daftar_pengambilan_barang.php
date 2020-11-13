<?php 
    require 'functions.php';

    $datas = getArray($conn2, "SELECT tanggal, nama , warna, jenis, barang_diambil.harga, jumlah, pengambil FROM pengambilan_barang.barang_diambil, pengambilan_barang.pekerja, barang.pemersatu, barang.barang, barang.warna, barang.jenis WHERE barang_diambil.id_barang = pemersatu.id AND pemersatu.id_nama = barang.id AND pemersatu.id_warna = warna.id AND pemersatu.id_jenis = jenis.id AND barang_diambil.id_pekerja = pekerja.id");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Kembali Ke Menu</a>
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
        <?php foreach ($datas as $data) : ?>
            <tr>
                <?php foreach ($data as $d) : ?>
                    <td>
                        <?= $d ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>