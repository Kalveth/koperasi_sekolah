<?php
include '../config/database.php';

if(isset($_POST['btnUbah'])) {
    $productId = $_POST['product_id'];
    $codeInput = $_POST['product_code'];
    $nameInput = $_POST['product_name'];
    $categorySelect = $_POST['category'];
    $unitSelect = $_POST['unit'];
    $priceInput = $_POST['price'];
    $stockInput = $_POST['stock'];
    $dateInput = $_POST['entry_date'];
    $description = $_POST['description'];
    
    $sql = "UPDATE products
    SET product_code = '$codeInput', product_name = '$nameInput', category = '$categorySelect', unit = '$unitSelect', price = '$priceInput', stock = '$stockInput', entry_date = '$dateInput', description = '$description'
    WHERE product_id = '$productId'"; 
    
    if(mysqli_query($koneksi, $sql)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Data gagal berubah: " . mysqli_error($koneksi);
    }
}
?>