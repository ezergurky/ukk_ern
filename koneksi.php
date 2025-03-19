<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ukk_ern";

    $koneksi = mysqli_connect($host, $username, $password, $dbname);
    if(!$koneksi) die("Koneksi ke database mengalami kegagalan, Error: " . mysqli_connect_error());
?>