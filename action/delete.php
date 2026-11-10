<?php
include '../config/database.php';

$id = $_GET['idDelete'];
$sql = "DELETE FROM products WHERE product_id = '$id'";

if(mysqli_query($koneksi, $sql)) {
    header("Location: ../index.php?status=success&pesan=Data terhapus");
    exit();
} else {
     echo "Data gagal berubah: " . mysqli_error($koneksi);
}

?>