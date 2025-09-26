<?php
function no_argu() {
    echo "Hellow World!<br>";
}
function argu_1($name) {
    echo "Halo, nama saya $name!<br>";
}
function argu_2($a, $b) {
    echo "Hasil perkalian: ($a) x ($b) = " . ($a * $b) . "<br>";
}
function nama($name = "Unknown") {
    echo "Halo, nama saya $name<br>";
}
function bagi($x, $y) {
    return $x / $y;
}
no_argu();
argu_1("Verdi");
argu_2(20, 3);
nama();
nama("Ardiansyah");
echo "Hasil pembagian: (30) : (5) = " . bagi(30, 5);
?>