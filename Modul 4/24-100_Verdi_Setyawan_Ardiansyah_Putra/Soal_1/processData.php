<?php
require 'validate.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    validateName($errors, $_POST, 'surname');

    if (empty($errors)) {
        echo "Data OK! <br><hr>";
        echo "<h2>Hasil Data Form</h2>";
        echo "<hr>";
        foreach ($_POST as $key => $value) {
            if ($value == "") $value = "(kosong)";
            echo "<b>" . htmlspecialchars($key) . ":</b> " . htmlspecialchars($value) . "<br>";
        }
    } else {
        echo "Data invalid!<br><br>";
        foreach ($errors as $field => $message) {
            if ($message == 'required') {
                echo "Field <b>$field</b> harus diisi.<br>";
            } elseif ($message == 'invalid') {
                echo "Field <b>$field</b> hanya boleh berisi huruf alfabet.<br>";
            }
        }
    }
}
?>