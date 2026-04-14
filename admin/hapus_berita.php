<?php
include '../config/koneksi.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit();
}
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM berita WHERE id='$id'");
header("Location: berita.php");
exit;
?>