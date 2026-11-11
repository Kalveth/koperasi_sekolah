<?php

function getCategoryRequest($request) 
{
    return [
        'id' => trim(htmlspecialchars($request['id'] ?? '')), 
        'name' => trim(htmlspecialchars($request['name'] ?? '')), 
        'description' => trim(htmlspecialchars($request['description'] ?? ''))
    ];
}

function isCategoryNameTaken($koneksi, $name, $ignoreId = 0) {
    $sql = "SELECT * FROM products WHERE product_name = '$name' AND product_id != '$ignoreId'";
    $query = mysqli_query($koneksi, $sql);
    return mysqli_num_rows($query) > 0;
}

function isProductCodeTaken($koneksi, $code, $ignoreId = 0) {
    $sql = "SELECT * FROM products WHERE product_code = '$code' AND product_id != '$ignoreId'";
    $query = mysqli_query($koneksi, $sql);
    return mysqli_num_rows($query) > 0;
}

function validateCategory($koneksi, $request, $ignoreId = 0)
{
    $errors = []; 

    if ($request['name'] === '') {
        $errors['name'] = "Nama kategori wajib diisi";
    } elseif (mb_strlen($request['name']) > 50) {
        $errors['name'] = "Nama kategori maksimal 50 karakter";
    } elseif (isCategoryNameTaken($koneksi, $request['name'], $ignoreId)) {
        $errors['name'] = "Nama kategori sudah ada";
    }

    if (mb_strlen($request['description']) > 200) {
        $errors['description'] = "Deskripsi maksimal 200 karakter";
    }

    if (isProductCodeTaken($koneksi, $request['code'], $ignoreId)) {
        $errors['code'] = "Kode produk sudah dipakai";
    }

    if ($request['unit'] < 0) {
        $errors['unit'] = "Harga tidak boleh negatif";
    }

    if ($request['price'] < 0) {
        $errors['price'] = "Harga tidak boleh negatif";
    }

    if ($request['stock'] < 0) {
        $errors['stock'] = "Stok tidak boleh negatif";
    }
    
    return $errors;
}
?>