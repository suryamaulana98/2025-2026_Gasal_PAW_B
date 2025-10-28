<?php
$nim        = isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : '';
$surname    = isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '';
$email      = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$ipk        = isset($_POST['ipk']) ? htmlspecialchars($_POST['ipk']) : '';
$tgl_lahir  = isset($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir']) : '';

$error_nim      = isset($errors['nim']) ? "<span style='color: red;'>* " . $errors['nim'] . "</span>" : '';
$error_surname  = isset($errors['surname']) ? "<span style='color: red;'>* " . $errors['surname'] . "</span>" : '';
$error_email    = isset($errors['email']) ? "<span style='color: red;'>* " . $errors['email'] . "</span>" : '';
$error_password = isset($errors['password']) ? "<span style='color: red;'>* " . $errors['password'] . "</span>" : '';
$error_ipk      = isset($errors['ipk']) ? "<span style='color: red;'>* " . $errors['ipk'] . "</span>" : '';
$error_tgl_lahir= isset($errors['tgl_lahir']) ? "<span style='color: red;'>* " . $errors['tgl_lahir'] . "</span>" : '';


echo "<h2>Form Input Data Mahasiswa Lengkap</h2>";
echo "<form name='myForm' action='processData_form.php' method='post'>";

echo "<label for='surname'>Nama Lengkap:</label>
      <input type='text' name='surname' size='31' value='$surname'>$error_surname<br><br>";

echo "<label for='nim'>NIM:</label>
      <input type='text' name='nim' size='31' value='$nim'>$error_nim<br><br>";

echo "<label for='email'>Email Address:</label>
      <input type='text' name='email' size='31' value='$email'>$error_email<br><br>";

echo "<label for='password'>Password:</label>
      <input type='password' name='password' size='31'>$error_password<br><br>";

echo "<label for='ipk'>IPK:</label>
      <input type='text' name='ipk' size='31' value='$ipk'>$error_ipk<br><br>";
      
echo "<label for='tgl_lahir'>Tanggal Lahir YYYY-MM-DD:</label>
      <input type='date' name='tgl_lahir' size='31' value='$tgl_lahir'>$error_tgl_lahir<br><br>";

echo "<input type='submit' value='submit'> ";
echo "<input type='reset' value='reset'>";
echo "</form>";
?>