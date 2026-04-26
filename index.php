<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Berita | The Informed Architect</title>
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
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center">
                <h1 class="text-4xl font-extrabold text-[#003366] tracking-tight">The Informed Architect</h1>
                <p class="text-[#455A64] text-sm font-medium uppercase tracking-wider mt-1">High-End Editorial Journal</p>
            </div>
        </header>

        <main class="flex-grow max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
            <div class="space-y-6">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
                if (mysqli_num_rows($query) == 0) {
                    echo '<div class="bg-white rounded-xl shadow-md p-8 text-center text-[#455A64]">Belum ada berita.</div>';
                }
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <article class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 hover:text-[#003366] transition">
                            <a href="detail.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['judul']) ?></a>
                        </h2>
                        <div class="text-sm text-[#455A64] mt-1 flex items-center gap-2">
                            <span> <?= date('d M Y', strtotime($row['tanggal'] ?? 'now')) ?></span>
                        </div>
                        <p class="text-gray-600 mt-3 leading-relaxed">
                            <?= htmlspecialchars(substr(strip_tags($row['isi']), 0, 150)) ?>...
                        </p>
                        <div class="mt-4">
                            <a href="detail.php?id=<?= $row['id'] ?>" class="inline-flex items-center gap-1 text-[#003366] font-semibold hover:underline">
                                Baca selengkapnya <span>→</span>
                            </a>
                        </div>
                    </div>
                </article>
                <?php } ?>
            </div>
        </main>

        <footer class="bg-white border-t border-gray-100 py-6 text-center text-xs text-[#455A64]">
            <div class="max-w-5xl mx-auto px-4">
                <p>© 2024 THE INFORMED ARCHITECT, HIGH-END EDITORIAL JOURNAL</p>
                <p class="mt-1">All rights reserved.</p>
            </div>
        </footer>
    </div>

</body>
</html>