<?php
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit;
}
?>

<h1>Admin Page</h1>
<p>Welcome, <?= $_SESSION["user"] ?></p>

<a href="logout.php">Logout</a>