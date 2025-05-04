<?php
include_once 'connection.php';
$sql = "DELETE FROM status_meja WHERE id_status_meja='" . $_GET["id_status_meja"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: admin_status_meja.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>