<?php
require_once 'Mahasiswa.php';
$mahasiswa = new Mahasiswa();
$datas = $mahasiswa->get_data();

?>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        table, th, td {
            margin-top: 20px;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
<h1>Data Mahasiswa</h1>
<a href="create_data.php">Tambah Data</a>
<table>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
    <?php
    if (mysqli_num_rows($datas) > 0) {
        while ($data = $datas->fetch_assoc()) {
            echo '
            <tr>
                <td>
                ' . $data["nim"] . '
                </td>
                <td>
                ' . $data["nama"] . '
                </td>
                <td>
                ' . $data["kelas"] . '
                </td>
                <td>
                    <a href="edit_data.php?nim=' . $data["nim"] . '">Edit Data</a> <span>| </span>
                    <a href="delete_data.php?nim=' . $data["nim"] . '">Delete Data</a>                    
                </td>
            </tr>
        ';
        }
    }
    ?>
</table>
</body>
</html>
