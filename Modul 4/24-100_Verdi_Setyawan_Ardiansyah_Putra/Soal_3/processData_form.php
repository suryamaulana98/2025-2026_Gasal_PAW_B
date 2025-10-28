<?php
require_once 'validate.inc';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    validateNIM($errors, $_POST, 'nim');

    validateName($errors, $_POST, 'surname');

    validateIPK($errors, $_POST, 'ipk');
    
    validateDate($errors, $_POST, 'tgl_lahir');
    
    if (empty(trim($_POST['email'] ?? ''))) {
        $errors['email'] = "Email tidak boleh kosong.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    } 
    elseif (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $_POST['email'])) {
        $errors['email'] = "Format email tidak valid.";
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "Password harus diisi.";
    } 
    elseif (strlen($_POST['password']) < 8) {
        $errors['password'] = "Password minimal 8 karakter.";
    }
    elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $_POST['password'])) {
        $errors['password'] = "Password harus mengandung minimal satu huruf besar, satu huruf kecil, dan satu angka.";
    }

    if (!empty($errors)) {
        include 'form.inc';
    } else {
        echo "<h2>Form berhasil dikirim tanpa error!</h2>";
        echo "<p><b>NIM:</b> " . htmlspecialchars($_POST['nim']) . "</p>";
        echo "<p><b>Nama:</b> " . htmlspecialchars($_POST['surname']) . "</p>";
        echo "<p><b>Email:</b> " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p><b>IPK:</b> " . htmlspecialchars($_POST['ipk']) . "</p>";
        echo "<p><b>Tanggal Lahir:</b> " . htmlspecialchars($_POST['tgl_lahir']) . "</p>";
        echo "<p><b>Password:</b> [Tersimpan Aman]</p>"; 
    }
} else {
    include 'form.inc';
}
?>