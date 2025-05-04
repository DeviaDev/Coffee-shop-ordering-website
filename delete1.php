<?php
include_once 'connection.php';
$sql = "DELETE FROM admin WHERE id_adm='" . $_GET["id_adm"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: a_list_admin.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>