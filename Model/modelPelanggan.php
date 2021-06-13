<?php
class modelPelanggan
{
    public $connect;
    public function __construct()
    {
        $connect = mysqli_connect("localhost", "root", "", "pwl_sewa_mobil");
        $this->connect = $connect;
    }
    function execute($query)
    {
        return mysqli_query($this->connect, $query);
    }
    function selectAllPelanggan()
    {
        $query = "SELECT * FROM pelanggan";
        return $this->execute($query);
    }
    function selectPelanggan($nama)
    {
        $query = "SELECT * FROM pelanggan where nama='$nama'";
        return $this->execute($query);
    }
    function updatePelanggan($ktp, $nama, $jKelamin, $alamat)
    {
        $query = "UPDATE pelanggan SET no_ktp='$ktp', nama='$nama', jk='$jKelamin', alamat='$alamat'";
        return $this->execute($query);
    }

    function deletePelanggan($ktp)
    {
        $query = "DELETE FROM pelanggan WHERE no_ktp='$ktp'";
        return $this->execute($query);
    }

    function insertPelanggan($ktp, $nama, $jenisKelamin, $alamat)
    {
        $query = "INSERT INTO pelanggan VALUES ('$ktp', '$nama', '$jenisKelamin', '$alamat')";
        return $this->execute($query);
    }

    function fetch($var)
    {
        return mysqli_fetch_array($var);
    }

    //pasangan construct adalah destruct untuk menghapus inisialisasi class pada memori
    function __destruct()
    {
    }
}
