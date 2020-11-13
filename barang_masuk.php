<?php
    require 'functions.php';

    $nama = getArray($conn, "SELECT nama FROM barang");
    $warna = getArray($conn, "SELECT warna FROM warna");
    $jenis = getArray($conn, "SELECT jenis FROM jenis");
    $supplier = getArray($conn3, "SELECT Nama FROM supplier");
    
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
            <input type="text" name="nama" list="nama">
            <datalist id="nama">
                <?php foreach ($nama as $n) : ?>
                    <option value="<?= $n[0]; ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </label>
        <label>
            Warna:
            <input type="text" name="warna" list="warna">
            <datalist id="warna">
                <?php foreach ($warna as $w) : ?>
                    <option value="<?= $w[0]; ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </label>
        <label>
            Jenis:
            <input type="text" name="jenis" list="jenis">
            <datalist id="jenis">
                <?php foreach($jenis as $j) : ?>
                    <option value="<?= $j[0]; ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </label>
        <label>
            Supplier:
            <input type="text" name="supplier">
            <datalist id="supplier">
                <?php foreach($supplier as $s) : ?>
                    <option value="<?= $s[0] ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </label>
        <label>
            Harga:
            <input type="number" name="harga">
        </label>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

