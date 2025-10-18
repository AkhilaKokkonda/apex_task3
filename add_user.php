<?php
include('../config/db.php');
include('../includes/header.php');

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role'];

  $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $password, $role);
  if ($stmt->execute()) {
    echo "<p>User Added Successfully!</p>";
  }
}
?>

<h3>Add New User</h3>
<form method="POST">
  <input type="text" name="name" placeholder="Name" required><br><br>
  <input type="email" name="email" placeholder="Email" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <select name="role">
    <option value="User">User</option>
    <option value="Admin">Admin</option>
  </select><br><br>
  <button type="submit" name="add">Add User</button>
</form>

<a href="view_users.php">Back to Users</a>

<?php include('../includes/footer.php'); ?>
