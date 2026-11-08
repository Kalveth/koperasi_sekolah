<?php
include '../config/database.php';

if(isset($_POST['btnSimpan'])) {
    $codeInput = $_POST['product_code'];
    $nameInput = $_POST['product_name'];
    $categorySelect = $_POST['category'];
    $unitSelect = $_POST['unit'];
    $priceInput = $_POST['price'];
    $stockInput = $_POST['stock'];
    $dateInput = $_POST['entry_date'];
    $description = $_POST['description'];
    $sql = "INSERT INTO products(product_code, product_name, category, unit, price, stock, entry_date, description) VALUES ('$codeInput', '$nameInput', '$categorySelect', '$unitSelect', '$priceInput', '$stockInput', '$dateInput', '$description')";
    
    if(mysqli_query($koneksi, $sql)) {
        echo "Data tersimpan";
    } else {
        echo "Data gagal tersimpan: " . mysqli_error($koneksi);
    }
}
?>