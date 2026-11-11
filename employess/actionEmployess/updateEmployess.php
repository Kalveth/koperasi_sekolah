<?php
include '../../config/database.php';

if(isset($_POST['btnUpdateEmployess'])) {
    $employeeId     = $_POST['employee_id'];
    $employeeNumber = $_POST['employee_number'];
    $fullName       = $_POST['full_name'];
    $gender         = $_POST['gender'];
    $birthDate      = $_POST['birth_date'];
    $position       = $_POST['position'];
    $salary         = $_POST['salary'];

    $sql = "UPDATE employees SET 
            employee_number = '$employeeNumber', 
            full_name       = '$fullName', 
            gender          = '$gender', 
            birth_date      = '$birthDate', 
            position        = '$position', 
            salary          = '$salary'
            WHERE employee_id = '$employeeId'";
    
    if(mysqli_query($koneksi, $sql)) {
        header("Location: ../../index.php?status=success&pesan=" . urlencode("Data employess terubah"));
        exit();
    } else {
        echo "Data gagal berubah: " . mysqli_error($koneksi);
    }
}
?>
