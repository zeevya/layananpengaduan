<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Status Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>

<body class="flex bg-gray-100">
    <div id="sidebar-container"></div>
    <div id="main-content" class="flex-1 p-6">
        <div class="bg-white text-center py-4 shadow-md rounded-md mb-4">
            <h1 class="text-2xl font-bold">STATUS PENGADUAN</h1>
        </div>

        <!-- Filter Rentang Tanggal & Hitungan Hari -->
        <div class="mb-4 flex items-center space-x-2">
            <input type="date" id="startDate" class="border px-3 py-2 rounded" onchange="filterByDate()" />
            <span class="mx-2">sampai</span>
            <input type="date" id="endDate" class="border px-3 py-2 rounded" onchange="filterByDate()" />
            <span id="dateDifference" class="text-gray-700 font-semibold"></span>
            <button onclick="printTable()" class="bg-blue-500 text-white px-4 py-2 rounded">
                Print
            </button>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto bg-white p-4 shadow-md rounded-lg">
            <table class="min-w-full border border-gray-300" id="statusTable">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Tgl Pengaduan</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">NIK</th>
                        <th class="px-4 py-2 border">Devisi</th>
                        <th class="px-4 py-2 border">Jenis Kelamin</th>
                        <th class="px-4 py-2 border">No. Telepon</th>
                        <th class="px-4 py-2 border">TTL</th>
                        <th class="px-4 py-2 border">Warga Negara</th>
                        <th class="px-4 py-2 border">Ket. Pengaduan</th>
                        <th class="px-4 py-2 border">Pengaduan</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="text-center">
                    <!-- Data akan dimasukkan dengan JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Navigasi Halaman -->
        <div class="flex justify-between items-center mt-4">
            <span id="pageInfo" class="text-sm text-gray-600"></span>
            <div class="flex space-x-2">
                <button id="prevPage" class="px-3 py-1 bg-gray-300 text-gray-700 rounded disabled:opacity-50"
                    onclick="prevPage()">
                    Prev
                </button>
                <button id="nextPage" class="px-3 py-1 bg-gray-300 text-gray-700 rounded disabled:opacity-50"
                    onclick="nextPage()">
                    Next
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Update Pengaduan -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden">
        <div class="bg-white rounded-xl shadow-lg p-6 w-80 border-2 border-purple-500">
            <h2 class="text-lg font-bold text-center mb-4">Update Pengaduan</h2>
            <form id="modalForm" class="space-y-3">
                <div>
                    <label class="block text-sm font-medium">Tanggal Pengaduan</label>
                    <input type="text" id="modalTglPengaduan" class="w-full bg-gray-100 rounded-md h-8" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Nama</label>
                    <input type="text" id="modalNama" class="w-full bg-gray-100 rounded-md h-8" />
                </div>
                <div>
                    <label class="block text-sm font-medium">NIK</label>
                    <input type="text" id="modalNIK" class="w-full bg-gray-100 rounded-md h-8" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Divisi</label>
                    <select id="modalDivisi" class="w-full bg-gray-100 rounded-md h-8">
                        <option value="TIKIM">TIKIM</option>
                        <option value="INTELDAKIM">INTELDAKIM</option>
                        <option value="LANTASKIM">LANTASKIM</option>
                        <option value="INTALTUSKIM">INTALTUSKIM</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Jenis Kelamin</label>
                    <select id="modalJenisKelamin" class="w-full bg-gray-100 rounded-md h-8">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">No. Telepon</label>
                    <input type="text" id="modalNoTelp" class="w-full bg-gray-100 rounded-md h-8" />
                </div>
                <div>
                    <label class="block text-sm font-medium">TTL</label>
                    <input type="text" id="modalTTL" class="w-full bg-gray-100 rounded-md h-8" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Warga Negara</label>
                    <select id="modalKewarganegaraan" class="w-full bg-gray-100 rounded-md h-8">
                        <option value="Indonesia">Indonesia</option>
                        <option value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Ket. Pengaduan</label>
                    <input type="text" id="modalKetPengaduan" class="w-full bg-gray-100 rounded-md h-8" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Pengaduan</label>
                    <textarea id="modalPengaduan" class="w-full bg-gray-100 rounded-md h-16"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium">Status</label>
                    <select id="modalStatus" class="w-full bg-gray-100 rounded-md h-8">
                        <option value="Pending">Pending</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="flex justify-between mt-4">
                    <button type="button" onclick="closeModal()" class="bg-red-500 text-white rounded-md px-4 py-1">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-1">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="../js/tgl_excel.js"></script>
    <script src="../js/pagination.js"></script>
</body>

</html>

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = User::where('nip', '12345678')->first(); // Ganti dengan NIP user yang ingin diupdate
$user->password = Hash::make('passwordbaru'); // Ganti dengan password yang kamu mau
$user->save();