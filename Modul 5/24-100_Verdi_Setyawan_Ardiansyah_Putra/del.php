<?php
require_once "koneksi.php";

$id = $_GET["id"];

if(!isset($_GET['id']) || empty($id)){
    echo "ID Tidak ditemukan didalam database.<br>";
    echo "<a href='read.php'>Kembali</a>";
    die();
}

$del = mysqli_query($Conn,"DELETE FROM data_suplier where id = '$id'");

if($del){
    header("Location: read.php");
} else {
    echo "Data didalam database tidak berhasil terhapus.";
    echo "<a href='read.php'>Kembali</a>";
}