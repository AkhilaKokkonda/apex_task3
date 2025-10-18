<?php
session_start();
include('../config/db.php');
include('../includes/header.php');

$result = $conn->query("SELECT * FROM users");
?>

<h3>User List</h3>
<a href="../auth/logout.php">Logout</a> | <a href="add_user.php">Add User</a> | <a href="../profile/edit_profile.php">Edit Profile</a>

<table border="1" cellpadding="10" cellspacing="0">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>
<?php while($row = $result->fetch_assoc()) { ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= $row['name'] ?></td>
  <td><?= $row['email'] ?></td>
  <td><?= $row['role'] ?></td>
  <td>
    <a href="update_user.php?id=<?= $row['id'] ?>">Edit</a> |
    <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
  </td>
</tr>
<?php } ?>
</table>

<?php include('../includes/footer.php'); ?>
