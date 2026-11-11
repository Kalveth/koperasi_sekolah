<?php
include '../../config/database.php';

if(isset($_POST['btnUpdateSupplier'])) {
    $supplierId      = $_POST['supplier_id'];
    $supplierName    = $_POST['supplier_name'];
    $emailInput      = $_POST['email'];
    $phoneInput      = $_POST['phone'];
    $addressInput    = $_POST['address'];
    $productTypes    = $_POST['product_types'];
    $partnershipDate = $_POST['partnership_date'];

    $checkboxTipe = $_POST['product_types'] ?? [];
    $productTypes = implode(", ", $checkboxTipe);
    
    $sql = "UPDATE suppliers SET 
            supplier_name    = '$supplierName', 
            email            = '$emailInput', 
            phone            = '$phoneInput', 
            address          = '$addressInput', 
            product_types    = '$productTypes', 
            partnership_date = '$partnershipDate'
            WHERE supplier_id = '$supplierId'"; 
    
    if(mysqli_query($koneksi, $sql)) {
        header("Location: ../../index.php?status=success&pesan=" . urlencode("Data supplier terubah"));
        exit();
    } else {
        echo "Data gagal berubah: " . mysqli_error($koneksi);
    }
}
?>
