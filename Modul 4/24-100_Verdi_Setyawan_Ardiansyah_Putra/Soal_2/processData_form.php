<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['surname'])) {
        $errors['surname'] = "Nama lengkap harus diisi.";
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "Email tidak boleh kosong.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "Password harus diisi.";
    } elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = "Password minimal 6 karakter.";
    }

    if (empty($_POST['address'])) {
        $errors['address'] = "Alamat harus diisi.";
    }

    if (!isset($_POST['state']) || $_POST['state'] == "kosong") {
        $errors['state'] = "Pilih state terlebih dahulu.";
    }

    if (!isset($_POST['sex'])) {
        $errors['sex'] = "Pilih jenis kelamin.";
    }

    if (!empty($errors)) {
        echo "<h2>Terjadi kesalahan, periksa input berikut:</h2>";
        echo "<ul>";
        foreach ($errors as $field => $error) {
            echo "<li><strong>$field:</strong> $error</li>";
        }
        echo "</ul>";

        include 'form.inc';
    } else {
        echo "<h2>Form berhasil dikirim tanpa error!</h2>";
        echo "<p><b>Nama:</b> " . htmlspecialchars($_POST['surname']) . "</p>";
        echo "<p><b>Email:</b> " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p><b>Password:</b> " . htmlspecialchars($_POST['password']) . "</p>";
        echo "<p><b>Alamat:</b> " . htmlspecialchars($_POST['address']) . "</p>";
        echo "<p><b>State:</b> " . htmlspecialchars($_POST['state']) . "</p>";
        echo "<p><b>Gender:</b> " . htmlspecialchars($_POST['sex']) . "</p>";
        echo "<p><b>Vegetarian:</b> " . (isset($_POST['vegetarian']) ? "Ya" : "Tidak") . "</p>";
    }
} else {
    include 'form.inc';
}
?>