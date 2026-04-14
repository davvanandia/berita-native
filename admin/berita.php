<?php include '../config/koneksi.php' ?>

<h2>Data Berita</h2>
<a href="tambah_berita.php">Tambah</a>

<table border="1">
    <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $query = mysqli_query($conn, "SELECT berita.*, kategori.nama_kategori FROM berita JOIN kategori ON berita.kategori_id = kategori.id");

    while ($row = mysqli_fetch_assoc($query)) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['nama_kategori']; ?></td>
            <td>
                <a href="update_berita.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="hapus_berita.php?id=<?= $row['id'] ?>">Hapus</a>
            </td>
        </tr>
    <?php }
    ?>
</table>