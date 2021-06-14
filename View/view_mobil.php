<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>
    <style>
        body {
            margin: 100px;
        }
    </style>
</head>

<body>
    <h1>Daftar Mobil</h1>
    <table border="2" cellpadding="15" cellspacing="0" style="text-align: center;">
        <tr>
            <td>No</td>
            <td>Plat Nomor</td>
            <td>Nama</td>
            <td>Merk</td>
            <td>Harga</td>
        </tr>

        <?php
        $i = 1;
        while ($row = $this->modelMobil->fetch($data)) {
            echo
            "<tr>
                <td>$i</td>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
            </tr>";
            $i++;
        }
        ?>

    </table>
</body>

</html>