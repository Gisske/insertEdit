<?php
include "connect.php";
session_start();

if (isset($_GET['username']) && isset($_GET['password'])) {
  $username = $_GET['username'];
  $password = $_GET['password'];

  if (empty($username) || empty($password)) {
    echo "<script>alert('Username and Password must be filled out');window.location.href = 'form01.php';</script>";
  } else {
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $uname = $row['username'];
      $pwd = $row['password'];

      $_SESSION["user"] = $row['username'];

      if ($username == $uname && $password == $pwd) {
        header("location: home1.php");
      } else {
        echo "<script>alert('Email or Password ไม่ถูกต้อง');window.location.href = 'form01.php';</script>";
      }
    } else {
      echo "<script>alert('Username not found');window.location.href = 'form01.php';</script>";
    }
  }
} else {
  echo "<script>alert('Username and Password must be filled out');window.location.href = 'form01.php';</script>";
}
?>
