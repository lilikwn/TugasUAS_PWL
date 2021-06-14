<?php
require_once("../Model/modelPelanggan.php");
require_once("../Model/modelMobil.php");
require_once("../Model/modelTransaksi.php");
$transaksi = new modelTransaksi;
$pelanggan = new modelPelanggan;
$mobil = new modelMobil;
if (isset($_POST["submit"])) {
    $plat = $_POST["plat"];
    $date = "";
    $namaMobil = $_POST["nama_mobil"];
    $merk = $_POST["merk"];
    $lama_sewa = $_POST["lama-sewa"];
    $tarif = $_POST["tarif"];
    $total = $tarif * $lama_sewa;
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $jk = $_POST["jenisKelamin"];
    $alamat = $_POST["alamat"];
    $pelanggan->insertPelanggan($nik, $nama, $jk, $alamat);
    $transaksi->insertTransaksi($nik, $plat, $date, $lama_sewa, $total);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container container-sm">
        <div class="row justify-content-center">
            <div class="col-6">
                <form class="my-5" method="POST">
                    <div class="form-group row">
                        <label for="plat" class="col-sm-3 col-form-label">Plat Kendaraan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input name="plat" type="text" class="form-control" id="plat" placeholder="Plat Kendaraan yang di akan sewa">
                                <button class="btn btn-outline-success" onclick=isiOtomatis() type="button" name="cek">Cek</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama-mobil" class="col-sm-3 col-form-label">Nama Mobil</label>
                        <div class="col-sm-9">
                            <input name="nama_mobil" type="text" class="form-control" id="nama-mobil" placeholder="Nama Mobil" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nik" class="col-sm-3 col-form-label">Merk</label>
                        <div class="col-sm-9">
                            <input name="merk" type="text" class="form-control" id="merk" placeholder="Merk Mobil" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Tarif</label>
                        <div class="col-sm-9">
                            <input name="tarif" type="number" class="form-control" id="tarif" placeholder="Tarif Sewa Per Hari" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Lama Sewa</label>
                        <div class="col-sm-9">
                            <input name="lama-sewa" type="number" class="form-control" id="Tarif" placeholder="Lama Sewa (Hari)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9">
                            <input name="nik" type="text" class="form-control" id="nik" placeholder="NIK">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" id="laki-laki" value="Laki-Laki" checked>
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" id="perepmpuan" value="Perempuan">
                                    <label class="form-check-label" for="perepmpuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat" class="form-control" placeholder="Alamat" id="alamat" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function isiOtomatis() {
            var plat = $("#plat").val();
            $.ajax({
                url: "../Model/data_mobil.php",
                data: "plat=" + plat,
            }).then(data => {
                var json = data;
                obj = JSON.parse(json);
                $("#nama-mobil").val(obj.nama);
                $("#merk").val(obj.merk);
                $("#tarif").val(obj.tarif);
                console.log(obj);
            });
        }
    </script>
</body>

</html>