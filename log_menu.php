<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    

  </head>

  <body style="height: 3000px;">


  
<!-- HEADER -->
<?php
include "admin_header.php";
?>
<!-- END HEADER -->





<!-- CONTENT -->
        <div class="col-lg-11 mt-3" style="padding:5px 30px 0 150px">
        <div class="card">
  <div class="card-header">
    LOG MENU
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
                    <div class="page-header clearfix">
                        
                        <a href="admin_menu.php" class="btn btn-dark pull-left"><i class="bi bi-box-arrow-left"></i></a>
                
                      
                    </div>
                    <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM log_menu");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {

                    ?>
                      <table class='table table-bordered table-striped mt-3'>
                      


                    <!-- MEMBUAT DATABASE TABLE -->
                     <tr>
                        <td>id_log</td>
                        <td>id_menu</td>
                        <td>nama_menu</td>
                        <td>deskripsi</td>
                        <td>kategori</td>
                        <td>harga</td>
                        <td>aksi</td>
                        <td>waktu</td>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["id_log"]; ?></td>
                        <td><?php echo $row["id_menu"]; ?></td>
                        <td><?php echo $row["nama_menu"]; ?></td>
                        <td><?php echo $row["deskripsi"]; ?></td>
                        <td><?php echo $row["kategori"]; ?></td>
                        <td><?php echo $row["harga"]; ?></td>
                        <td><?php echo $row["aksi"]; ?></td>
                        <td><?php echo $row["waktu"]; ?></td>
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
  </body>
</html>