<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>koperasi_sekolah</title>
</head>
<body>
<h1>Products</h1>
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
            <th>Edit</th>
            <th>Hapus</th>
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
            <td>
                <a href="indexEdit.php?idEdit=<?php echo $name['product_id']?>">Here</a>
            </td>
            <td>
                <a href="action/delete.php?idDelete=<?php echo $name['product_id']?>" onclick="return confirm('Yakin?')">Here</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <form action="action/create.php" method="POST">
        <label>Masukkan kode</label>
        <input type="text" name="product_code">
        <br><br>

        <label>Masukkan nama</label>
        <input type="text" name="product_name">
        <br><br>

        <label>Pilih kategori</label>
        <select name="category" id="category">
            <option value="food">Food</option>
            <option value="drink">Drink</option>
            <option value="stationery">Stationery</option>
            <option value="uniform">Uniform</option>
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
        <input type="number" name="price">
        <br><br>

        <label>Masukkan stock</label>
        <input type="number" name="stock">
        <br><br>

        <label>Masukkan tanggal</label>
        <input type="date" name="entry_date">
        <br><br>

        <label>Deskripsi</label>
        <textarea name="description" id="description"></textarea>
        <br><br>

        <button type="submit" name="btnCreate">Simpan</button>
    </form>

    <h1>Suppliers</h1>
        <?php
        $sqlSupplier = "SELECT * FROM suppliers";
        $takeaway = mysqli_query($koneksi, $sqlSupplier);
        ?>
        
        <table border='1' cellpadding="5">
            <tr>
                <th>id</th>
                <th>nama</th>
                <th>email</th>
                <th>nomor telepon</th>
                <th>alamat</th>
                <th>tipe produk</th>
                <th>tanggal</th>
                <th>edit</th>
                <th>hapus</th>
            </tr>
            <?php
            while($name = mysqli_fetch_assoc($takeaway)) {?>
            <tr>
                <td><?php echo $name['supplier_id']?></td>
                <td><?php echo $name['supplier_name']?></td>
                <td><?php echo $name['email']?></td>
                <td><?php echo $name['phone']?></td>
                <td><?php echo $name['address']?></td>
                <td><?php echo $name['product_types'];?></td>
                <td><?php echo $name['partnership_date']?></td>
                <td>
                    <a href="suppliers/suppliersEdit.php?idEditSupplier=<?php echo $name['supplier_id']?>">Here</a>
                </td>
                <td>
                    <a href="suppliers/actionSuppliers/deleteSupplier.php?idDeleteSupplier=<?php echo $name['supplier_id']?>" onclick="return confirm('Yakin?')">Here</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    
        <form action="suppliers/actionSuppliers/createSupplier.php" method="POST">
            <label>Masukkan nama</label>
            <input type="text" name="supplier_name">
            <br><br>
    
            <label>Masukkan email</label>
            <input type="text" name="email">
            <br><br>
    
            <label>Masukkan nomor HP</label>
            <input type="number" name="phone">
            <br><br>
            
            <label>Address</label>
            <textarea name="address" id="address"></textarea>
            <br><br>
    
            <label>Pilih tipe produk</label>
            <br><br>
            <input type="checkbox" name="product_types[]" value="indomaret">
            <label for="indomaret">Indomaret</label>
            <br><br>
            <input type="checkbox" name="product_types[]" value="alfamart">
            <label for="alfamart">Alfamart</label>
            <br><br>
    
            <label>Masukkan tanggal</label>
            <input type="date" name="partnership_date">
            <br><br>
    
            <button type="submit" name="btnCreateSupplier">Simpan</button>
        </form>


    <h1>Employess</h1>
        <?php
        $sqlEmployess = "SELECT * FROM employees";
        $takeaway = mysqli_query($koneksi, $sqlEmployess);
        ?>
        
        <table border='1' cellpadding="5">
            <tr>
                <th>id</th>
                <th>nomor</th>
                <th>nama</th>
                <th>gender</th>
                <th>tanggal ulang tahun</th>
                <th>posisi</th>
                <th>gaji</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            <?php
            while($name = mysqli_fetch_assoc($takeaway)) {?>
            <tr>
                <td><?php echo $name['employee_id']?></td>
                <td><?php echo $name['employee_number']?></td>
                <td><?php echo $name['full_name']?></td>
                <td><?php echo $name['gender']?></td>
                <td><?php echo $name['birth_date']?></td>
                <td><?php echo $name['position'];?></td>
                <td><?php echo $name['salary']?></td>
                <td>
                    <a href="employess/employessEdit.php?idEditEmployess=<?php echo $name['employee_id']?>">Here</a>
                </td>
                <td>
                    <a href="employess/actionEmployess/deleteEmployess.php?idDeleteEmployess=<?php echo $name['employee_id']?>" onclick="return confirm('Yakin?')">Here</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    
        <form action="employess/actionEmployess/createEmployess.php" method="POST">
            <label>Masukkan Nomor Pegawai</label>
            <br><br>
            <input type="text" name="employee_number">
            <br><br>

            <label>Masukkan Nama Lengkap</label>
            <br><br>
            <input type="text" name="full_name">
            <br><br>

            <label>Pilih Gender</label>
            <br><br>
            <input type="radio" name="gender" value="M" id="laki"> 
            <label for="laki">Laki-laki</label>
            <input type="radio" name="gender" value="F" id="perempuan"> 
            <label for="perempuan">Perempuan</label>
            <br><br>

            <label>Masukkan Tanggal Ulang Tahun</label>
            <br><br>
            <input type="date" name="birth_date">
            <br><br>

            <label>Pilih Posisi</label>
            <br><br>
            <select name="position" id="position">
                <option value="cashier">kasir</option>
                <option value="warehouseStaff">staf gudang</option>
                <option value="admin">admin</option>
            </select>
            <br><br>

            <label>Masukkan Gaji</label>
            <br><br>
            <input type="number" name="salary">
            <br><br>
    
            <button type="submit" name="btnCreateEmployee">Simpan</button>
        </form>
    </body>
</html>
