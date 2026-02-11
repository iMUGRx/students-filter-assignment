<?php
session_start();
require_once "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {

    if (password_verify($password, $row["password"])) {
      $_SESSION["user"] = $row["username"];
      header("Location: admin.php");
      exit;
    }
  }

  $error = "Invalid login";
}
?>


<h2>Login</h2>
<form method="POST">
  <input name="username" placeholder="Username"><br><br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <button>Login</button>
  <p style="color:red"><?= $error ?></p>
</form>