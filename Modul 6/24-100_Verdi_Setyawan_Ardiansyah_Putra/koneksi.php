<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penjualan";

$kon = mysqli_connect($servername, $username,$password,$dbname);
if(!$kon){
    echo "koneksi error";
}
?>