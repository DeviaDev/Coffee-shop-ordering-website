<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $harga * $jumlah;

    $sql = "INSERT INTO order_menu (id_pelanggan, nama_menu, harga, jumlah, total) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isddi", $id_pelanggan, $nama_menu, $harga, $jumlah, $total);

    if ($stmt->execute()) {
        header("Location: user_invoice.php"); // Redirect ke halaman sukses
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
