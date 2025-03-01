<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Status Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      defer
    ></script>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body class="flex">
    <!-- Sidebar akan dimuat di sini -->
    <div id="sidebar-container"></div>

    <!-- Konten Utama -->
    <div id="main-content" class="flex-1 p-6">
      <h1 class="text-2xl font-bold mb-4">STATUS</h1>

      <!-- Tabel Status -->
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2">No</th>
              <th class="px-4 py-2">Tgl Pengaduan</th>
              <th class="px-4 py-2">Nama</th>
              <th class="px-4 py-2">NIK</th>
              <th class="px-4 py-2">Jenis Kelamin</th>
              <th class="px-4 py-2">TTL</th>
              <th class="px-4 py-2">Divisi</th>
              <th class="px-4 py-2">Ket. Pengaduan</th>
              <th class="px-4 py-2">Pengaduan</th>
              <th class="px-4 py-2">Status</th>
              <th class="px-4 py-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Contoh data -->
            <tr>
              <td class="border px-4 py-2">1</td>
              <td class="border px-4 py-2">DD/MM/YY</td>
              <td class="border px-4 py-2">Lorem ipsum dolor</td>
              <td class="border px-4 py-2">12345678910</td>
              <td class="border px-4 py-2">Lorem ipsum</td>
              <td class="border px-4 py-2">Lorem ipsum</td>
              <td class="border px-4 py-2">Lorem ipsum</td>
              <td class="border px-4 py-2">Lorem ipsum</td>
              <td class="border px-4 py-2">Lorem ipsum</td>
              <td class="border px-4 py-2">
                <span class="bg-green-200 text-green-700 px-2 py-1 rounded"
                  >Selesai</span
                >
              </td>
              <td class="border px-4 py-2">
                <button class="bg-yellow-400 text-white px-2 py-1 rounded">
                  🔍
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <script src="../js/sidebar.js"></script>
  </body>
</html>
