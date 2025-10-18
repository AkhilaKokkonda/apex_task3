<?php
session_start();
include('../config/db.php');
include('../includes/header.php');

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    header("Location: ../crud/view_users.php");
  } else {
    echo "<p>Invalid email or password!</p>";
  }
}
?>

<h3>Login</h3>
<form method="POST">
  <input type="email" name="email" placeholder="Email" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit" name="login">Login</button>
</form>

<?php include('../includes/footer.php'); ?>
