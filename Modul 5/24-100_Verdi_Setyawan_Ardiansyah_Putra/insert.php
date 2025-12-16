<?php
require_once "koneksi.php";

if(isset($_POST['tambah'])){
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telp = htmlspecialchars($_POST['telp']);
    if(empty($nama) || empty($alamat) || empty($telp)){
        header("Location: insert.php");
    } else {
        $tambah = mysqli_query($Conn,"INSERT INTO data_suplier (nama,alamat,telp) values ('$nama','$alamat','$telp')");
        if($tambah){
            header("Location: read.php");
        } else {
            echo "Data tidak berhasil di tambahkan.";
            echo "<a href='insert.php'>Kembali</a>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <form action="" method="post">
        <label for="nama">Nama: </label><input placeholder="Nama" name="nama" type="text" id="nama"><br><br>
        <label for="telp">Telp: </label><input placeholder="Telefon" name="telp" type="number" id="telp"><br><br>
        <label for="alamat">Alamat: </label><input type="text" placeholder="Alamat" name="alamat" id="alamat"><br><br>
        <button type="submit" name="tambah">Simpan</button>
        <button><a href="read.php">Batal</a></button>
    </form>
</body>
</html>