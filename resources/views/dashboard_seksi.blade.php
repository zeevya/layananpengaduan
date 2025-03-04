<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
    <link rel="stylesheet" href="styles.css" />
</head>

<body class="bg-gray-100 flex">
    <div id="sidebar-container"></div>

    <main class="flex-1 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Dashboard Pengaduan</h2>
            <button class="bg-gray-800 text-white px-4 py-2 rounded">Download</button>
        </div>

        <!-- Menu Dashboard -->
        <div class="flex justify-between mb-2">
            <select class="border p-2 rounded">
                <option>All-time</option>
                <option>Last Month</option>
            </select>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="p-6 bg-white shadow rounded-lg text-center">
                <p class="text-gray-500">Jumlah Pengaduan</p>
                <h3 class="text-3xl font-bold">3,298</h3>
            </div>
            <div class="p-6 bg-white shadow rounded-lg text-center">
                <p class="text-gray-500">Pengaduan dalam Proses</p>
                <h3 class="text-3xl font-bold">1,250</h3>
            </div>
            <div class="p-6 bg-white shadow rounded-lg text-center">
                <p class="text-gray-500">Pengaduan Selesai</p>
                <h3 class="text-3xl font-bold">2,000</h3>
            </div>
        </div>

        <!-- Grafik -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="p-6 bg-white shadow rounded-lg">
                <canvas id="barChart"></canvas>
            </div>
            <div class="grid grid-cols-2 gap-4 ">
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-xl font-bold mb-4 text-center">INTALTUSKIM</h3>
                    <canvas id="pieChartIntaltuskim"></canvas>
                </div>
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-xl font-bold mb-4 text-center">INTELDAKIM</h3>
                    <canvas id="pieChartInteldakim"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-6xl">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Kecamatan Paling Banyak Pengaduan</h2>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="text-left border-b-2">
                                <th class="p-2">#</th>
                                <th class="p-2">Kecamatan</th>
                                <th class="p-2">Popularity</th>
                                <th class="p-2">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="p-2">1</td>
                                <td class="p-2">Benowo</td>
                                <td class="p-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-500 h-2 rounded-full" style="width: 45%;"></div>
                                    </div>
                                </td>
                                <td class="p-2 text-blue-500 font-semibold">45</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-2">2</td>
                                <td class="p-2">Bunder</td>
                                <td class="p-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-400 h-2 rounded-full" style="width: 29%;"></div>
                                    </div>
                                </td>
                                <td class="p-2 text-green-500 font-semibold">29</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-2">3</td>
                                <td class="p-2">Tandes</td>
                                <td class="p-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-purple-400 h-2 rounded-full" style="width: 18%;"></div>
                                    </div>
                                </td>
                                <td class="p-2 text-purple-500 font-semibold">18</td>
                            </tr>
                            <tr>
                                <td class="p-2">4</td>
                                <td class="p-2">Sukomanunggal</td>
                                <td class="p-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-orange-400 h-2 rounded-full" style="width: 25%;"></div>
                                    </div>
                                </td>
                                <td class="p-2 text-orange-500 font-semibold">25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-6 bg-white shadow rounded-lg">
                <h3 class="text-xl font-bold mb-4">Overview</h3>
                <canvas id="overviewChart"></canvas>
            </div>
        </div>

        <div class="p-6 bg-white shadow rounded-lg mb-6">
            <h3 class="text-xl font-bold mb-4">Pengaduan</h3>
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-blue-100 text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Seksi</th>
                        <th class="border border-gray-300 px-4 py-2">Popularity</th>
                        <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2">1</td>
                        <td class="border border-gray-300 px-4 py-2">INTELDAKIM</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="bg-blue-500 text-xs text-white text-center p-1 rounded-full"
                                    style="width: 80%">80%</div>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-blue-500 font-bold">45</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2">2</td>
                        <td class="border border-gray-300 px-4 py-2">INTALTUSKIM</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="bg-green-500 text-xs text-white text-center p-1 rounded-full"
                                    style="width: 60%">60%</div>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-green-500 font-bold">29</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2">3</td>
                        <td class="border border-gray-300 px-4 py-2">LANTASKIM</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="bg-purple-500 text-xs text-white text-center p-1 rounded-full"
                                    style="width: 40%">40%</div>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-purple-500 font-bold">18</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2">4</td>
                        <td class="border border-gray-300 px-4 py-2">TIKIM</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="bg-orange-500 text-xs text-white text-center p-1 rounded-full"
                                    style="width: 50%">50%</div>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-orange-500 font-bold">25</td>
                    </tr>
                </tbody>
            </table>
        </div>



    </main>

    </main>
    </div>
    <script src="js/sidebar.js"></script>
    <script>
    const ctx = document.getElementById('chartPengaduan').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Benowo', 'Bunder', 'Tandes', 'Sukomanunggal'],
            datasets: [{
                label: 'Jumlah Pengaduan',
                data: [45, 29, 18, 25],
                backgroundColor: ['#3b82f6', '#22c55e', '#a855f7', '#f97316'],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    </script>
    <script>
    // Bar Chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Jumlah Pengaduan',
                data: [100, 200, 300, 400, 250, 350, 450, 500, 550, 600, 700, 750],
                backgroundColor: 'blue'
            }]
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Sedang Diproses', 'Belum Ditangani'],
            datasets: [{
                data: [50, 30, 20],
                backgroundColor: ['green', 'orange', 'red']
            }]
        }
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById("overviewChart").getContext("2d");

        new Chart(ctx, {
            type: "line",
            data: {
                labels: ["April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "INTALTUSKIM",
                        data: [100000, 110000, 90000, 50000, 95000, 100000, 120000, 90000, 110000],
                        borderColor: "blue",
                        fill: false,
                    },
                    {
                        label: "INTELDAKIM",
                        data: [80000, 90000, 95000, 120000, 100000, 110000, 105000, 95000, 100000],
                        borderColor: "green",
                        fill: false,
                    },
                    {
                        label: "LANTASKIM",
                        data: [60000, 70000, 85000, 30000, 65000, 70000, 75000, 80000, 85000],
                        borderColor: "orange",
                        fill: false,
                    },
                    {
                        label: "TIKIM",
                        data: [90000, 95000, 85000, 54000, 85000, 95000, 100000, 105000, 110000],
                        borderColor: "purple",
                        fill: false,
                    }
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: "top",
                    },
                    tooltip: {
                        mode: "index",
                        intersect: false,
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                            color: "#ddd"
                        }
                    },
                },
            },
        });
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const createPieChart = (canvasId, labels, data, colors) => {
            const ctx = document.getElementById(canvasId).getContext("2d");
            new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: colors
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "bottom",
                        }
                    }
                }
            });
        };

        // Data Pie Chart
        const labels = ["Selesai", "Sedang Diproses", "Belum Ditangani"];
        const colors = ["green", "orange", "red"];

        createPieChart("pieChartIntaltuskim", labels, [50, 30, 20], colors);
        createPieChart("pieChartInteldakim", labels, [60, 25, 15], colors);
        createPieChart("pieChartLantaskim", labels, [40, 35, 25], colors);
        createPieChart("pieChartTikim", labels, [55, 30, 15], colors);
    });
    </script>


</body>

</html>