<?php
require_once 'Mahasiswa.php';
$mahasiswa = new Mahasiswa();
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $datas = $mahasiswa->get_detail_data($nim);
} else {
    header('Location: index.php');
}

if (isset($_POST['nim'])) {
    $old_nim = $_GET['nim'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    if ($mahasiswa->save_update_data($nim, $nama, $kelas)) {
        header('Location: index.php');
    } else {
        header("Location: edit_data.php?nim='$old_nim'");
    }
}
?>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <style>
        table {
            border: 1px solid black;
            margin-top: 20px;
            padding: 5px;
        }

        td {
            padding: 5px;
        }

        input {
            width: 100%;
        }

        button {
            width: 100%;
        }
    </style>
</head>
<body>
<h1>Input Data Mahasiswa</h1>
<a href="index.php">Kembali</a>
<div>
    <form action="edit_data.php" method="post">
        <table>
            <?php
            if (mysqli_num_rows($datas) > 0) {
                while ($data = $datas->fetch_array()) {
                    echo '
                         <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td><input type="number" name="nim" placeholder="1202184143" required id="nim" 
                            min="1" max="9999999999" value="' . $data['nim'] . '"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="nama" placeholder="Jhon Doe" required id="nama" 
                            value="' . $data['nama'] . '"></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><input type="text" name="kelas" placeholder="SI4201" required id="kelas" 
                            value="' . $data['kelas'] . '"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><button type="submit">Edit</button></td>
                        </tr>       
                    ';
                }
            }
            ?>
        </table>
    </form>
</div>
</body>
</html>