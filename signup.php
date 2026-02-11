<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = $_POST["username"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();

  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sign Up</title>
</head>

<body>

  <h2>Sign Up</h2>

  <form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Sign Up</button>
  </form>

  <p>Already have an account? <a href="login.php">Login</a></p>

</body>

</html>