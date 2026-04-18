<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Client Lead Management System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<body class="index-page">
<h1><b>Client Lead Management System</b></h1>
<h2>Contact form</h2>
<form action="save_lead.php" method="POST">
<input type="text" name="name" placeholder="Enter name" required>
<input type="email" name="email" placeholder="Enter email" required>
<input type="text" name="phone" placeholder="Enter phone number">
<select name="source">
  <option>Website</option>
  <option>Instagram</option>
  <option>LinkedIn</option>
</select>
<textarea name="message" placeholder="Enter requirement" required></textarea>
<button type="submit">Send message</button>
</form>
<footer>
<p>© 2026 Sudharshini Ragavi | All Rights Reserved</p>
</footer>
<a href="login.php">Admin Login</a>
</body>
</html>
