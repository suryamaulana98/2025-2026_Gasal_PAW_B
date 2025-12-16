<?php
$kon = mysqli_connect("localhost", "root", "", "reporting");

if (!$kon) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>