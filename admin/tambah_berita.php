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
    <title>Tambah Berita | The Informed Architect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { transition: all 0.2s ease; }
        body { background-color: #F8F9FA; }
    </style>
</head>
<body class="bg-[#F8F9FA] font-sans antialiased">

<div class="min-h-screen flex flex-col">
    <header class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-[#003366]">The Informed Architect</h1>
            <a href="berita.php" class="text-sm text-[#003366] hover:underline">← Kembali</a>
        </div>
    </header>

    <main class="flex-grow max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Berita Baru</h2>
            <form method="post" class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-[#455A64] mb-1">Judul</label>
                    <input type="text" name="judul" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003366] focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#455A64] mb-1">Isi Berita</label>
                    <textarea name="isi" rows="10" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003366] focus:border-transparent"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#455A64] mb-1">Kategori</label>
                    <select name="kategori" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003366]">
                        <?php
                        $kat = mysqli_query($conn, "SELECT * FROM kategori");
                        while ($k = mysqli_fetch_assoc($kat)) {
                            echo "<option value='{$k['id']}'>" . htmlspecialchars($k['nama_kategori']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="simpan" class="bg-[#003366] hover:bg-[#002a52] text-white font-semibold py-2 px-6 rounded-lg shadow-sm transition">Simpan Berita</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-100 py-4 text-center text-xs text-[#455A64]">
        © 2024 THE INFORMED ARCHITECT
    </footer>
</div>

<?php
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
    mysqli_query($conn, "INSERT INTO berita (judul, isi, kategori_id, tanggal) VALUES ('$judul', '$isi', '$kategori', NOW())");
    header("Location: berita.php");
    exit;
}
?>

</body>
</html>