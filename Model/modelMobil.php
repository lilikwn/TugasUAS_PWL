<?php
class modelMobil
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
    function selectAllMobil()
    {
        $query = "SELECT * FROM mobil";
        return $this->execute($query);
    }
    function selectMobil($nama)
    {
        $query = "SELECT * FROM mobil where nama='$nama'";
        return $this->execute($query);
    }
    function updateMobil($plat, $nama, $merk, $tarif)
    {
        $query = "UPDATE mobil SET no_plat='$plat', nama='$nama', merk='$merk', tarif=$tarif";
        return $this->execute($query);
    }

    function deleteMobil($plat)
    {
        $query = "DELETE FROM mobil WHERE no_plat='$plat'";
        return $this->execute($query);
    }

    function insertMobil($plat, $nama, $merk, $tarif)
    {
        $query = "INSERT INTO mobil VALUES ('$plat', '$nama', '$merk', '$tarif')";
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
