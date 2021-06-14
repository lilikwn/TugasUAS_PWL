<?php
require_once("./modelMobil.php");
$connect = mysqli_connect("localhost", "root", "", "pwl_sewa_mobil");
$plat = $_GET['plat'];
$query = new modelMobil();
$mobil = mysqli_fetch_array($query->selectMobil($plat));
$data = array(
    "plat" => $mobil["no_plat"],
    "nama" => $mobil["nama"],
    "merk" => $mobil["merk"],
    "tarif" => $mobil["tarif"]
);

echo json_encode($data);
