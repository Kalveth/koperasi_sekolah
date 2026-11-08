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
    $sql = "SELECT * FROM products";
    $takeaway = mysqli_query($koneksi, $sql);
    ?>
    
    <table border='1' cellpadding="5">
        <tr>
            <th>id</th>
            <th>kode</th>
            <th>nama</th>
            <th>kategori</th>
            <th>unit</th>
            <th>harga</th>
            <th>stok</th>
            <th>tanggal</th>
            <th>deskripsi</th>
        </tr>
        <?php
        while($name = mysqli_fetch_assoc($takeaway)) {?>
        <tr>
            <td><?php echo $name['product_id']?></td>
            <td><?php echo $name['product_code']?></td>
            <td><?php echo $name['product_name']?></td>
            <td><?php echo $name['category']?></td>
            <td><?php echo $name['unit']?></td>
            <td><?php echo $name['price']?></td>
            <td><?php echo $name['stock']?></td>
            <td><?php echo $name['entry_date']?></td>
            <td>
                <?php
                if($name['description'] == '') {
                    echo "Null";
                }?>
                <?php echo $name['description']?>
            </td>
        </tr>
        <?php } ?>
    </table>

    <form action="action/create.php" method="POST">
        <label>Masukkan kode</label>
        <input type="text" name="product_code" required>
        <br><br>

        <label>Masukkan nama</label>
        <input type="text" name="product_name" required>
        <br><br>

        <label>Pilih kategori</label>
        <select name="category" id="category">
            <option value="food">Food</option>
            <option value="drink">Drink</option>
            <option value="Stationery">Stationery</option>
            <option value="Uniform">Uniform</option>
        </select>
        <br><br>

        <label>Pilih unit</label>
            <div>
                <input type="radio" id="pcs" name="unit" value="pcs">
                <label for="pcs">Pcs</label>
            </div>
            <div>
                <input type="radio" id="pack" name="unit" value="pack">
                <label for="pack">Pack</label>
            </div>
            <div>
                <input type="radio" id="bottle" name="unit" value="bottle">
                <label for="bottle">Bottle</label>
            </div>
        <br><br>

        <label>Masukkan harga</label>
        <input type="number" name="price" required>
        <br><br>

        <label>Masukkan stock</label>
        <input type="number" name="stock" required>
        <br><br>

        <label>Masukkan tanggal</label>
        <input type="date" name="entry_date" required>
        <br><br>

        <label>Deskripsi</label>
        <textarea name="description" id="description"></textarea>
        <br><br>

        <button type="submit" name="btnSimpan">Simpan</button>
    </form>
</body>
</html>
