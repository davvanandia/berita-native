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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Data Berita | The Informed Architect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { transition: all 0.2s ease; }
        body { background-color: #F8F9FA; }
    </style>
</head>
<body class="bg-[#F8F9FA] font-sans antialiased">

    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-extrabold text-[#003366]">The Informed Architect</h1>
                    <p class="text-xs text-[#455A64]">Manajemen Berita</p>
                </div>
                <a href="dashboard.php" class="text-sm text-[#003366] hover:underline">← Kembali ke Dashboard</a>
            </div>
        </header>

        <!-- Main content -->
        <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/30 flex flex-wrap justify-between items-center gap-3">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Data Berita</h2>
                        <p class="text-sm text-[#455A64]">Daftar semua artikel berita</p>
                    </div>
                    <a href="tambah_berita.php" class="inline-flex items-center gap-1 bg-[#003366] hover:bg-[#002a52] text-white font-semibold py-2 px-4 rounded-lg shadow-sm transition text-sm">
                        + Tambah Berita
                    </a>
                </div>

                <div class="overflow-x-auto p-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#455A64] uppercase tracking-wider">No.</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#455A64] uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#455A64] uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#455A64] uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <?php
                            $no = 1;
                            $query = mysqli_query($conn, "SELECT berita.*, kategori.nama_kategori FROM berita JOIN kategori ON berita.kategori_id = kategori.id");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?= $no++; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium"><?= htmlspecialchars($row['judul']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#455A64]"><?= htmlspecialchars($row['nama_kategori']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                    <a href="edit_berita.php?id=<?= $row['id'] ?>" class="text-[#003366] hover:text-[#002a52] hover:underline">Edit</a>
                                    <a href="hapus_berita.php?id=<?= $row['id'] ?>" class="text-[#592300] hover:text-[#3b1700] hover:underline" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if (mysqli_num_rows($query) == 0): ?>
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-sm text-[#455A64]">Belum ada data berita.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-100 py-4 text-center text-xs text-[#455A64]">
            © 2024 THE INFORMED ARCHITECT, HIGH-END EDITORIAL JOURNAL
        </footer>
    </div>

</body>
</html>