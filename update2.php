<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE status_meja set id_status_meja='" . $_POST['id_status_meja'] . "', kode_meja='" . $_POST['kode_meja'] . "' , status_meja='" . $_POST['status_meja'] . "' WHERE id_status_meja='" . $_POST['id_status_meja'] . "'");
     
     header("location: admin_status_meja.php");
     exit();
    }
    $result1 = mysqli_query($conn,"SELECT * FROM status_meja WHERE id_status_meja='" . $_GET['id_status_meja'] . "'");
    $row= mysqli_fetch_array($result1);
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
                            <label>id_status_meja</label>
                            <input type="text" name="id_status_meja" class="form-control" value="<?php echo $row["id_status_meja"]; ?>" maxlength="100" required="">
                        </div>


                        <div class="form-group ">
                            <label>kode_meja</label>
                            <input type="text" name="kode_meja" class="form-control" value="<?php echo $row["kode_meja"]; ?>" maxlength="200" required="">
                        </div>


                        <div class="form-group">
                            <label>status_meja</label>
                          
                            <td>
            <!-- Dropdown untuk status_meja -->
            <select name="status_meja" class="form-control" value="<?php echo $row["status_meja"]; ?>" maxlength="200"required="">
                <option value="Penuh" <?php echo $row['status_meja'] == 'Penuh' ? 'selected' : ''; ?>>Penuh</option>
                <option value="Kosong" <?php echo $row['status_meja'] == 'Kosong' ? 'selected' : ''; ?>>Kosong</option>
                <option value="Booking" <?php echo $row['status_meja'] == 'Booking' ? 'selected' : ''; ?>>Booking</option>
            </select>
        </td>
                            
                        </div>


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin_status_meja.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>