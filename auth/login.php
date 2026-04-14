<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Admin Login | The Informed Architect</title>
    <!-- Tailwind CSS v3 + basic interactivity -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* smooth transition for all interactive elements */
        * { transition: all 0.2s ease; }
        body { background-color: #F8F9FA; }
    </style>
</head>
<body class="bg-[#F8F9FA] font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <!-- main card – clean, no images, only Tailwind -->
        <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">

            <!-- header section -->
            <div class="px-8 pt-8 pb-4 text-center border-b border-gray-100">
                <h1 class="text-3xl font-extrabold tracking-tight text-[#003366]">
                    The Informed Architect
                </h1>
                <p class="text-[#455A64] text-xs font-medium uppercase tracking-wider mt-1.5">
                    Editorial Management
                </p>
            </div>

            <!-- login content -->
            <div class="px-8 py-6">
                <div class="mb-5">
                    <h2 class="text-2xl font-bold text-gray-800">Admin Login</h2>
                    <p class="text-sm text-[#455A64] mt-1">Secure access to the curation dashboard.</p>
                </div>

                <!-- ORIGINAL FORM STRUCTURE PRESERVED:
                     method="post", action="proses_login.php"
                     inputs: username (text), password (password)
                     button submit (Login)
                     No fields removed or renamed -->
                <form method="post" action="proses_login.php" class="space-y-5">
                    <!-- username field with label + placeholder (emoji style as in reference) -->
                    <div>
                        <label for="username" class="block text-xs font-semibold text-[#455A64] uppercase tracking-wide mb-1">Username</label>
                        <input type="text" name="username" id="username" 
                               placeholder="Enter your username"
                               class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg 
                                      focus:outline-none focus:ring-2 focus:ring-[#003366] focus:border-transparent
                                      text-gray-800 placeholder-gray-400 transition">
                    </div>

                    <!-- password field with label and placeholder matching reference -->
                    <div>
                        <label for="password" class="block text-xs font-semibold text-[#455A64] uppercase tracking-wide mb-1">Password</label>
                        <input type="password" name="password" id="password" 
                               placeholder="*******"
                               class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg 
                                      focus:outline-none focus:ring-2 focus:ring-[#003366] focus:border-transparent
                                      text-gray-800 placeholder-gray-400 transition">
                    </div>

                    <!-- submit button (primary color, arrow as in design) -->
                    <button type="submit" 
                            class="w-full bg-[#003366] hover:bg-[#002a52] text-white font-semibold py-2.5 px-4 rounded-lg 
                                   flex items-center justify-center gap-2 shadow-sm transition">
                        Login <span>→</span>
                    </button>
                </form>
            </div>

            <!-- footer with support & terms + copyright -->
            <div class="px-8 py-5 bg-gray-50 border-t border-gray-100 text-center">
                <div class="text-xs text-[#455A64] space-x-2">
                    <a href="#" class="hover:text-[#003366] transition">Support</a>
                    <span class="text-gray-300">|</span>
                    <a href="#" class="hover:text-[#003366] transition">Terms of Service</a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>