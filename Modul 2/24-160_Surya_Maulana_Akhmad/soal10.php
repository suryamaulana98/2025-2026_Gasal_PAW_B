<?php
echo "=== Program Kasir Sederhana ===<br>";

echo "1. Nasi Goreng - Rp15000<br>";
echo "2. Mie Ayam - Rp12000<br>";
echo "3. Es Teh - Rp5000<br>";
echo "4. Ayam Geprek - Rp17000<br><br>";

$total = 0;


$pilihan = [1, 3, 4];   // menu yang dipilih
$jumlah  = [2, 1, 1];   // jumlah tiap menu

$i = 0;
while ($i < count($pilihan)) {
    $menu = $pilihan[$i];
    $jml  = $jumlah[$i];

    if ($menu == 1) {
        $nama = "Nasi Goreng";
        $harga = 15000;
    } elseif ($menu == 2) {
        $nama = "Mie Ayam";
        $harga = 12000;
    } elseif ($menu == 3) {
        $nama = "Es Teh";
        $harga = 5000;
    } elseif ($menu == 4) {
        $nama = "Ayam Geprek";
        $harga = 17000;
    } else {
        $nama = "Menu Tidak Dikenal";
        $harga = 0;
    }

    $subtotal = $harga * $jml;
    $total += $subtotal;

    echo "Anda membeli $jml $nama = Rp $subtotal<br>";

    $i++;
}

echo "<br>Total yang harus dibayar: Rp $total<br>";
echo "Terima kasih sudah berbelanja!<br>";
