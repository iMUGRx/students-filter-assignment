<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = $_POST["username"] ?? "";
  $password = $_POST["password"] ?? "";

  if ($username === "admin" && $password === "1234") {
    $_SESSION["user"] = $username;
    header("Location: admin.php");
    exit;
  } else {
    $error = "Invalid login";
  }
}
?>

<form method="POST">
  <h2>Login</h2>
  <?php if ($error) echo "<p style='color:red'>$error</p>"; ?>
  <input name="username" placeholder="Username"><br><br>
  <input name="password" type="password" placeholder="Password"><br><br>
  <button>Login</button>
</form>