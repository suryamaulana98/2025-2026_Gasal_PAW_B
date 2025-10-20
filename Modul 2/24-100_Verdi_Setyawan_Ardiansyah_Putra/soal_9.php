<?php
function cek($nilai) {
    if ($nilai >= 90) {
        return "A";
    } elseif ($nilai >= 80) {
        return "B";
    } elseif ($nilai >= 70) {
        return "C";
    } elseif ($nilai >= 60) {
        return "D";
    } else {
        return "E";
    }
}
echo "Nilai 95 = " . cek(25) . "<br>";
echo "Nilai 72 = " . cek(72) . "<br>";
echo "Nilai 50 = " . cek(50) . "<br>";
?>