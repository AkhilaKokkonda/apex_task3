<?php
include('../config/db.php');
include('../includes/header.php');

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $stmt = $conn->prepare("UPDATE users SET name=?, email=?, role=? WHERE id=?");
  $stmt->bind_param("sssi", $name, $email, $role, $id);
  $stmt->execute();
  header("Location: view_users.php");
}
?>

<h3>Update User</h3>
<form method="POST">
  <input type="text" name="name" value="<?= $user['name'] ?>" required><br><br>
  <input type="email" name="email" value="<?= $user['email'] ?>" required><br><br>
  <select name="role">
    <option value="User" <?= $user['role']=='User'?'selected':'' ?>>User</option>
    <option value="Admin" <?= $user['role']=='Admin'?'selected':'' ?>>Admin</option>
  </select><br><br>
  <button type="submit" name="update">Update</button>
</form>

<?php include('../includes/footer.php'); ?>
