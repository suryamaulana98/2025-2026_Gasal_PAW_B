<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suplier";

$Conn = mysqli_connect($servername, $username,$password,$dbname);
if(!$Conn){
    echo "koneksi error";
}
echo "koneksi berhasil";
?>