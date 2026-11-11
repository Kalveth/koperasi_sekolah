<?php
include '../../config/database.php';

if(isset($_POST['btnCreateSupplier'])) {
    $supplierName    = $_POST['supplier_name'];
    $emailInput      = $_POST['email'];
    $phoneInput      = $_POST['phone'];
    $addressInput    = $_POST['address'];
    $productTypes    = $_POST['product_types'];
    $partnershipDate = $_POST['partnership_date'];

    $checkbox = $_POST['product_types'] ?? [];
    $productTypes = implode(", ", $checkbox);

    $sql = "INSERT INTO suppliers (supplier_name, email, phone, address, product_types, partnership_date) VALUES ('$supplierName', '$emailInput', '$phoneInput', '$addressInput', '$productTypes', '$partnershipDate')";
    
    if(mysqli_query($koneksi, $sql)) {
        header("Location: ../../index.php?status=success&pesan=" . urlencode("Data supplier tersimpan"));
        exit();
    } else {
        echo "Data gagal tersimpan: " . mysqli_error($koneksi);
    }
}
?>
