<?php
$name = "Verdi Setyawan Ardiansyah Putra";
$nim = "240411100100";
$kelas = "PAW B";
$prodi = "Teknik Informatika";
$alamat = "Gresik, Jawa Timur";
$hobi = "Baca Buku";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biodata Diri</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: gray;
        }
    </style>
</head>
<body>
    <h2>Biodata Diri</h2>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><?php echo $nim; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td><?php echo $kelas; ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td><?php echo $prodi; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td><?php echo $hobi; ?></td>
        </tr>
    </table>
</body>
</html>