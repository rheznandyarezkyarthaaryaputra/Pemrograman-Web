<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}
</style>
</head>
<body>
<?php
$Dosen = [
    'nama' => 'Elok Nur Hamdana',
    'domisili' => 'Malang',
    'jenis_kelamin' => 'Perempuan'
];
?>
<table>
    <tr>
        <th>Informasi</th>
        <th>Detail</th>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?php echo $Dosen['nama']; ?></td>
    </tr>
    <tr>
        <td>Domisili</td>
        <td><?php echo $Dosen['domisili']; ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php echo $Dosen['jenis_kelamin']; ?></td>
    </tr>
</table>
</body>
</html>
