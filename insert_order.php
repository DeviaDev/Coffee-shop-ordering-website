<?php
header("Content-Type: application/json");
$conn = new mysqli("localhost", "root", "", "UAS_DATABASE");

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Koneksi database gagal."]));
}

// Ambil data JSON dari request
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['order'])) {
    echo json_encode(["success" => false, "message" => "Data pesanan tidak ditemukan."]);
    exit();
}

$orderData = json_decode($data['order'], true); // Ubah ke array PHP

// Simpan ke database
foreach ($orderData as $item) {
    $nama = $conn->real_escape_string($item['nama']);
    $jumlah = intval($item['jumlah']);
    $harga = floatval($item['harga']);
    $total = $jumlah * $harga;

    $query = "INSERT INTO order_menu (nama, jumlah, harga, total) VALUES ('$nama', '$jumlah', '$harga', '$total')";
    if (!$conn->query($query)) {
        echo json_encode(["success" => false, "message" => "Gagal menyimpan pesanan."]);
        exit();
    }
}

echo json_encode(["success" => true, "message" => "Pesanan berhasil disimpan."]);
$conn->close();
?>
