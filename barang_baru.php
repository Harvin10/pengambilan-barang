<?php
    require 'functions.php';
    
    if( isset($_GET["submit"]) ) {
        $nama = $_GET['nama'];
        $warna = $_GET['warna'];
        $jenis = $_GET['jenis'];
        $harga = $_GET['harga'];

        addItem("INSERT INTO nama_barang VALUES ('', '$nama', '$warna', '$jenis', '$harga')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">kembali ke menu</a>
    <form action="" method="GET">
        <label>
            Nama:
            <input type="text" name="nama">
        </label>
        <label>
            Warna:
            <input type="text" name="warna">
        </label>
        <label>
            Jenis:
            <input type="text" name="jenis">
        </label>
        <label>
            Harga:
            <input type="number" name="harga">
        </label>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

