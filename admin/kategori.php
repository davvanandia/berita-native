<?php include '../config/koneksi.php'; ?>

<h2>Kategori</h2>
<a href="tambah_kategori.php">Tambah</a>

<ul>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM kategori");
    while ($row = mysqli_fetch_assoc($query)) {
?>
<li>
    <?= $row['nama_kategori'] ?>
    <a href="hapus_kategori.php?id=<?= $row['id'] ?>">Hapus</a>
</li>
<?php } ?>
</ul>
