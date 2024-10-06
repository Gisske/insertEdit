<?php
session_start();
include "connect.php";
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
if (!isset($_SESSION["user"])) {
  // If not logged in, redirect to the login page
  header("Location: form01.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .table img {
      width: 50px;
      height: 50px;
      object-fit: cover;
    }
    .action-links a {
      margin-right: 10px;
    }
  </style>
</head>
<body>



<div class="container mt-5">
  <h2 class="mb-4">User Information</h2>
  <div class="d-flex justify-content-between mb-3">
    <a href="adduser.php" class="btn btn-primary">Add User</a>
    <a href="home1.php" class="btn btn-secondary">Back to Home</a>
  </div>
  
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Status</th>
          <th>Picture</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
        ?>
        <tr>
          <td><?php echo htmlspecialchars($row["username"]); ?></td>
          <td><?php echo htmlspecialchars($row["email"]); ?></td>
          <td><?php echo htmlspecialchars($row["password"]); ?></td>
          <td><?php echo htmlspecialchars($row["status"]); ?></td>
          <td><img src="img/<?php echo htmlspecialchars($row["picture"]); ?>" alt="User is not upload Picture"></td>
          <td class="action-links"><a href="edit.php?id=<?php echo $id; ?>" class="btn btn-warning btn-sm">Edit</a></td>
          <td class="action-links"><a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
        </tr>
        <?php
        }
        mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
