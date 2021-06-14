<?php
include 'controller/controller.php';
$main = new Controller();

if (isset($_GET['i'])) { //kondisi untuk mengakses halaman edit
  if ($_GET["i"] == "mobil") {
    $main->ViewMobil();
  } else if ($_GET["i"] == "pesan") {
    $main->ViewPesan();
  }
} else {
  $main->index();
}
