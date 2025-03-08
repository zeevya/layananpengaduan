<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengaduan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include('sidebar')

    <h1>Dashboard Pengaduan</h1>
    <!-- Konversi data dari Laravel ke JavaScript sebelum digunakan -->
    <script>
    var barChartData = JSON.parse('{!! $barChartData !!}');
    var pieChartData = JSON.parse('{!! $pieChartData !!}');
    var lineChartData = JSON.parse('{!! $lineChartData !!}');
    // Membuat datasets untuk Line Chart
    var lineDatasets = [];
    for (var category in lineChartData) {
        lineDatasets.push({
            label: category,
            data: lineChartData[category],
            borderColor: "#" + Math.floor(Math.random() * 16777215).toString(16),
            fill: false
        });
    }
    </script>

    <!-- Bar Chart -->
    <canvas id="barChart"></canvas>
    <script>
    var ctx = document.getElementById('barChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Pengaduan',
                data: barChartData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    });
    </script>

    <!-- Pie Chart -->
    <canvas id="pieChart"></canvas>
    <script>
    var ctx2 = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Selesai', 'Sedang Diproses', 'Belum Ditangani'],
            datasets: [{
                data: pieChartData,
                backgroundColor: ['#28a745', '#ffc107', '#dc3545']
            }]
        }
    });
    </script>

    <!-- Line Chart -->
    <canvas id="lineChart"></canvas>
    <script>
    var ctx3 = document.getElementById('lineChart').getContext('2d');
    new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: lineDatasets
        }
    });
    </script>

</body>

</html>