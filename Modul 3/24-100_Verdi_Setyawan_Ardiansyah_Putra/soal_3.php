<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.<br>";

$height["Alan"] = "167";
$height["Zaki"] = "175";
$height["Riel"] = "179";
$height["Rafi"] = "187";
$height["Nafaul"] = "177";

$keys = array_keys($height);
echo "Nilai terakhir : " . end($keys) . "<br>";
echo "Hapus Data : $height[Nafaul] <br>";
unset($height["Nafaul"]);
$keys = array_keys($height);
echo "Nilai terakhir : " . end($keys) . "<br>";

$weight = array("Alan"=>49, "Nafaul"=>46, "zaki"=>44);
echo "Data kedua : $weight[Nafaul] <br>";
?>