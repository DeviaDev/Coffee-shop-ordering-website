


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice - Coffee Shop</title>
  <link rel="stylesheet" href="user_invoice.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
  
 

  <div class="container">
    <div class="invoice-summary">
    <h1>Confirm Order success <i class="bi bi-check-circle"></i></h1>
      <h2>Kedai Kopi Kenangan</h2>
      <br>
      


      <?php
include "connection.php";
    // Cek apakah data dikirim menggunakan metode POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari form
        $nama_pelanggan = isset($_POST['nama_pelanggan']) ? htmlspecialchars($_POST['nama_pelanggan']) : 'Tidak diketahui';
        $kode_meja = isset($_POST['kode_meja']) ? htmlspecialchars($_POST['kode_meja']) : 'Tidak diketahui';
    } else {
        $nama_pelanggan = 'Tidak ada data';
        $kode_meja = 'Tidak ada data';
    }
    ?>


      
      <div class="boxx">
      <p>Nama Pelanggan: <?= $nama_pelanggan; ?></p>
      <p>Kode Meja: <?= $kode_meja; ?></p>
      </div>






      <br>
      <br>

      <div class="box">
      <p>"Pesananmu sudah tercatat. Silakan menuju kasir untuk pembayaran, dan pesananmu akan segera diproses."</p>
      </div>




      <?php 

  
  if (isset($_POST['confirm_payment'])) {
      $id_pelanggan = $_SESSION['id_pelanggan']; // Simpan ID pelanggan dari session login
      $kode_meja = $_SESSION['kode_meja']; // Simpan kode meja dari session login
  }
  
  ?>
  
      <br>
      <br>
      <br>
      <!-- <a class="confirm" href="proses_pesan.php" class="back-btn"> CONFIRM PAYMENT</a> -->

      



    </div>
  </div>

  


</body>
</html>
