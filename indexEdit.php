<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>koperasi_sekolah</title>
</head>
<body>
    <?php
    include 'config/database.php';
    $id = $_GET['idEdit'];
    $sql = "SELECT * FROM products WHERE product_id = '$id'";
    $takeaway = mysqli_query($koneksi, $sql);
    $oldData = mysqli_fetch_assoc($takeaway);
    ?>
    <form action="action/update.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $oldData['product_id']?>">

        <label>Masukkan kode</label>
        <input type="text" name="product_code" value="<?php
        echo $oldData['product_code']
        ?>"required>
        <br><br>

        <label>Masukkan nama</label>
        <input type="text" name="product_name" value="<?php
        echo $oldData['product_name']
        ?>"required>
        <br><br>

        <label>Pilih kategori</label>
        <select name="category" id="category">
            <option value="food" <?php 
            if($oldData['category'] === "food") echo 'selected';?>>Food</option>
            
            <option value="drink" <?php 
            if($oldData['category'] === "drink") echo 'selected';?>>Drink</option>

            <option value="stationery" <?php 
            if($oldData['category'] === "stationery") echo 'selected';?>>Stationery</option>

            <option value="uniform" <?php 
            if($oldData['category'] === "uniform") echo 'selected';?>>Uniform</option>
        </select>
        <br><br>

        <label>Pilih unit</label>
            <div>
                <input type="radio" id="pcs" name="unit" value="pcs" <?php 
                if($oldData['unit'] === "pcs") echo 'checked';?>>
                <label for="pcs">Pcs</label>
            </div>
            <div>
                <input type="radio" id="pack" name="unit" value="pack" <?php 
                if($oldData['unit'] === "pack") echo 'checked';?>>
                <label for="pack">Pack</label>
            </div>
            <div>
                <input type="radio" id="bottle" name="unit" value="bottle" <?php 
                if($oldData['unit'] === "bottle") echo 'checked';?>>
                <label for="bottle">Bottle</label>
            </div>
        <br><br>

        <label>Masukkan harga</label>
        <input type="number" name="price" value="<?php
        echo $oldData['price']
        ?>"required>
        <br><br>

        <label>Masukkan stock</label>
        <input type="number" name="stock" value="<?php
        echo $oldData['stock']
        ?>"required>
        <br><br>

        <label>Masukkan tanggal</label>
        <input type="date" name="entry_date" value="<?php
        echo $oldData['entry_date']
        ?>"required>
        <br><br>

        <label>Deskripsi</label>
        <textarea name="description" id="description"><?php
        echo $oldData['description']
        ?></textarea>
        <br><br>

        <button type="submit" name="btnUbah">Ubah</button>
    </form>
</body>
</html>
