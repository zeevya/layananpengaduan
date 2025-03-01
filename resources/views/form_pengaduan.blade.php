<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>

<body class="bg-gray-100 flex">
    <div id="sidebar-container"></div>
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">PENGADUAN</h1>
        <div class="bg-gray-200 p-6 rounded-lg shadow-md w-full max-w-5xl mx-auto">
            <form action="{{ route('pengaduan.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium text-sm">Seksi</label>
                        <select name="id_divisi"
                            class="w-full p-3 border border-gray-300 rounded bg-white text-sm focus:ring focus:ring-blue-300">
                            <option value="">Pilih Seksi</option>
                            @foreach ($divisi as $d)
                            <option value="{{ $d->id_divisi }}">{{ $d->nama_divisi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium text-sm">Tanggal Pengaduan</label>
                        <input type="date" name="tanggal_pengaduan" required
                            class="w-full p-3 border border-gray-300 rounded bg-white text-sm focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium text-sm">Nama Pengadu</label>
                        <input type="text" name="nama_pengadu" required
                            class="w-full p-3 border border-gray-300 rounded bg-white text-sm focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium text-sm">NIK</label>
                        <input type="text" name="nik" required
                            class="w-full p-3 border border-gray-300 rounded bg-white text-sm focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium text-sm">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_pengadu" required
                            class="w-full p-3 border border-gray-300 rounded bg-white text-sm focus:ring focus:ring-blue-300">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium text-sm">Kategori Pengaduan</label>
                        <select name="id_kategori" class="w-full p-2 border rounded" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium text-sm">Alamat Pengadu</label>
                        <input type="text" name="alamat_pengadu" required
                            class="w-full p-3 border border-gray-300 rounded bg-white text-sm focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium text-sm">No Telepon</label>
                        <input type="text" name="no_telepon" required
                            class="w-full p-3 border border-gray-300 rounded bg-white text-sm focus:ring focus:ring-blue-300">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 font-medium text-sm">Jenis Kelamin</label>
                    <div class="flex items-center space-x-6 mt-2">
                        <label class="flex items-center text-sm">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" required class="mr-2"> Perempuan
                        </label>
                        <label class="flex items-center text-sm">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" required class="mr-2"> Laki-laki
                        </label>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 font-medium text-sm">Deskripsi</label>
                    <textarea name="deskripsi" required
                        class="w-full p-3 border border-gray-300 rounded bg-white text-sm focus:ring focus:ring-blue-300"
                        rows="3"></textarea>
                </div>
                <button type="submit"
                    class="mt-4 w-full bg-blue-500 text-white p-3 rounded-lg text-sm font-semibold hover:bg-blue-600 transition">
                    Simpan
                </button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>