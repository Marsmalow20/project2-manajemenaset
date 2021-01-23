<?php
    session_start();

    $host = 'localhost';
    $dbname = 'aset_perusahaan';
    $username = 'root';
    $password = '';

    header("Access-Control-Allow-Origin: *");
    $con = mysqli_connect($host, $username, $password, $dbname) or die ('Could not connect database');
?>