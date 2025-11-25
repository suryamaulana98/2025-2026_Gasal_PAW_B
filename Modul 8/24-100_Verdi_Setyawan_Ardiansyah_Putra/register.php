<?php
require "db.php";

if(isset($_POST['tambah'])){
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password_asli = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars('2');
    $pw = md5($password_asli); 

    if(empty($nama) || empty($password_asli) || empty($username)){
        $error = "Nama, Username, Password harus diisi!";
    } else {
        $tambah = mysqli_query($kon,"INSERT INTO data_user (nama,username,password,role) values ('$nama','$username','$pw','$role')");
        
        if($tambah){
            header("Location: login.php");
            exit;
        } else {
            $error = "Register Gagal. Coba lagi.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User - Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header text-center bg-primary text-white">
                        <h3><i class="bi bi-person-plus-fill"></i> Registrasi User Baru</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input placeholder="Masukkan Nama" name="nama" type="text" id="nama" class="form-control"  >
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input placeholder="Buat Username" name="username" type="text" id="username" class="form-control"  >
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password:</label>
                                <input placeholder="Buat Password" name="password" type="password" id="password" class="form-control"  >
                            </div>

                            <button type="submit" name="tambah" class="btn btn-primary w-100 mb-2">Simpan</button>
                            
                            <a href="login.php" class="btn btn-outline-secondary w-100">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>