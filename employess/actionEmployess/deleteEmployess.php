<?php
include '../../config/database.php';

$id = $_GET['idDeleteEmployess'];
$sql = "DELETE FROM employees WHERE employee_id = '$id'";

if(mysqli_query($koneksi, $sql)) {
    header("Location: ../../index.php?status=success&pesan=" . urlencode("Data employes\es terhapus"));
    exit();
} else {
     echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>
