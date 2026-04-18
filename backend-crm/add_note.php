<?php
include 'db.php';
$id=$_POST['id'];
$notes=$_POST['notes'];
$conn->query("UPDATE leads SET notes='$notes' WHERE id=$id");
header("Location: admin_dashboard.php");
?>

