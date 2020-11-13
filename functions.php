<?php
    $conn = mysqli_connect("localhost", "root", "", "barang");
    $conn2 = mysqli_connect("localhost", "root", "", "pengambilan_barang");
    $conn3 = mysqli_connect("localhost", "root", "", "barang_masuk");

    function getArray($conn, $query) {
        $table = mysqli_query($conn, $query);
        $array = [];
        while($data = mysqli_fetch_row($table)) {
            $array[] = $data;
        }
        return $array;
    }

    function addDeleteUpdate($conn, $query) {
        mysqli_query($conn, $query);
    }

    function getForeign($conn, $query) {
        $table = mysqli_query($conn, $query);
        $data = [];
        $data = mysqli_fetch_row($table);
        return $data;
    }

?>