<!DOCTYPE html>
<html lang="en">
<head>
  <title>FORM01</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .login-container {
      max-width: 400px;
      margin-top: 100px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #f9f9f9;
    }
    .form-header {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
  <script>
    function validateForm() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("pwd").value;
      if (username == "" || password == "") {
        alert("กรุณาใส่รหัสผ่านให้ถูกต้อง");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>

<div class="container login-container">
  <h2 class="form-header">เข้าสู่ระบบ</h2>
  <form action="login.php" onsubmit="return validateForm()">
    <div class="mb-3">
      <label for="username" class="form-label">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="mb-3">
      <label for="pwd" class="form-label">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="remember" name="remember">
      <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
    <div class="text-center mt-3">
      <a href="register.php" class="btn btn-secondary w-100">Register</a>
    </div>
  </form>
</div>

</body>
</html>
