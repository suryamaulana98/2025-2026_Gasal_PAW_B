<?php
$surname    = isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '';
$email      = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$address    = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
$state      = isset($_POST['state']) ? $_POST['state'] : 'kosong';
$sex        = isset($_POST['sex']) ? $_POST['sex'] : '';
$vegetarian = isset($_POST['vegetarian']) ? 'checked' : '';

echo "<form name='myForm' action='processData_form.php' method='post'>";
echo "<label for='surname'>Nama Lengkap (surname) :</label>
      <input type='text' name='surname' size='31' value='$surname'><br><br>";

echo "<label for='email'>Email Address :</label>
      <input type='text' name='email' size='31' value='$email'><br><br>";

echo "<label for='password'>Password :</label>
      <input type='password' name='password' size='31'<br><br>";

echo "<label for='address'>Street Address :</label><br>
      <textarea name='address' rows='3' cols='22'>$address</textarea><br><br>";

echo "<label for='state'>State :</label>
      <select name='state'>";
echo "<option value='kosong'" . ($state == 'kosong' ? ' selected' : '') . ">[choose your state]</option>";
echo "<option value='Australia Capital Territory'" . ($state == 'Australia Capital Territory' ? ' selected' : '') . ">Australia Capital Territory</option>";
echo "<option value='Queensland'" . ($state == 'Queensland' ? ' selected' : '') . ">Queensland</option>";
echo "<option value='Victoria'" . ($state == 'Victoria' ? ' selected' : '') . ">Victoria</option>";
echo "</select><br><br>";

echo "<input type='hidden' name='country' value='Indonesia'><br>";

echo "<label for='sex'>Gender</label>
      <input type='radio' name='sex' value='male'" . ($sex == 'male' ? ' checked' : '') . ">Male
      <input type='radio' name='sex' value='female'" . ($sex == 'female' ? ' checked' : '') . ">Female
      <br><br>";

echo "<label for='vegetarian'>Vegetarian?</label>
      <input type='checkbox' name='vegetarian' $vegetarian><br><br>";

echo "<input type='submit' value='submit'> ";
echo "<input type='reset' value='reset'>";
echo "</form>";
?>