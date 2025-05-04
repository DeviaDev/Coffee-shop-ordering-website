<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pelanggan = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
    $kode_meja = mysqli_real_escape_string($conn, $_POST['kode_meja']);

    // Debugging sebelum query dijalankan
    echo "Nama Pelanggan: $nama_pelanggan <br>";
    echo "Kode Meja: $kode_meja <br>";

    // Query INSERT pelanggan
    $insertQuery = "INSERT INTO pelanggan (nama_pelanggan, kode_meja) VALUES ('$nama_pelanggan', '$kode_meja')";
    

    // Query UPDATE status_meja
    $updateQuery = "UPDATE status_meja SET status_meja = 'Penuh' WHERE kode_meja = '$kode_meja'"; 
    
}
?>
