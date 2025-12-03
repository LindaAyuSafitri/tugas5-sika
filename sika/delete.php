<?php
include 'config.php';

$nim = $_GET['nim'];

$query_select = "SELECT gambar FROM mahasiswa WHERE nim='$nim'";
$result = mysqli_query($conn, $query_select);
$data = mysqli_fetch_assoc($result);
$query = "DELETE FROM mahasiswa WHERE nim='$nim'";

if (mysqli_query($conn, $query)) {
    if ($data['gambar'] != ' ') {
        unlink('gambar/' . $data['gambar']);
    }
    echo "<script>alert('Data berhasil dihapus!'); window.location.href='index.php';</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>