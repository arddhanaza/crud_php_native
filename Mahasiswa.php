<?php

class Mahasiswa
{
    var $host = 'localhost:3307';
    var $username = 'root';
    var $password = '';
    var $database = 'db_mahasiswa';
    var $connection;

    function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->connection) {
            die('Connection Failed' . mysqli_connect_error());
        }
    }

    function get_data()
    {
        $query = "SELECT * FROM mahasiswa ORDER BY nim ASC";
        return $this->connection->query($query);
    }

    function get_detail_data($nim)
    {
        $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        return $this->connection->query($query);
    }

    function save_data($nim, $nama, $kelas)
    {
        $query = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$kelas')";
        return $this->connection->query($query);
    }

    function save_update_data($nim, $nama, $kelas)
    {
        $query = "UPDATE mahasiswa set nim = '$nim',nama = '$nama', kelas = '$kelas' WHERE nim = '$nim'";
        return $this->connection->query($query);
    }

    function delete_data($nim)
    {
        $query = "DELETE FROM mahasiswa where nim = '$nim'";
        return $this->connection->query($query);
    }
}