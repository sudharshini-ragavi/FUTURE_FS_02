<?php
include 'db.php';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$source = $_POST['source'] ?? '';
$message = $_POST['message'] ?? '';

$stmt = $conn->prepare("INSERT INTO leads (name, email, phone, source, message, status, notes) VALUES (?, ?, ?, ?, ?, 'New', '')");
$stmt->bind_param("sssss", $name, $email, $phone, $source, $message);

if ($stmt->execute()) {
?>
<!DOCTYPE html>
<html>
<head>
<title>Success</title>

<style>
body {
  background: linear-gradient(135deg, #5f27cd, #341f97);
  color: white;
  text-align: center;
  font-family: Arial;
  padding-top: 100px;
}

.success {
  font-size: 30px;
  font-weight: bold;
  margin-bottom: 20px;
}

a {
  display: inline-block;
  padding: 12px 20px;
  background: white;
  color: #5f27cd;
  text-decoration: none;
  border-radius: 8px;
  font-weight: bold;
}

a:hover {
  background: #ddd;
}

#countdown {
  font-size: 20px;
  margin-top: 15px;
}
</style>

</head>
<body>

<div class="success">✅ Lead saved successfully!</div>

<a href="index.php">Go to Home Page</a>

<p id="countdown">Redirecting in 10 seconds...</p>

<script>
let timeLeft = 10;
const countdownElement = document.getElementById("countdown");

const timer = setInterval(() => {
  timeLeft--;
  countdownElement.innerText = "Redirecting in " + timeLeft + " seconds...";

  if (timeLeft <= 0) {
    clearInterval(timer);
    window.location.href = "index.php";
  }
}, 1000);
</script>

</body>
</html>

<?php
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>