<?php
$kon = mysqli_connect("localhost", "root", "", "penjualan");

if (!$kon) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>