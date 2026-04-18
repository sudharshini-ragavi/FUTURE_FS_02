<?php
$conn = new mysqli("localhost", "root", "dharshini@2008", "crm_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
