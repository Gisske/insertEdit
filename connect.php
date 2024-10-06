<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "member1";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

// $sql = "SELECT * FROM users WHERE username = 'kap'";
// $result = mysqli_query($conn, $sql);
// while($row = mysqli_fetch_assoc($result)){
//     echo "<br>";
//     echo $row['email'];
// }