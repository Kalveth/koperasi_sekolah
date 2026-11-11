<?php
include '../../config/database.php';

$id = $_GET['idDeleteSupplier'];
$sql = "DELETE FROM suppliers WHERE supplier_id = '$id'";

if(mysqli_query($koneksi, $sql)) {
    header("Location: ../../index.php?status=success&pesan=" . urlencode("Data supplier terhapus"));
    exit();
} else {
     echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>
