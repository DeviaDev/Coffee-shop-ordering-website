<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE admin set id_adm='" . $_POST['id_adm'] . "' , username='" . $_POST['username'] . "' , password='" . $_POST['password'] . "', jabatan='" . $_POST['jabatan'] . "' WHERE id_adm='" . $_POST['id_adm'] . "'");
     
     header("location: a_list_admin.php");
     exit();
    }
    $result3 = mysqli_query($conn,"SELECT * FROM admin WHERE id_adm='" . $_GET['id_adm'] . "'");
    $row= mysqli_fetch_array($result3);
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

                    <div class="form-group ">
                            <label>id_adm</label>
                            <input type="text" name="id_adm" class="form-control" value="<?php echo $row["id_adm"]; ?>" maxlength="200" required="">
                        </div>


                        <div class="form-group ">
                            <label>username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $row["username"]; ?>" maxlength="200" required="">
                        </div>
                     

                        <div class="form-group">
                            <label>password</label>
                            <input type="text" name="password" class="form-control" value="<?php echo $row["password"]; ?>" maxlength="200"required="">
                        </div>

                        <div class="form-group">
                            <label>jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?php echo $row["jabatan"]; ?>" maxlength="200"required="">
                        </div>


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="a_list_admin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>