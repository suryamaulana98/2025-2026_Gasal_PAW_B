<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170", "Alan"=>"167", "Zaki"=>"175", "Riel"=>"179", "Rafi"=>"187", "Nafaul"=>"177");

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

echo "<br>";
$weight = array("Alan"=>49, "Nafaul"=>46, "zaki"=>44);
foreach($weight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>