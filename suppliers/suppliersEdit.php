<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>koperasi_sekolah</title>
</head>
<body>
    <?php if (isset($_GET['pesan'])) { ?>
    <p style="color: <?php echo (($_GET['status'] ?? '') === 'error') ? 'red' : 'green'; ?>;">
        <?php echo htmlspecialchars($_GET['pesan']); ?>
    </p>
    <?php } ?>
    <?php
    include '../config/database.php';
    $id = $_GET['idEditSupplier'];
    $sql = "SELECT * FROM suppliers WHERE supplier_id = '$id'";
    $takeaway = mysqli_query($koneksi, $sql);
    $oldData = mysqli_fetch_assoc($takeaway);
    ?>

    <form action="actionSuppliers/updateSupplier.php" method="POST">
        <input type="hidden" name="supplier_id" value="<?php echo $oldData['supplier_id']?>">

        <label>Masukkan nama</label>
        <input type="text" name="supplier_name" value="<?php echo $oldData['supplier_name']?>">
        <br><br>

        <label>Masukkan email</label>
        <input type="text" name="email" value="<?php echo $oldData['email']?>">
        <br><br>

        <label>Masukkan nomor HP</label>
        <input type="number" name="phone" value="<?php echo $oldData['phone']?>">
        <br><br>
        
        <label>Address</label>
        <textarea name="address" id="address"><?php
        echo $oldData['address']?></textarea>
        <br><br>
        
        <label>Pilih tipe produk</label>
        <?php $array_tipe = array_map('trim', explode(',', $oldData['product_types']));?>
            <div>
                <input type="checkbox" id="indomaret" name="product_types[]" value="indomaret" <?php 
                if(in_array("indomaret", $array_tipe)) echo 'checked';?>>
                <label for="indomaret">indomaret</label>
            </div>
            <div>
                <input type="checkbox" id="alfamart" name="product_types[]" value="alfamart" <?php 
                if(in_array("alfamart", $array_tipe)) echo 'checked';?>>
                <label for="alfamart">alfamart</label>
            </div>

        <label>Masukkan tanggal</label>
        <input type="date" name="partnership_date" value="<?php
        echo $oldData['partnership_date']
        ?>"required>
        <br><br>

        <button type="submit" name="btnUpdateSupplier">Ubah</button>
    </form>
</body>
</html>
