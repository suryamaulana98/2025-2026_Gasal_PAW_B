<?php
require_once "koneksi.php";

$hasil = mysqli_query($Conn,"SELECT * FROM data_suplier");
$sup = mysqli_fetch_all($hasil, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Suplier</title>
</head>
<body>
    <h3>Data Master Supplier</h3>
    <table border="1">
        <tr>
            <td>NO</td>
            <td>NAMA</td>
            <td>TELP</td>
            <td>ALAMAT</td>
            <td>TINDAKAN</td>
        </tr>
        <?php
        
        if(!empty($sup)) {
            $no = 1;
            foreach($sup as $key => $value) {
                echo "<tr>";
                echo "<td>".$no++."</td>";
                echo "<td>".htmlspecialchars($value['nama'])."</td>";
                echo "<td>".htmlspecialchars($value['telp'])."</td>";
                echo "<td>".htmlspecialchars($value['alamat'])."</td>";
                echo "<td><a href='update.php?&id={$value['id']}'>Edit</a>  <a href='del.php?&id={$value['id']}' onclick='return confirm(\"Anda yakin ingin menghapus supllier ini?\")'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada Data</td></tr>";
        }
        ?>
    </table><br>
    <button><a href="insert.php">Tambah Data</a></button>
</body>
</html>