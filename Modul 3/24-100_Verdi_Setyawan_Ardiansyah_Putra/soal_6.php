<?php
$warna1 = array("Red","Green","Blue");
$warna2 = array("Purple","Black","Yellow");

echo"1. array_push() <br>";
array_push($warna1,"Grey");
print_r($warna1);
echo"<br><br>";

echo"2. array_merge() <br>";
$warna3 = array_merge($warna1, $warna2);
print_r($warna3);
echo"<br><br>";

echo"3. array_values() <br>";
$Vwarna = array_values($warna3);
print_r($Vwarna);
echo"<br><br>";

echo"4. array_search() <br>";
$cari = array_search("Green", $warna3);
echo"Index Green : $cari <br><br>";

echo"5. array_filter() <br>";
$filter = array_filter($warna3,function($warna){
    return strlen($warna) < 5;
});
print_r($filter);
echo"<br><br>";

echo"6. fungsi sorting <br>";
sort($warna3);
print_r($warna3);
?>