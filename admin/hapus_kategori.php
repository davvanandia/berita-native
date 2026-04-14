<?php
include '../config/koneksi.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit();
}
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kategori WHERE id='$id'");
header("Location: kategori.php");
exit;
?>