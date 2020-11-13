<?php 
    require 'functions.php';

    if( isset($_GET["submit"]) ) {
        $remove = $_GET["pengambil"];

        delete($conn2, "DELETE FROM pekerja WHERE pengambil = '$remove'");
    }

    $pengambil = getArray($conn2, "SELECT pengambil FROM pekerja");
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
   <form action="">
        <label>
            Nama:
            <select type="text" name="pengambil">
                <?php foreach ($pengambil as $p) : ?>
                    <option value="<?= $p[0] ?>"><?= $p[0] ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="submit" name="submit" value="true">Remove</button>
   </form>
</body>
</html>