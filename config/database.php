<?php
$host = "localhost";
$username = "root";
$passowrd = "";
$database = "db_cooperative";

$koneksi = mysqli_connect($host, $username, $passowrd, $database);

if(!$koneksi){
    die("Koneksi gagal:" . mysqli_connect_error());
}
?>