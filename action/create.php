<?php
include '../config/database.php';
include '../validation.php'; 

if(isset($_POST['btnCreate'])) {

    $codeInput = $_POST['product_code'];
    $nameInput = $_POST['product_name'];
    $categorySelect = $_POST['category'];
    $unitSelect = $_POST['unit'];
    $priceInput = $_POST['price'];
    $stockInput = $_POST['stock'];
    $dateInput = $_POST['entry_date'];
    $description = $_POST['description'];

    $requestData = [
        'name' => $nameInput,
        'description' => $description
    ];

    $errors = validateCategory($koneksi, $requestData);

    if (!empty($errors)) {
        $firstError = reset($errors); 
        header("Location: ../index.php?status=error&pesan=" . urlencode($firstError));
        exit();
    }

    $sql = "INSERT INTO products(product_code, product_name, category, unit, price, stock, entry_date, description) VALUES ('$codeInput', '$nameInput', '$categorySelect', '$unitSelect', '$priceInput', '$stockInput', '$dateInput', '$description')";
    
    if(mysqli_query($koneksi, $sql)) {
        header("Location: ../index.php?status=success&pesan=Data tersimpan");
        exit();
    } else {
        echo "Data gagal tersimpan: " . mysqli_error($koneksi);
    }
}
?>