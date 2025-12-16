<?php
session_start();
include "db.php";

function ceklogin($data){
    global $kon;
    $username = $data['username'];
    $password = md5($data['password']);
    $query = "SELECT * FROM data_user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($kon,$query);

    if (mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user['nama'];
        $_SESSION['role'] = ($user['role'] == '1') ? 'Admin' : 'user';
        header("Location: index.php");
        exit;
    } else {
        return "Username atau Password anda kosong/salah atau anda belum mempunyai akun untuk login!!.";
    }
}

?>