<?php include '../config/koneksi.php'; ?>

<form method="post">
    Judul: <input type="text" name="judul"><br>
    Isi: <textarea name="isi"></textarea><br>

    <select name="kategori">
        <?php
        $kat = mysqli_query($conn, "SELECT * FROM kategori");
        while ($k = mysqli_fetch_assoc($kat)) {
            echo "<option value='{$k['id']}'>{$k['nama_kategori']}</option>";
        } 
        ?>
    </select>

    <button name="simpan">Simpan</button>
</form>
<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO berita VALUES('', '$_POST[judul]', '$_POST[isi]', '$_POST[kategori]', NOW())");
    header("Location: berita.php");
}
?>