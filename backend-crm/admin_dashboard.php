<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
  <h2>Mini CRM</h2>
  <a href="logout.php">Logout</a>
</div>

<h1>Admin Dashboard</h1>

<?php
$total = $conn->query("SELECT COUNT(*) as cnt FROM leads")->fetch_assoc()['cnt'];
?>

<!-- ANALYTICS CARD -->
<div class="card">
  <h2>Total Leads</h2>
  <p><?php echo $total; ?></p>
</div>

<!-- TABLE -->
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Source</th>
<th>Message</th>
<th>Status</th>
<th>Notes</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM leads");

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "<td>".$row['phone']."</td>";
  echo "<td>".$row['source']."</td>";
  echo "<td>".$row['message']."</td>";

  echo "<td>
  <form action='update_status.php' method='POST'>
    <input type='hidden' name='id' value='".$row['id']."'>
    <select name='status'>
      <option ".($row['status']=='New'?'selected':'').">New</option>
      <option ".($row['status']=='Contacted'?'selected':'').">Contacted</option>
      <option ".($row['status']=='Converted'?'selected':'').">Converted</option>
    </select>
    <button type='submit'>Update</button>
  </form>
  </td>";

  echo "<td>
  <form action='add_note.php' method='POST'>
    <input type='hidden' name='id' value='".$row['id']."'>
    <input type='text' name='notes' value='".$row['notes']."'>
    <button type='submit'>Save</button>
  </form>
  </td>";

  echo "</tr>";
}
?>

</table>

</body>
</html>