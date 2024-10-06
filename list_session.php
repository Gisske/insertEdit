<?php
session_start();
$user = $_SESSION["user"];
$email = $_SESSION["email"];
echo $user;
echo $email;