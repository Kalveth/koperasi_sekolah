<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>koperasi_sekolah</title>
</head>
<body>
    <?php
    include '../config/database.php';
    $id = $_GET['idEditEmployess'];
    $sql = "SELECT * FROM employees";
    $takeaway = mysqli_query($koneksi, $sql);
    $oldData = mysqli_fetch_assoc($takeaway);
    ?>

    <form action="actionEmployess/updateEmployess.php" method="POST">
        <input type="hidden" name="employee_id" value="<?php echo $oldData['employee_id']?>">

        <label>Masukkan Nomor Pegawai</label>
        <input type="number" name="employee_number" value="<?php echo $oldData['employee_number']?>">
        <br><br>

        <label>Masukkan Nama Lengkap</label>
        <input type="text" name="full_name" value="<?php echo $oldData['full_name']?>">
        <br><br>

        <label>Pilih Gender</label><br>
        <input type="radio" name="gender" value="M" id="laki" <?php if($oldData['gender'] == 'M') echo 'checked'; ?>> 
        <label for="l">Laki-laki</label>
        <input type="radio" name="gender" value="F" id="perempuan" <?php if($oldData['gender'] == 'F') echo 'checked'; ?>> 
        <label for="p">Perempuan</label>
        <br><br>

        <label>Masukkan Tanggal Ulang Tahun</label>
        <input type="date" name="birth_date" value="<?php echo $oldData['birth_date']?>">
        <br><br>

        <label>Masukkan Posisi</label>
        <?php $array_tipe = explode(", ", $oldData['position']);?>
            <select name="position" id="position">
                <option value="Cashier" <?php 
            if($oldData['position'] === "Cashier") echo 'selected';?>>kasir</option>
                <option value="Warehouse Staff" <?php 
            if($oldData['position'] === "Warehouse Staff") echo 'selected';?>>staf gudang</option>
                <option value="Admin" <?php 
            if($oldData['position'] === "Admin") echo 'selected';?>>admin</option>
            </select>
        <br><br>

        <label>Masukkan Gaji</label>
        <input type="number" name="salary" value="<?php echo $oldData['salary']?>">
        <br><br>

        <button type="submit" name="btnUpdateEmployess">Ubah</button>
</body>
</html>
