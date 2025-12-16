<?php
require_once "koneksi.php";

$id = $_GET["id"];

if(!isset($_GET['id']) || $id == 0){
    echo "ID Tidak ditemukan didalam database.<br>";
    echo "<a href='read.php'>Kembali</a>";
    die();
}

$query = "SELECT * FROM data_suplier WHERE id = '$id'";
$sup = mysqli_query($Conn, $query);

if (mysqli_num_rows($sup) == 0) {
    echo "Data supplier tidak ditemukan.<br>";
    echo "<a href='read.php'>Kembali</a>";
    die();
}

$datasup = mysqli_fetch_assoc($sup);

if(isset($_POST['update'])){
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telp = htmlspecialchars($_POST['telp']);
    $update = mysqli_query($Conn,"UPDATE data_suplier SET nama='$nama',alamat='$alamat',telp='$telp' where id='$id'");
    if($update){
    header("Location: read.php");
    exit();
} else {
    echo "Data tidak berhasil di update.";
    echo "<a href='update.php?id=$id'>Kembali</a>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <form action="" method="post">
        <label for="nama">Nama: </label><input placeholder="Nama" name="nama" type="text" id="nama" value="<?= htmlspecialchars($datasup['nama']); ?>"><br><br>
        <label for="telp">Telp: </label><input placeholder="Telefon" name="telp" type="number" id="telp" value="<?= htmlspecialchars($datasup['telp']); ?>"><br><br>
        <label for="alamat">Alamat: </label><input placeholder="Alamat" type="text" name="alamat" id="alamat" value="<?= htmlspecialchars($datasup['alamat']); ?>"><br><br>
        <button type="submit" name="update">Update</button>
        <button><a href="read.php">Batal</a></button>
    </form>
</body>
</html>