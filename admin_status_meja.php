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
    Status Meja
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
                        <a href="create2.php" class="btn btn-success pull-right">Add New Table</a>
                    </div>
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM status_meja");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped mt-3'>
                      


                    <!-- MEMBUAT DATABASE TABLE -->
                      <tr>
                        <td>id_status_meja</td>
                        <td>kode_meja</td>
                        <td>status_meja</td>
                        <td>Action</td>
                      </tr>

                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>



                    <!-- BUAT MANGGIL VALUE DATABASE TABLE NYA -->
                    <tr>
                        <td><?php echo $row["id_status_meja"]; ?></td>

                        <td><?php echo $row["kode_meja"]; ?></td>

                        <td><?php echo $row["status_meja"]; ?></td>




                    <!-- UPDATE UPDATE -->
                        <td><a href="update2.php?id_status_meja=<?php echo $row["id_status_meja"]; ?>" title='Update Record'><span><i class="bi bi-pencil"></i></span></a>

                    
                    
                    <!-- DELETE RECORD -->
                        <a href="delete2.php?id_status_meja=<?php echo $row["id_status_meja"]; ?>" title='Delete Record'><span><i class="bi bi-trash"></i></span></a>
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
<!-- END CONTENT -->

    </div>
    <div class="fixed-bottom text-center" style="background-color:rgb(255, 202, 104)" >
    Copyright 2025, Kedai Kopi Kenangan
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>