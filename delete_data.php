<?php
require_once 'Mahasiswa.php';
$mahasiswa = new Mahasiswa();
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    if ($mahasiswa->delete_data($nim)) {
        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
} else {
    header('Location:index.php');
}