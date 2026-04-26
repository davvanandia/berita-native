<?php
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
    <title>Dashboard | The Informed Architect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { transition: all 0.2s ease; }
        body { background-color: #F8F9FA; }
    </style>
</head>
<body class="bg-[#F8F9FA] font-sans antialiased">

    <div class="min-h-screen flex flex-col">
        <header class="bg-white border-b border-gray-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-extrabold text-[#003366]">The Informed Architect</h1>
                    <p class="text-xs text-[#455A64]">Editorial Management</p>
                </div>
                <div class="text-sm text-[#455A64]">
                    Welcome, <?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?>
                </div>
            </div>
        </header>

        <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/30">
                    <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                    <p class="text-sm text-[#455A64]">Manage your content and settings</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <a href="berita.php" class="block group bg-white border border-gray-200 rounded-xl p-5 hover:shadow-md hover:border-[#003366]/20 transition">
                            <div class="text-[#003366] text-3xl mb-2"></div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-[#003366]">Berita</h3>
                            <p class="text-sm text-[#455A64] mt-1">Kelola semua artikel berita</p>
                        </a>
                        <a href="kategori.php" class="block group bg-white border border-gray-200 rounded-xl p-5 hover:shadow-md hover:border-[#003366]/20 transition">
                            <div class="text-[#003366] text-3xl mb-2"></div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-[#003366]">Kategori</h3>
                            <p class="text-sm text-[#455A64] mt-1">Atur kategori berita</p>
                        </a>
                        <a href="../auth/logout.php" class="block group bg-white border border-gray-200 rounded-xl p-5 hover:shadow-md hover:border-red-200 transition">
                            <div class="text-[#592300] text-3xl mb-2"></div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-[#592300]">Logout</h3>
                            <p class="text-sm text-[#455A64] mt-1">Akhiri sesi admin</p>
                        </a>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-white border-t border-gray-100 py-4 text-center text-xs text-[#455A64]">
            © 2024 THE INFORMED ARCHITECT, HIGH-END EDITORIAL JOURNAL
        </footer>
    </div>

</body>
</html>