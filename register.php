<?php
include('../config/db.php');
include('../includes/header.php');

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $password);

  if ($stmt->execute()) {
    // Redirect to login page after successful registration
    header("Location: login.php");
    exit();
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }
}
?>

<h3>Register</h3>
<form method="POST">
  <input type="text" name="name" placeholder="Full Name" required><br><br>
  <input type="email" name="email" placeholder="Email" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit" name="register">Register</button>
</form>

<?php include('../includes/footer.php'); ?>
