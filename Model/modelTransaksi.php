<?php
class modelTransaksi
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
    function selectAllTransaksi()
    {
        $query = "SELECT * FROM transaksi";
        return $this->execute($query);
    }
    function selectTransaksi($id_transaksi)
    {
        $query = "SELECT * FROM transaksi where id_transaksi='$id_transaksi'";
        return $this->execute($query);
    }
    function updateTransaksi($id_transaksi, $no_ktp, $no_plat, $tanggal_sewa, $lama_sewa, $total)
    {
        $query = "UPDATE transaksi SET id_transaksi='$id_transaksi', no_ktp='$no_ktp', no_plat='$no_plat', alamat='$tanggal_sewa', lama_sewa='$lama_sewa', total_harga=$total";
        return $this->execute($query);
    }

    function deleteTransaksi($id_transaksi)
    {
        $query = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";
        return $this->execute($query);
    }

    function insertTransaksi($id_transaksi, $no_ktp, $no_plat, $tanggal_sewa, $lama_sewa, $total)
    {
        $query = "INSERT INTO Transaksi VALUES ('$id_transaksi', '$no_ktp', '$no_plat', '$tanggal_sewa', '$lama_sewa', $total)";
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
