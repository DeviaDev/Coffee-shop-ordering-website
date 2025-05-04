
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kedai Kopi Kenangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    

  </head>

  <body style="height: 3000px;">


  
<!-- HEADER -->
<?php
include "admin_header.php";
?>
<!-- END HEADER -->




<!-- SIDEBAR -->
<?php
include "admin_sidebar.php";
?>
<!-- END SIDEBAR -->





<!-- CONTENT -->
        <div class="col-lg-9 mt-3">
        <div class="card">
  <div class="card-header">
    Admin List
  </div>

  <div class="card-body">
    <?php 
	    // cek apakah yang mengakses halaman ini sudah login
	    if($_SESSION['jabatan']==""){
		    header("location:dashboard.php?pesan=gagal");
	    }
	?>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM order_menu");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped mt-3'>
                      


                    <!-- MEMBUAT DATABASE TABLE -->
                    <tr>
                    <th>ID Order</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>



                    <!-- BUAT MANGGIL VALUE DATABASE TABLE NYA -->
                    <tr>
                        <td><?php echo $row['id_order_menu']; ?></td>
                        <td><?php echo $row['nama_menu']; ?></td>
                        <td><?php echo number_format($row['harga'], 2, ',', '.'); ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                        <td><?php echo number_format($row['harga'] * $row['jumlah'], 2, ',', '.'); ?></td>
                        <td>
                            <a href="generate_invoice.php?id=<?php echo $row['id_order_menu']; ?>" class="btn btn-primary btn-sm">
                                Download Invoice
                            </a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>

                </div>
            </div>     
        </div>

    
  </div>
</div>
        </div>
<!-- END CONTENT -->

    </div>
    <div class="fixed-bottom text-center" style="background-color:rgb(255, 202, 104)" >
    Copyright 2025, Kedai Kopi Kenangan
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
      const { jsPDF } = window.jspdf;

      const nama_pelanggan = localStorage.getItem('nama_pelanggan') || "Guest";
      const kode_meja= localStorage.getItem('kode_meja') || "N/A";
      const order = JSON.parse(localStorage.getItem('order')) || [];

      document.getElementById('nama_pelanggan').textContent = nama_pelanggan;
      document.getElementById('kode_meja').textContent = kode_meja;

      const tableBody = document.getElementById('invoice-table');
      const totalPriceElement = document.getElementById('total-price');
      let total = 0;

      tableBody.innerHTML = "";
      order.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${item.name}</td>
          <td>${item.quantity}</td>
          <td>Rp ${item.price.toLocaleString()}</td>
          <td>Rp ${(item.price * item.quantity).toLocaleString()}</td>
        `;
        tableBody.appendChild(row);
        total += item.price * item.quantity;
      });

      totalPriceElement.textContent = `Total: Rp ${total.toLocaleString()}`;

      document.getElementById('download-invoice').addEventListener('click', function () {
        const doc = new jsPDF();

        doc.setFontSize(18);
        doc.text("Invoice - Kedai Kopi Menghapus Kenanganmu", 20, 20);

        doc.setFontSize(12);
        doc.text(`Nama Pelanggan: ${nama_pelanggan}`, 20, 30);
        doc.text(`Nomor Meja: ${Kode_meja}`, 20, 40);

        let y = 50;
        doc.text("-------------------------------------------------", 20, y);
        y += 10;

        order.forEach(item => {
          doc.text(`${item.name} (${item.quantity}x) - Rp ${item.price * item.quantity}`, 20, y);
          y += 10;
        });

        doc.text("-------------------------------------------------", 20, y);
        y += 10;
        doc.text(`Total: Rp ${total.toLocaleString()}`, 20, y);

        doc.save(`Invoice_${nama_pelanggan}.pdf`);
      });
    });

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

  </script>
  
  </body>
</html>