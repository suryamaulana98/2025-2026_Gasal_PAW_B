<?php
require 'db.php';

$awal = $_GET['awal'] ?? '';
$akhir = $_GET['akhir'] ?? '';

$where = "";
if (!empty($awal) && !empty($akhir)) {
    $awal_bersih = mysqli_real_escape_string($kon, $awal);
    $akhir_bersih = mysqli_real_escape_string($kon, $akhir);
    
    $where = "WHERE tanggal BETWEEN '$awal_bersih' AND '$akhir_bersih'";
} 

$query = "SELECT nama_barang, jumlah, tanggal 
          FROM penjualan 
          $where
          ORDER BY tanggal DESC";
          
$hasil = mysqli_query($kon, $query);

$labels = [];
$jumlah_transaksi = [];
$tanggal_transaksi = [];
$rows  = []; 

if ($hasil) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $labels[] = $row['nama_barang'];
        $jumlah_transaksi[] = (int)$row['jumlah'];
        $tanggal_transaksi[] = $row['tanggal'];
        $rows[]  = $row;
    }
}


$data = [
    'labels' => $labels,
    'jumlah' => $jumlah_transaksi,
    'tanggal' => $tanggal_transaksi,
    'rows'  => $rows
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Data Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="filter-form">
            <form action="" method="get">
                <input type="date" name="awal" id="awal" value="<?php echo htmlspecialchars($awal); ?>">
                <input type="date" name="akhir" id="akhir" value="<?php echo htmlspecialchars($akhir); ?>">
                <button type="submit" class="btn-tampilkan">Tampilkan</button>
            </form>
        </div>
        
        <div class="action-buttons">
            <button onclick="window.location.href='exel.php?awal=<?=$awal?>&akhir=<?=$akhir?>'" class="btn-excel">Export Excel</button>
            <button onclick="window.print()" class="btn-cetak">Cetak</button>
        </div>

        <h3>
            Data Transaksi Penjualan 
            <?php 
            if (!empty($where)) {
                echo "Periode: " . htmlspecialchars($awal) . " s/d " . htmlspecialchars($akhir);
            } else {
                echo "Total Transaksi";
            }
            ?>
        </h3>

        <div style="width : 80%; max-width: 600px; margin: 20px auto;">
            <canvas id="myChart"></canvas>
        </div>

        <div>
            <table border="1" class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Transaksi</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php if (!empty($data['rows'])): ?>
                        <?php foreach ($data['rows'] as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
                                <td><?php echo number_format($row['jumlah']); ?></td>
                                <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Tidak ada data penjualan yang ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    const ctx = document.getElementById('myChart');

    const chartLabels = <?php echo json_encode($data['labels']); ?>;
    const chartData = <?php echo json_encode($data['jumlah']); ?>;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Terjual per Transaksi',
                data: chartData,
                borderWidth: 1,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.5)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title:{
                        display: true,
                        text: 'Jumlah'
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Jumlah Barang Terjual per Transaksi'
                }
            }
        }
    });
    </script>

</body>
</html>