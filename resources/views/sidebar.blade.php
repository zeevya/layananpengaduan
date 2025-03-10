<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Interaktif</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</head>

<body class="flex bg-gray-100">
    <!-- Sidebar -->
    <div id="sidebar"
        class="bg-white text-gray-700 h-full min-h-screen w-16 transition-all duration-300 shadow-md border-r relative">
        <div class="flex justify-center py-4">
            <img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 transition-all duration-300" />
        </div>
        <ul class="space-y-6">
            <a href="{{ route('dashboard') }}">
                <li class="flex items-center space-x-3 px-4 py-6 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-clock text-xl text-gray-700"></i>
                    <span class="hidden text-sm transition-all duration-300">Dashboard</span>
                </li>
            </a>
            <a href="{{ route('pengaduan.create') }}">
                <li class="flex items-center space-x-3 px-4 py-6 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-envelope text-xl text-gray-700"></i>
                    <span class="hidden text-sm transition-all duration-300">Pengaduan</span>
                </li>
            </a>
            <a href="{{ route('status') }}">
                <li class="flex items-center space-x-3 px-4 py-6 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-cogs text-xl text-gray-700"></i>
                    <span class="hidden text-sm transition-all duration-300">Status</span>
                </li>
            </a>
            <a href="{{ route('laporan') }}">
                <li class="flex items-center space-x-3 px-4 py-6 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-file-alt text-xl text-gray-700"></i>
                    <span class="hidden text-sm transition-all duration-300">Laporan</span>
                </li>
            </a>
        </ul>

        <a href="{{ route('logout') }}">
            <div class="absolute bottom-6 left-4 flex items-center space-x-3 cursor-pointer hover:text-gray-500">
                <i class="fas fa-sign-out-alt text-xl text-gray-700"></i>
                <span class="hidden text-sm transition-all duration-300">Logout</span>
            </div>
        </a>
    </div>

    <!-- Tombol Toggle -->
    <button id="toggleBtn"
        class="absolute top-10 left-10 bg-white p-2 rounded-lg shadow-md border transition-all duration-300 z-5">
        <i class="fas fa-chevron-right text-gray-700"></i>
    </button>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>