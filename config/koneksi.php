<!-- //konfigurasi koneksi database -->
<?php
$conn =  mysqli_connect("localhost","root","","db_berita");

if (!$conn) {
    die("gagal nyambung ke db: " . mysqli_connect_error());
}
?>