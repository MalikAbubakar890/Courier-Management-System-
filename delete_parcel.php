<?php 
include 'db_connect.php';

$id = $_GET['traking_number'];
 $delete = "DELETE FROM `parcels` where traking_number = $id";
if (mysqli_query($conn, $delete)) {
  header('Location: ./dashboard.php?page=parcel_list');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
 
?>