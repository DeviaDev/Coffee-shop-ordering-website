<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE menu set nama_menu='" . $_POST['nama_menu'] . "' , gambar='" . $_POST['gambar'] . "' ,deskripsi='" . $_POST['deskripsi'] . "', kategori='" . $_POST['kategori'] . "',  harga='" . $_POST['harga']. "' WHERE id_menu='" . $_POST['id_menu'] . "'");
     
     header("location: admin_menu.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM menu WHERE id_menu='" . $_GET['id_menu'] . "'");
    $row= mysqli_fetch_array($result);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                            <label>id_menu</label>
                            <input type="text" name="id_menu" class="form-control" value="<?php echo $row["id_menu"]; ?>" maxlength="100" required="">
                        </div>

                        <div class="form-group ">
                            <label>gambar</label>
                            <input type="file" name="gambar" class="form-control" value="<?php echo $row["gambar"]; ?>" maxlength="100" required="">
                        </div>

                        <div class="form-group ">
                            <label>nama_menu</label>
                            <input type="text" name="nama_menu" class="form-control" value="<?php echo $row["nama_menu"]; ?>" maxlength="200" required="">
                        </div>


                        <div class="form-group">
                            <label>deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" value="<?php echo $row["deskripsi"]; ?>" maxlength="200"required="">
                        </div>

                        <div class="form-group">
                            <label>kategori</label>
                            <input type="text" name="kategori" class="form-control" value="<?php echo $row["kategori"]; ?>" maxlength="200"required="">
                        </div>

                        <div class="form-group">
                            <label>harga</label>
                            <input type="text" name="harga" class="form-control" value="<?php echo $row["harga"]; ?>" maxlength="200"required="">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin_menu.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>