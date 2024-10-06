<?php
 if (isset($_GET['username'])){
  $username = $_GET['username'];
  $pwd = $_GET['password'];
  echo $username;
  echo "<br>";
  echo $pwd;
 }