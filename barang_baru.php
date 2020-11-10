<?php
    require 'functions.php';
    
    if( isset($_GET["submit"]) ) {
        $nama = $_GET['nama'];
        $warna = $_GET['warna'];
        $jenis = $_GET['jenis'];
        $harga = $_GET['harga'];

        if(getForeign("SELECT nama FROM barang WHERE nama = '$nama'") == false) {
            add("INSERT INTO barang VALUES ('', '$nama')");
        }
        if(getForeign("SELECT warna FROM warna WHERE warna = '$warna'") == false) {
            add("INSERT INTO warna VALUES ('', '$warna')");
        }
        if(getForeign("SELECT jenis FROM jenis WHERE jenis = '$jenis'") == false) {
            add("INSERT INTO jenis VALUES ('', '$jenis')");
        }

        $id_nama = getForeign("SELECT id FROM barang WHERE nama = '$nama' LIMIT 1");
        $id_warna = getForeign("SELECT id FROM warna WHERE warna = '$warna' LIMIT 1");
        $id_jenis = getForeign("SELECT id FROM jenis WHERE jenis = '$jenis' LIMIT 1");

        add("INSERT INTO pemersatu VALUES ('$id_nama[0]', '$id_warna[0]', '$id_jenis[0]', '$harga')");
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

