<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$id = intval($id);
$result = mysqli_query($conn, "SELECT * FROM berita WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?= htmlspecialchars($data['judul']) ?> | The Informed Architect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { transition: all 0.2s ease; }
        body { background-color: #F8F9FA; }
        /* Style untuk konten berita */
        .berita-content p {
            margin-bottom: 1rem;
            line-height: 1.75;
        }
        .berita-content h2, .berita-content h3 {
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-[#F8F9FA] font-sans antialiased">

    <div class="min-h-screen flex flex-col">
        <header class="bg-white border-b border-gray-200 shadow-sm">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
                <a href="index.php" class="inline-flex items-center gap-1 text-[#003366] hover:underline text-sm">
                    ← Kembali ke Beranda
                </a>
            </div>
        </header>

        <main class="flex-grow max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
            <article class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 md:p-8">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight"><?= htmlspecialchars($data['judul']) ?></h1>
                    
                    <div class="flex items-center gap-3 text-sm text-[#455A64] mt-3 border-b border-gray-100 pb-4">
                        <span> <?= date('d F Y', strtotime($data['tanggal'] ?? 'now')) ?></span>
                        <?php if(!empty($data['penulis'])): ?>
                        <span> <?= htmlspecialchars($data['penulis']) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="berita-content text-gray-700 mt-6 leading-relaxed">
                        <?= nl2br(htmlspecialchars($data['isi'])) ?>
                        <!-- Catatan: Jika isi berita mengandung HTML (misal dari editor), gunakan htmlspecialchars_decode atau biarkan apa adanya.
                             Sesuai struktur asli yang menggunakan $data['isi'] langsung tanpa escaping, saya gunakan htmlspecialchars untuk keamanan.
                             Jika Anda ingin mengizinkan HTML, ganti dengan: <?= $data['isi'] ?> -->
                    </div>
                </div>
            </article>

            <div class="mt-6 text-center">
                <a href="index.php" class="inline-flex items-center gap-1 text-[#003366] hover:underline font-medium">
                    ← Kembali ke daftar berita
                </a>
            </div>
        </main>

        <footer class="bg-white border-t border-gray-100 py-6 text-center text-xs text-[#455A64]">
            <div class="max-w-4xl mx-auto px-4">
                <p>© 2024 THE INFORMED ARCHITECT, HIGH-END EDITORIAL JOURNAL</p>
            </div>
        </footer>
    </div>

</body>
</html>