<?php
require_once "koneksi.php";

if (isset($_POST)) {
    $result = mysqli_query($kon, "SELECT id_user FROM data_user LIMIT 1");
    $user = mysqli_fetch_assoc($result);
    
    $no_nota = date('YmdHis') . rand(100, 999);
    echo "No . Nota: ".$no_nota."<br>";

    if (isset($_POST['idbarang']) && isset($_POST['jumlahbarang']) && count($_POST['idbarang']) > 0) {
        $idbarang = $_POST['idbarang'];
        $jumlah_barang = $_POST['jumlahbarang'];
        $keterangan = $_POST['keterangan'] ?? "";

        $SQL = "INSERT into nota_penjualan (no_nota, id_user, keterangan) VALUES ('$no_nota', '" . $user['id_user'] . "', '$keterangan')";
        $insertTransaksi = mysqli_query($kon, $SQL);

        if (!$insertTransaksi) {
            die("Gagal menyimpan Nota Penjualan: " . mysqli_error($kon));
        }

        for ($i = 0; $i < count($jumlah_barang); $i++) {
            $barang_query = mysqli_query($kon, "SELECT harga, stok FROM barang WHERE id='$idbarang[$i]'");
            $barang = mysqli_fetch_assoc($barang_query);
            
            $harga_barang = (int) $barang['harga'];
            $qty_beli = (int) $jumlah_barang[$i];
            
            $subtotal = $harga_barang * $qty_beli;

            $SQL = "INSERT INTO item_penjualan (no_nota, barang_id, qty, subtotal) VALUES (
                        '$no_nota',
                        '$idbarang[$i]',
                        '$qty_beli',
                        '$subtotal'
                    )";
            $insertItem = mysqli_query($kon, $SQL);

            if ($insertItem) {
                $new_stok = (int) $barang['stok'] - $qty_beli;
                $update_stok_SQL = "UPDATE barang SET stok = '$new_stok' WHERE id='$idbarang[$i]'";
                mysqli_query($kon, $update_stok_SQL);
            }
        }
        
        echo "Berhasil Menambahkan Data Transaksi dengan No. Nota: $no_nota <br>";
        echo "<a href='index.php'>Kembali</a>";
        
    } else {
        die('Wajib ada barang minimal 1');
    }
}
?>