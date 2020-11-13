<?php
    require 'functions.php';
    
    if( isset($_GET["submit"]) ) {
        $nama = $_GET['nama'];
        $warna = $_GET['warna'];
        $jenis = $_GET['jenis'];
        $harga = $_GET['harga'];

        if(getForeign($conn, "SELECT nama FROM barang WHERE nama = '$nama'") == false) {
            addDeleteUpdate($conn, "INSERT INTO barang VALUES ('', '$nama')");
        }

        if(getForeign($conn, "SELECT warna FROM warna WHERE warna = '$warna'") == false) {
            addDeleteUpdate($conn, "INSERT INTO warna VALUES ('', '$warna')");
        }
        if(getForeign($conn, "SELECT jenis FROM jenis WHERE jenis = '$jenis'") == false) {
            addDeleteUpdate($conn, "INSERT INTO jenis VALUES ('', '$jenis')");
        }

        $id_nama = getForeign($conn, "SELECT id FROM barang WHERE nama = '$nama' LIMIT 1");
        $id_warna = getForeign($conn, "SELECT id FROM warna WHERE warna = '$warna' LIMIT 1");
        $id_jenis = getForeign($conn, "SELECT id FROM jenis WHERE jenis = '$jenis' LIMIT 1");

        if($id_barang = getForeign($conn, "SELECT id FROM pemersatu WHERE id_nama = '$id_nama[0]' AND id_warna = '$id_warna[0]' AND id_jenis = '$id_jenis[0]'")) {
            addDeleteUpdate($conn, "UPDATE pemersatu SET harga = '$harga' WHERE id = '$id_barang[0]'");
        }
        else {
            addDeleteUpdate($conn, "INSERT INTO pemersatu VALUES ('$id_nama[0]', '$id_warna[0]', '$id_jenis[0]', '$harga')");
        }
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
    <a href="index.php">Kembali ke Menu</a>
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

