<?php
    $conn = mysqli_connect("localhost", "root", "", "pengambilan barang");

    function getArray($query) {
        global $conn;
        $table = mysqli_query($conn, $query);
        $array = [];
        while($data = mysqli_fetch_row($table)) {
            $array[] = $data;
        }
        return $array;
    }

    function add($query) {
        global $conn;
        mysqli_query($conn, $query);
    }

    function getForeign($query) {
        global $conn;
        $table = mysqli_query($conn, $query);
        $data = [];
        $data = mysqli_fetch_row($table);
        return $data;
    }
?>