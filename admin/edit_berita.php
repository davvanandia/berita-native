<?php
include '../config/koneksi.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit();
}
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM berita WHERE id='$id'"));
if (!$data) {
    header("Location: berita.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita | The Informed Architect</title>
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
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Berita</h2>
            <form method="post" class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-[#455A64] mb-1">Judul</label>
                    <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003366]">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#455A64] mb-1">Isi Berita</label>
                    <textarea name="isi" rows="10" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003366]"><?= htmlspecialchars($data['isi']) ?></textarea>
                </div>
                <div>
                    <button type="submit" name="update" class="bg-[#003366] hover:bg-[#002a52] text-white font-semibold py-2 px-6 rounded-lg shadow-sm transition">Update Berita</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-100 py-4 text-center text-xs text-[#455A64]">
        © 2024 THE INFORMED ARCHITECT
    </footer>
</div>

<?php
if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    mysqli_query($conn, "UPDATE berita SET judul='$judul', isi='$isi' WHERE id='$id'");
    header("Location: berita.php");
    exit;
}
?>

</body>
</html>