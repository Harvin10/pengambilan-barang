<?php 
    require 'functions.php';

    $nama = getArray($conn, "SELECT nama FROM barang");
    $warna = getArray($conn, "SELECT warna FROM warna");
    $jenis = getArray($conn, "SELECT jenis FROM jenis");
    $pengambil = getArray($conn2, "SELECT pengambil FROM pekerja");

    if( isset($_GET["submit"]) ) {
        $valueNama = $_GET["nama"];
        $valueWarna = $_GET["warna"];
        $valueJenis = $_GET["jenis"];
        $valuePengambil = $_GET["pengambil"];
        
        $jumlah = $_GET["jumlah"];

        $id_barang = getForeign($conn, "SELECT id FROM pemersatu WHERE (id_nama IN (SELECT id FROM barang WHERE nama = '$valueNama') AND id_warna IN (SELECT id FROM warna WHERE warna = '$valueWarna') AND id_jenis IN (SELECT id FROM jenis WHERE jenis = '$valueJenis'))");

        $id_pengambil = getForeign($conn2, "SELECT id FROM pekerja WHERE pengambil = '$valuePengambil'");

        $harga = getForeign($conn, "SELECT harga FROM pemersatu WHERE id = '$id_barang[0]'");

        addDeleteUpdate($conn2, "INSERT INTO barang_diambil VALUE ('', CURRENT_TIMESTAMP(), '$id_barang[0]', '$jumlah', '$id_pengambil[0]', $harga[0])"); 

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
    <form action="">
        <label for="nama">
            Nama barang:
            <select type="text" name="nama" id="nama">
                <?php foreach ($nama as $n) :?>
                    <option value="<?= $n[0] ?>"><?= $n[0] ?></option>
                <?php endforeach;?>
            </select>
        </label>

        <label for="warna">
            Warna:
            <select type="text" name="warna" id="warna">
                <?php foreach ($warna as $w) :?>
                    <option value="<?= $w[0] ?>"><?= $w[0] ?></option>
                <?php endforeach;?>
            </select>
        </label>

        <label for="jenis">
            Jenis:
            <select type="text" name="jenis" id="jenis">
                <?php foreach ($jenis as $j) :?>
                    <option value="<?= $j[0] ?>"><?= $j[0] ?></option>
                <?php endforeach;?>
            </select>
        </label>

        <label>
            Jumlah:
            <input type="number" name="jumlah">
        </label>

        <label>
            Pengambil Barang: 
            <select type="text" name="pengambil" id="pengambil">
                <?php foreach ($pengambil as $p) :?>
                    <option value="<?= $p[0] ?>"><?= $p[0] ?></option>
                <?php endforeach;?>
            </select>
        </label>

        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>