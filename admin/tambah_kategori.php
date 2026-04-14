<form method="post">
    <input type="text" name="nama" id="">
    <button name="simpan">Simpan</button>
</form>

<?php
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES('$_POST[nama]')");
    header("Location: kategori.php");
}
?>