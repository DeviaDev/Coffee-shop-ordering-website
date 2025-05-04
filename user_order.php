<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order - Coffee Shop</title>
  <link rel="stylesheet" href="./user_order.css">
</head>
<body>

  <div class="container">
    <div class="order-summary">
    <h1>Pesananmu</h1>
    <form method="POST" action="confirm_order.php"> 
      <table>
        <thead>
          <tr >
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody id="order-table">
        </tbody>
      </table>
      
      <div class="total" id="total-price">Total: Rp 0</div>

      </form>

      <div>

      <br>
    <br>

      <ul>
      <a href="user_menu.php">Lihat Menu Kembali</a>
      </ul>
     
     <ul>
      <button class="confirm" id="confirm-payment" >CONFIRM ORDER</button>
      </ul>



      </div>

      
    </div>
  </div>

  <?php 
  session_start();
  include "connection.php"; // Koneksi ke database
  
  if (isset($_POST['confirm_payment'])) {
      $id_pelanggan = $_SESSION['id_pelanggan']; // Simpan ID pelanggan dari session login
      $kode_meja = $_SESSION['kode_meja']; // Simpan kode meja dari session login
      $total_harga = 0;
  
      foreach ($_SESSION['cart'] as $item) {
          $id_menu = $item['id_menu'];
          $jumlah = $item['jumlah'];
          $total = $item['total'];
          $total_harga += $total;
  
          // Masukkan pesanan ke database order_menu
          $query = "INSERT INTO order_menu (id_order_menu, nama_menu, jumlah, Total) 
                    VALUES ('$id_order_menu', '$nama_menu', '$jumlah', '$Total')";
          mysqli_query($conn, $query);
      }
  
      // Simpan data invoice
      $query_invoice = "INSERT INTO invoice (id_invoice, id_order_menu, Date, nama_pemesan, sub_total, ket_bayar, kode_meja) 
                        VALUES ('$id_invoice', '$id_order_menu','$Date','$nama_pemesan','$sub_total','$ket_bayar', kode_meja NOW())";
      mysqli_query($koneksi, $query_invoice);
  
      // Hapus session cart setelah data masuk ke database
      unset($_SESSION['cart']);
  
      header("Location: user_invoice.php");
      exit();
  }
  
  ?>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Ambil pesanan dari localStorage (kalau ada), jika tidak ada, buat array kosong
      let order = JSON.parse(localStorage.getItem('order')) || [];

      // Fungsi untuk memperbarui tampilan tabel pesanan
      function updateOrderTable() {
        const tableBody = document.getElementById('order-table');
        const totalPriceElement = document.getElementById('total-price');

        tableBody.innerHTML = ''; // Kosongkan tabel sebelum update
        let total = 0;

        order.forEach((item, index) => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${item.name}</td>
            <td>
              <div class="quantity-controls">
                <button onclick="changeQuantity(${index}, -1)">-</button>
                <span>${item.quantity}</span>
                <button onclick="changeQuantity(${index}, 1)">+</button>
              </div>
            </td>
            <td>Rp ${item.price.toLocaleString()}</td>
            <td>Rp ${(item.price * item.quantity).toLocaleString()}</td>
          `;
          tableBody.appendChild(row);
          total += item.price * item.quantity;
        });

        totalPriceElement.textContent = `Total: Rp ${total.toLocaleString()}`;
      }

      // Fungsi untuk mengubah jumlah pesanan
      window.changeQuantity = function (index, change) {
        if (order[index]) {
          order[index].quantity += change;
          if (order[index].quantity <= 0) {
            order.splice(index, 1); // Hapus item jika jumlahnya 0 atau kurang
          }
          localStorage.setItem('order', JSON.stringify(order));
          updateOrderTable();
        }
      };
      


      

      function confirmPayment() {
    let table = document.querySelector("table"); // Ambil elemen tabel
    let rows = table.getElementsByTagName("tr"); // Ambil semua baris dalam tabel

    if (rows.length <= 1) { // Jika hanya header tabel yang ada
        alert("Keranjang Anda kosong, silakan pesan terlebih dahulu.");
        return; // Hentikan eksekusi
    }

    alert("Redirecting to Invoice page...");
    sessionStorage.setItem('order', localStorage.getItem('order')); // Simpan di sessionStorage
    localStorage.removeItem('order'); // Hapus dari localStorage
    window.location.href = 'user_invoice.php';
}

// Tambahkan event listener ke tombol confirm payment
document.getElementById('confirm-payment').addEventListener('click', confirmPayment);




      // Event listener untuk tombol konfirmasi pembayaran
      document.getElementById('confirm-payment').addEventListener('click', confirmPayment);

      // Update tampilan saat halaman dimuat
      updateOrderTable();
    });
  </script>


</body>
</html>
