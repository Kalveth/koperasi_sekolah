<?php
include '../../config/database.php';

if(isset($_POST['btnCreateEmployee'])) {
    $employeeNumber = $_POST['employee_number'];
    $fullName = $_POST['full_name'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birth_date'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (employee_number, full_name, gender, birth_date, position, salary) 
            VALUES ('$employeeNumber', '$fullName', '$gender', '$birthDate', '$position', '$salary')";
    
    
    if(mysqli_query($koneksi, $sql)) {
        header("Location: ../../index.php?status=success&pesan=" . urlencode("Data employees tersimpan"));
        exit();
    } else {
        echo "Data gagal tersimpan: " . mysqli_error($koneksi);
    }
}
?>
