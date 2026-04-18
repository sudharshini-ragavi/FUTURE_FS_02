<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>

  <!-- CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- ICONS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<div class="login-page">

  <div class="login-box">
    
    <h2><i class="fa-solid fa-user-shield"></i> Admin Login</h2>
    <p class="subtitle">Access your CRM dashboard</p>

    <form method="POST">

      <div class="input-group">
        <i class="fa-solid fa-user"></i>
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="input-group password-group">
        <i class="fa-solid fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword()"></i>
      </div>

      <button type="submit" name="login">Login</button>

    </form>

    <a href="index.php" class="back-link">← Back to Website</a>

  </div>

</div>

<script>
function togglePassword() {
  const password = document.getElementById("password");
  const icon = document.querySelector(".toggle-password");

  if (password.type === "password") {
    password.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    password.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}
</script>

<?php
if (isset($_POST['login'])) {
  if ($_POST['username'] == "admin" && $_POST['password'] == "admin@1234") {
    $_SESSION['admin'] = true;
    header("Location: admin_dashboard.php");
  } else {
    echo "<p class='error'>Invalid login!</p>";
  }
}
?>

</body>
</html>