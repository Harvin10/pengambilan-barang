<?php
    require 'functions.php';
    
    if( isset($_GET["submit"]) ) {
        $nama = $_GET['nama'];

        add($conn2, "INSERT INTO pekerja VALUES ('', '$nama')");
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
        
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

