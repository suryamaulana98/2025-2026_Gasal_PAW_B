<?php
require 'validate.inc';

// if (validateName($_POST, 'surname')) {
//     echo 'Data OK!';
// } else {
//     echo 'Data invalid!';
// }

$errors = array();
validateName($errors, $_POST, 'surname');
if ($errors) {
    echo
    'Errors:<br/>';
    foreach ($errors as $field => $error)
        echo "$field $error</br>";
} else echo
'Data OK!';