<?php
require_once "connection.php";


if(isset($_POST['save']))
{    
    //  Admin
     $id_status_meja = $_POST['id_status_meja'];
     $kode_meja= $_POST['kode_meja'];
     $status_meja= $_POST['status_meja'];


     $sql1 = "INSERT INTO status_meja (id_status_meja,kode_meja,status_meja) values ('$id_status_meja','$kode_meja','$status_meja')";

     if (mysqli_query($conn, $sql1)) {
        header("location: admin_status_meja.php");
        exit();
     } else {
        echo "Error: " . $sql1 . " " . mysqli_error($conn);
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
                    <p>Please fill this form and submit to add table record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group">
                            <label>id_status_meja</label>
                            <input type="text" name="id_status_meja" class="form-control" value="" maxlength="50" required="">
                        </div>

                        <div class="form-group ">
                            <label>kode_meja</label>
                            <input type="text" name="kode_meja" class="form-control" value="" maxlength="100" required="">
                        </div>

                        <div class="form-group">
                            <label>status_meja</label>
                            <input type="text" name="status_meja" class="form-control" value="" maxlength="200" required="">
                        </div>



                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="admin_status_meja.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
