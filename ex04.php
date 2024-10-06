<?php
 if (isset($_POST['username'])){
  $username = $_POST['username'];
  $pwd = $_POST['password'];
  echo $username;
  echo "<br>";
  echo $pwd;
 }