<?php
function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z\s\.'-]+$/"; 
    $value = trim($field_list[$field_name] ?? '');

    if (empty($value)) {
        $errors[$field_name] = 'Nama lengkap wajib diisi.';
    }
    else if (!preg_match($pattern, $value)) {
        $errors[$field_name] = 'Nama hanya boleh mengandung huruf, spasi, titik, apostrof (\'), dan tanda hubung (-).';
    }
}

function validateNIM(&$errors, $field_list, $field_name, $length = 12)
{
    $value = trim($field_list[$field_name] ?? '');

    if (empty($value)) {
        $errors[$field_name] = 'NIM wajib diisi.';
        return;
    }

    if (!preg_match("/^\d+$/", $value)) {
        $errors[$field_name] = 'NIM harus berupa angka (0-9) saja, tanpa spasi di tengah atau karakter lain.';
    }
    else if (strlen($value) !== $length) {
        $errors[$field_name] = "NIM harus memiliki panjang $length digit.";
    }
}

function validateIPK(&$errors, $field_list, $field_name)
{
    $value = trim($field_list[$field_name] ?? '');

    if (empty($value)) {
        $errors[$field_name] = 'IPK wajib diisi.';
        return;
    }

    if (filter_var($value, FILTER_VALIDATE_FLOAT) === false) {
        $errors[$field_name] = 'IPK harus berupa angka desimal yang valid.';
    }
    else if ($value < 0.00 || $value > 4.00) {
        $errors[$field_name] = 'IPK harus berada dalam rentang 0.00 hingga 4.00.';
    }
}

function validateDate(&$errors, $field_list, $field_name)
{
    $value = trim($field_list[$field_name] ?? '');

    if (empty($value)) {
        $errors[$field_name] = 'Tanggal Lahir wajib diisi.';
        return;
    }

    $parts = explode('-', $value);

    if (count($parts) === 3) {
        $year = (int) $parts[0];
        $month = (int) $parts[1];
        $day = (int) $parts[2];

        if (!checkdate($month, $day, $year)) {
            $errors[$field_name] = 'Tanggal tidak valid (bukan tanggal kalender yang benar).';
        }
    } else {
        $errors[$field_name] = 'Format tanggal harus YYYY-MM-DD.';
    }
}
?>