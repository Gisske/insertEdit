<?php
session_start();
include "connect.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $pic = $_FILES["pic"]["name"]; 
    $target_file = "img/".$_FILES["pic"]["name"];
    move_uploaded_file($_FILES["pic"]["tmp_name"],$target_file);
    
    // Update query
    $sql = "UPDATE users SET username=?, password=?, email=?, picture=?, status=? WHERE id=?";
    
    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $username, $password, $email, $pic, $status, $id);
    
    // Execute the query
    if ($stmt->execute()) {
        echo "Update successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
    header("Location: listuser.php"); // Redirect back to the main page
    exit();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
            background-color: #fff;
            padding: 20px;
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
        <h2>แก้ไขข้อมูล</h2>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($row['status']); ?>" required>
            
            <label for="pic">pic:</label>
            <input type="file" id="pic" name="pic" required>
            <input type="submit" name="submit" value="Update">

        </form>
        <button onclick="location.href='listuser.php'">Back</button>
    </div>
</body>
</html>
