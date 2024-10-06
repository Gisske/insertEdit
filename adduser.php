<?php
include "connect.php";
if(isset($_POST['submit'])){

$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$status = $_POST['status'];
$pic = $_FILES["pic"]["name"]; 
$target_file = "img/".$_FILES["pic"]["name"];
move_uploaded_file($_FILES["pic"]["tmp_name"],$target_file);


// var_dump($_FILES["pic"]);
// echo"<br>";
// $target_file = $_FILES["pic"]["name"];
// echo"<br>";
// echo pathinfo($target_file,PATHINFO_EXTENSION);
// echo"<br>";
// echo strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// เข้ารหัสรหัสผ่าน
//$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// เตรียมคำสั่ง SQL
$sql = "INSERT INTO users (username, password, email, picture, status) VALUES (?, ?, ?, ?, ?)";

// ใช้ prepared statement เพื่อความปลอดภัย
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $user, $pass, $email, $pic, $status);

// ดำเนินการคำสั่ง SQL
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #f2f2f2;
            padding: 60px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"],
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        button {
            background-color: #f44336;
        }
        button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add User Form</h2>
        <form action="adduser.php" method="post" enctype="multipart/form-data" >
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>

            <label for="pic">pic:</label>
            <input type="file" id="pic" name="pic" required>
            
            <input type="submit" name="submit" value="adduser">
        </form>
        <button onclick="location.href='listuser.php'">Back</button>
    </div>
</body>
</html>