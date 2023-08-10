<?php

# Memanggil Koneksi ke Database
require '../config.php';

// Session
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:../auth/login.php");
    exit();
}

if(isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == 'user') {
    header('Location: ../home.php');
    exit();
}


# Memanggil Logic program
require 'functions.php';

// Menangkap id yang dikirimkan di URL
$id = $_GET["id"];
// Menampilkan data_warga berdasarkan idnya
$query = index("SELECT * FROM data_sppt WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border-bottom: 1px solid #333;
            text-align: center;
            margin: 50px 0;
        }

        .header img {
            margin-right: 20px;
            max-width: 100%;
            height: auto;
        }

        .header h2 {
            font-size: 24px;
            margin: 0;
        }

        .header p {
            font-size: 14px;
            margin: 0;
            color: #333;
        }

        .content {
            margin: 20px 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td:last-child {
            text-align: center;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            padding: 0px 100px;
        }

        .tanda-tangan-kiri,
        .tanda-tangan-kanan {
            text-align: center;
        }

        .tanda-tangan-kiri p,
        .tanda-tangan-kanan p {
            margin: 100px 0;
        }

        a {
            margin-left: 50px;
            background-color: blue;
            padding: 10px;
            border-radius: 5px;
            color: white;
        }

        @media print {
            a {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="../../assets/img/logodesa.png" alt="" width="50">
        <div>
            <h2>Hasil Laporan Perhitungan PBB-P2</h2>
            <p>Jl. Cisirung - Sayati KM Kecamatan Dayeuhkolot, Kabupaten Bandung 40238.</p>
        </div>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode_ID</th>
                    <th>NOP</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Akun</th>
                    <th>Alamat Objek Pajak</th>
                    <th>Alamat Wajib Pajak</th>
                    <th>Luas Bumi</th>
                    <th>Luas Bangunan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($query as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["kode_id"]; ?></td>
                        <td><?= $row["nop"]; ?></td>
                        <td><?= $row["tanggal"]; ?></td>
                        <td><?= $row["akun"]; ?></td>
                        <td><?= $row["alamat_op"]; ?></td>
                        <td><?= $row["alamat_wp"]; ?></td>
                        <td><?= $row["luas_bumi"]; ?></td>
                        <td><?= $row["luas_bangunan"]; ?></td>
                        <?php $i++; ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>

                    <th>NJOP DPP</th>
                    <th>NJOP TKP</th>
                    <th>NJOP PBB</th>
                    <th>PBB Terutang</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($query as $row) : ?>
                    <tr>
                        <?php
                        // Perhitungan NJOP DPP
                        $totalNjopBumi = $row['luas_bumi'] * $row['njop_bumi'];
                        $totalNjopBangunan = $row['luas_bangunan'] * $row['njop_bangunan'];

                        $njopDpp = $totalNjopBumi + $totalNjopBangunan;
                        ?>
                        <td><?= $njopDpp; ?></td>
                        <td>Rp. 10.000.000</td>
                        <td>Rp. <?= $njopDpp - 10000000; ?></td>
                        <?php
                        // PBB Terutang
                        $njopPBB = $njopDpp - 10000000;
                        if ($njopPBB < 1000000000) {
                            $tarif = 0.11; // Tarif 0,11% (0,0011)
                        } elseif ($njopPBB > 1000000000) {
                            $tarif = 0.22; // Tarif 0,22% (0,0022)
                        } else {
                            $tarif = 0;
                        }
                        $pbbTerutang = $njopPBB * $tarif;
                        ?>
                        <td><?= $pbbTerutang ?></td>
                        <?php
                        // Keterangan
                        if ($pbbTerutang == 0) {
                            $info = "Lunas";
                        } elseif ($pbbTerutang >= 0) {
                            $info = "Belum Lunas";
                        } else {
                            $info = "Hasilnya Minus, Belum Lunas";
                        }
                        ?>
                        <td><?= $info ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <div class="tanda-tangan-kiri">
            <p>Atas Nama</p>
            <p>Tanda Tangan</p>
        </div>
        <div class="tanda-tangan-kanan">
            <p>Atas Nama</p>
            <p>Tanda Tangan</p>
        </div>
    </div>

    <a href="../pbb_p2/index.php">Kembali</a>
</body>

</html>