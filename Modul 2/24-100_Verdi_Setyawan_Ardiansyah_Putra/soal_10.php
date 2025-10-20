<?php
function tampilkanMenu($menu) {
    echo "<h3>=== Daftar Menu ===</h3>";
    echo "<ol>";
    foreach ($menu as $kode => $item) {
        echo "<li>{$item['nama']} - Rp" . number_format($item['harga'], 0, ',', '.') . "</li>";
    }
    echo "</ol>";
}

function hitungTotal($menu, $pesanan) {
    $total = 0;
    echo "<h3>=== Detail Pesanan ===</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Menu</th><th>Jumlah</th><th>Harga</th><th>Subtotal</th></tr>";

    foreach ($pesanan as $kode => $jumlah) {
        if (isset($menu[$kode])) {
            $nama = $menu[$kode]['nama'];
            $harga = $menu[$kode]['harga'];
            $subtotal = $harga * $jumlah;
            $total += $subtotal;

            echo "<tr>
                    <td>$nama</td>
                    <td>$jumlah</td>
                    <td>Rp" . number_format($harga, 0, ',', '.') . "</td>
                    <td>Rp" . number_format($subtotal, 0, ',', '.') . "</td>
                  </tr>";
        }
    }

    echo "<tr><td colspan='3'><strong>Total</strong></td>
          <td><strong>Rp" . number_format($total, 0, ',', '.') . "</strong></td></tr>";
    echo "</table>";
    return $total;
}

function kasir() {
    $menu = [
        1 => ["nama" => "Nasi Goreng", "harga" => 15000],
        2 => ["nama" => "Mie Ayam", "harga" => 12000],
        3 => ["nama" => "Soto Ayam", "harga" => 13000],
        4 => ["nama" => "Es Teh", "harga" => 5000],
        5 => ["nama" => "Es Jeruk", "harga" => 6000],
    ];

    $pesanan = [
        1 => 2,
        4 => 1,
        5 => 2,
        3 => 7
    ];

    tampilkanMenu($menu);
    $total = hitungTotal($menu, $pesanan);

    echo "<h3>=== Struk Pembayaran ===</h3>";
    echo "<p>Total Bayar: <strong>Rp" . number_format($total, 0, ',', '.') . "</strong></p>";
    echo "<p>Terima kasih telah berbelanja!</p>";
}
kasir();
?>
