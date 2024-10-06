<?php
session_start();
$id = $_GET['id'];
include "connect.php";
// sql to delete a record
$sql = "DELETE FROM users WHERE id='$id' ";
$result = mysqli_query($conn, $sql);
if ($result) {
   header("Location: listuser.php");
   exit;
} else {
  echo "Error : " . mysqli_error($conn);
}
mysqli_close($conn);