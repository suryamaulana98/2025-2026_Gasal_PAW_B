<?php
session_start();

if (!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
$username = $_SESSION['user'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .navbar-brand { font-weight: bold; letter-spacing: 1px; }
        .hero-section {
            background-color: #f8f9fa;
            padding: 4rem 0;
            border-bottom: 1px solid #e9ecef;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-chart-line me-2"></i> Sistem Penjualan
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home me-1"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../Modul 6/24-100_Verdi_Setyawan_Ardiansyah_Putra/index.php"><i class="fas fa-exchange-alt me-1"></i> Transaksi</a>
                </li>
                
                <?php if ($role == 'Admin') : ?>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="../../Modul 5/24-100_Verdi_Setyawan_Ardiansyah_Putra/read.php"><i class="fas fa-database me-1"></i> Data Master</a>
                </li>
                <?php endif; ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="../../Modul 7/24-100_Verdi_Setyawan_Ardiansyah_Putra/index.php"><i class="fas fa-file-alt me-1"></i> Laporan</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> <?= $username; ?>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><span class="dropdown-item-text text-muted small"><i class="fas fa-user-tag me-1"></i> Role: <?= $role; ?></span></li>
                        <li><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="#"><i class="fas fa-id-card me-2"></i> Lihat Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Pengaturan</a></li>
                        
                        <li><hr class="dropdown-divider"></li>
                        
                        <li>
                            <a class="dropdown-item text-danger fw-bold" href="logout.php" onclick="return confirm('Yakin ingin keluar dari sistem?')">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container mt-5">
    
    <div class="card text-white bg-primary h-100 shadow mb-5">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fas fa-user-shield me-2"></i> Detail Akun</h5>
                <i class="fas fa-info-circle fa-2x"></i>
            </div>
            <p class="card-text mt-3">
                Nama: <?= $username; ?><br>
                Role: <span class="badge bg-warning text-dark"><?= $role; ?></span>
            </p>
        </div>
    </div>
    
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-primary">Selamat Datang, <?= $username; ?>!</h1>
            <p class="col-md-8 fs-4">Anda berhasil masuk ke Halaman Dashboard Sistem Penjualan. Silakan jelajahi fitur yang tersedia sesuai peran Anda (Role: <?= $role; ?>).</p>
            <hr class="my-4">
            <a class="btn btn-success btn-lg" type="button" href="../../Modul 6/24-100_Verdi_Setyawan_Ardiansyah_Putra/index.php">Mulai Transaksi Sekarang <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>