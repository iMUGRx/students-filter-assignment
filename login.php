<?php
session_start();
require_once "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $_SESSION["user"] = $username;
    header("Location: admin.php");
    exit;
  } else {
    $error = "Invalid login";
  }
}
?>

<h2>Login</h2>
<form method="POST">
  <input name="username" placeholder="Username"><br><br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <button>Login</button>
  <p style="color:red"><?= $error ?></p>
</form>