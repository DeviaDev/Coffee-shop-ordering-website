<?php
require_once "connection.php";

if(isset($_POST['save']))
{    
    // Menu
     $id_menu = $_POST['id_menu'];
     $gambar = $_POST['gambar'];
     $nama_menu = $_POST['nama_menu'];
     $deskripsi = $_POST['deskripsi'];
     $kategori= $_POST['kategori'];
     $harga = $_POST['harga'];


     $sql = "INSERT INTO menu (id_menu,gambar,nama_menu,deskripsi,kategori,harga) values ('$id_menu','$gambar','$nama_menu','$deskripsi',' $kategori','$harga')";

     if (mysqli_query($conn, $sql)) {
        header("location: admin_menu.php");
        exit();
     } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
     }
     mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add menu record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group">
                            <label>id_menu</label>
                            <input type="text" name="id_menu" class="form-control" value="" maxlength="50" required="">
                        </div>

                        <div class="form-group">
                            <label>gambar</label>
                            <input type="file" name="gambar" class="form-control" value="" maxlength="100" required="">
                        </div>

                        <div class="form-group ">
                            <label>nama_menu</label>
                            <input type="text" name="nama_menu" class="form-control" value="" maxlength="100" required="">
                        </div>

                        <div class="form-group">
                            <label>deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" value="" maxlength="200" required="">
                        </div>

                        <div class="form-group">
                            <label>kategori</label>
                            <input type="text" name="kategori" class="form-control" value="" maxlength="200" required="">
                        </div>

                        <div class="form-group">
                            <label>harga</label>
                            <input type="text" name="harga" class="form-control" value="" maxlength="200" required="">
                        </div>

                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="admin_list.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
