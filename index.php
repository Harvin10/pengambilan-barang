<?php 
    require 'functions.php';

    $nama = getArray("SELECT nama FROM barang");
    $warna = getArray("SELECT warna FROM warna");
    $jenis = getArray("SELECT jenis from jenis");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="barang_baru.php">Tambah barang baru</a>
    <form action="">
        <label for="nama">Nama barang:
            <select type="text" name="nama" id="nama">
                <?php foreach ($nama as $n) :?>
                    <option value="<?= $n[0] ?>"><?= $n[0] ?></option>
                <?php endforeach;?>
            </select>
        </label>

        <label for="warna">Warna:
            <select type="text" name="warna" id="warna">
                <?php foreach ($warna as $w) :?>
                    <option value="<?= $w[0] ?>"><?= $w[0] ?></option>
                <?php endforeach;?>
            </select>
        </label>

        <label for="jenis">Jenis:
            <select type="text" name="jenis" id="jenis">
                <?php foreach ($jenis as $j) :?>
                    <option value="<?= $j[0] ?>"><?= $j[0] ?></option>
                <?php endforeach;?>
            </select>
        </label>
        <button type="submit">submit</button>
    </form>
</body>
</html>