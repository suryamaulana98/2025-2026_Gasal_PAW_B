<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
array_push($fruits,"pineapple","carrot","grape","orange","pear");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".<br>";
echo "Nilai pada indeks tertinggi: " . $fruits[count($fruits) - 1] . "<br>";
echo "Indeks tertinggi: " . (count($fruits) - 1) . "<br>";

unset($fruits[7]);
$fruits = array_values($fruits);
echo "Nilai pada indeks tertinggi: " . $fruits[count($fruits) - 1] . "<br>";
echo "Indeks tertinggi: " . (count($fruits) - 1) . "<br>";

$vegies = array("watermelon", "melon", "manggo");
echo "Daftar vegies:<br>";
foreach ($vegies as $v) {
    echo "- $v<br>";
}
?>