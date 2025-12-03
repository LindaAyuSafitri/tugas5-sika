<?php
function uploadGambar() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    
    if ($error === 4) {
        return 'default.jpg';
    }
    
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>alert('Yang anda upload bukan gambar!');</script>";
        return false;
    }
    
    if ($ukuranFile > 2000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }
    
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
    
    move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);
    
    return $namaFileBaru;
}
?>