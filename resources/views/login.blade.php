<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Imigrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" defer></script>
</head>

<body class="flex items-center justify-center min-h-screen" style="background-color: #D9D9D9;">
    <div class="w-[1100px] h-[600px] flex items-center p-6 rounded-lg shadow-lg" style="background-color: #404B52;">
        <!-- Logo dan Nama Kantor -->
        <div class="w-1/2 flex flex-col items-center">
            <img src="{{ asset('FOTO/logo.png') }}" alt="Imigrasi Logo" class="h-[350px] mb-0 pb-0">
            <h2 class="text-2xl font-bold text-white text-center leading-tight w-[400px] mt-2">
                KANTOR IMIGRASI<br>KELAS I TPI TANJUNG PERAK
            </h2>
        </div>

        <!-- Form Login -->
        <div class="w-1/2 p-10 shadow-xl rounded-lg" style="background-color: #D9D9D9;">
            @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="nip" class="block text-gray-700 font-semibold">NIP</label>
                    <input type="number" id="nip" name="nip"
                        class="w-full p-3 border border-gray-400 rounded-lg mt-1 focus:ring focus:ring-gray-500">
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full p-3 border border-gray-400 rounded-lg mt-1 focus:ring focus:ring-gray-500">
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-700">
                            <i id="eye-icon" class="fas fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full font-bold py-3 rounded-lg transition duration-200"
                    style="background-color: #404B52; color: white;">
                    Login
                </button>
            </form>
        </div>
    </div>

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }
    </script>
</body>

</html>