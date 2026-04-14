<?php
include '../config/koneksi.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori | The Informed Architect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8F9FA] font-sans antialiased">

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tambah Kategori</h2>
        <form method="post" class="space-y-4">
            <input type="text" name="nama" placeholder="Nama kategori" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003366]">
            <button type="submit" name="simpan" class="w-full bg-[#003366] hover:bg-[#002a52] text-white font-semibold py-2 rounded-lg transition">Simpan</button>
        </form>
        <div class="mt-4 text-center">
            <a href="kategori.php" class="text-sm text-[#003366] hover:underline">← Kembali</a>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES('$nama')");
    header("Location: kategori.php");
    exit;
}
?>

</body>
</html>