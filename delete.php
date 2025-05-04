<?php
include_once 'connection.php';
$sql = "DELETE FROM menu WHERE id_menu='" . $_GET["id_menu"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: admin_menu.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>