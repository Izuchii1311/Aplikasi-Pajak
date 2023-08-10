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
$query = index("SELECT * FROM data_warga ORDER BY id ASC");

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
            <h2>Laporan Data Data Warga Terdaftar</h2>
            <p>Jl. Cisirung - Sayati KM Kecamatan Dayeuhkolot, Kabupaten Bandung 40238.</p>
        </div>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>No. KK</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RWk</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($query as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["nik"]; ?></td>
                        <td><?= $row["no_kk"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["alamat"]; ?></td>
                        <td><?= $row["rt"]; ?></td>
                        <td><?= $row["rw"]; ?></td>
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

    <a href="../data_warga/index.php">Kembali</a>
</body>

</html>