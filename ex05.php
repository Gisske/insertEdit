<?php
 if (isset($_REQUEST['username'])){
  $username = $_REQUEST['username'];
  $pwd = $_REQUEST['password'];
  echo $username;
  echo "<br>";
  echo $pwd;
 }