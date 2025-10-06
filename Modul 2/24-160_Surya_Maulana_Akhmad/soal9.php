<?php 

$nilai = 10;

if ($nilai >= 90) {
    echo "Nilai anda $nilai dan dapat nilai A";
} elseif ($nilai >= 80 && $nilai < 90) {
    echo "Nilai anda $nilai dan dapat nilai B";
} elseif ($nilai >= 70 && $nilai < 80) {
    echo "Nilai anda $nilai dan dapat nilai C";
} else {
    echo "Nilai anda $nilai dan dapat nilai D";
}

?>