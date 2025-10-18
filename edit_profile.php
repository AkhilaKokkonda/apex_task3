<?php
session_start();
include('../config/db.php');
include('../includes/header.php');

$user = $_SESSION['user'];
$id = $user['id'];

if (isset($_POST['update'])) {
  $name = $_POST['name'];

  if (!empty($_FILES['profile_pic']['name'])) {
    $target = "../uploads/" . basename($_FILES['profile_pic']['name']);
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
    $stmt = $conn->prepare("UPDATE users SET name=?, profile_pic=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $target, $id);
  } else {
    $stmt = $conn->prepare("UPDATE users SET name=? WHERE id=?");
    $stmt->bind_param("si", $name, $id);
  }

  if ($stmt->execute()) {
    echo "<p>Profile Updated Successfully!</p>";
  }
}
?>

<h3>Edit Profile</h3>
<form method="POST" enctype="multipart/form-data">
  <input type="text" name="name" value="<?= $user['name'] ?>" required><br><br>
  <input type="file" name="profile_pic"><br><br>
  <button type="submit" name="update">Update</button>
</form>

<a href="../crud/view_users.php">Back</a>

<?php include('../includes/footer.php'); ?>
