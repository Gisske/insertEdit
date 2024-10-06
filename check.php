<?php
session_start();

// Set session variables
$_SESSION["user"] = "James";
$_SESSION["email"] = "James@gmail.com";
$user = $_SESSION["user"];
$email = $_SESSION["email"];