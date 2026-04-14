<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
}
?>

<h2>Dashboard</h2>
<a href="berita.php">Berita</a>
<a href="kategori.php">Kategori</a>
<a href="../auth/logout.php">Logout</a>