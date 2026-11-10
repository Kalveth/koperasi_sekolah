<?php

require_once __DIR__ . "../config/database.php";
require_once __DIR__ . "../validation.php";


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

    return $errors;
}
?>
