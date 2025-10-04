<?php
$kalimat = "Verdi NIM 240411100100";

echo "Panjang string: " . strlen($kalimat) . "<br>";
echo "Jumlah kata: " . str_word_count($kalimat) . "<br>";
echo "Dibalik: " . strrev($kalimat) . "<br>";
echo "Posisi 'NIM': " . strpos($kalimat, "NIM") . "<br>";
echo "Ganti kata: " . str_replace("Verdi", "Ardiansyah", $kalimat);
?>