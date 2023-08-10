<?php

include '../config.php';

// Index Data SPPT
function index($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Store Data SPPT
function store($data)
{
    global $conn;
    $user_id = empty($data["user_id"]) ? '-' : htmlspecialchars($data["user_id"]);
    $kode_id = empty($data["kode_id"]) ? '-' : htmlspecialchars($data["kode_id"]);
    $nop = empty($data["nop"]) ? '-' : htmlspecialchars($data["nop"]);
    $akun = empty($data["akun"]) ? '-' : htmlspecialchars($data["akun"]);
    $nama = empty($data["nama"]) ? '-' : htmlspecialchars($data["nama"]);
    $alamat_op = empty($data["alamat_op"]) ? '-' : htmlspecialchars($data["alamat_op"]);
    $alamat_wp = empty($data["alamat_wp"]) ? '-' : htmlspecialchars($data["alamat_wp"]);
    $luas_bumi = empty($data["luas_bumi"]) ? '-' : htmlspecialchars($data["luas_bumi"]);
    $kelas_bumi = empty($data["kelas_bumi"]) ? '-' : htmlspecialchars($data["kelas_bumi"]);
    $njop_bumi = empty($data["njop_bumi"]) ? '-' : htmlspecialchars($data["njop_bumi"]);
    $luas_bangunan = empty($data["luas_bangunan"]) ? '-' : htmlspecialchars($data["luas_bangunan"]);
    $kelas_bangunan = empty($data["kelas_bangunan"]) ? '-' : htmlspecialchars($data["kelas_bangunan"]);
    $njop_bangunan = empty($data["njop_bangunan"]) ? '-' : htmlspecialchars($data["njop_bangunan"]);
    $tanggal = empty($data["tanggal"]) ? '-' : htmlspecialchars($data["tanggal"]);

    $query = "INSERT INTO data_sppt VALUES ('', '$user_id', '$kode_id', '$nop', '$akun', '$nama', '$alamat_op', '$alamat_wp', '$luas_bumi', '$kelas_bumi', '$njop_bumi', '$luas_bangunan', '$kelas_bangunan', '$njop_bangunan', '$tanggal')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Update Data SPPT
function update($data)
{
    global $conn;
    $id = $data['id'];
    $user_id = empty($data["user_id"]) ? '-' : htmlspecialchars($data["user_id"]);
    $kode_id = empty($data["kode_id"]) ? '-' : htmlspecialchars($data["kode_id"]);
    $nop = empty($data["nop"]) ? '-' : htmlspecialchars($data["nop"]);
    $akun = empty($data["akun"]) ? '-' : htmlspecialchars($data["akun"]);
    $nama = empty($data["nama"]) ? '-' : htmlspecialchars($data["nama"]);
    $alamat_op = empty($data["alamat_op"]) ? '-' : htmlspecialchars($data["alamat_op"]);
    $alamat_wp = empty($data["alamat_wp"]) ? '-' : htmlspecialchars($data["alamat_wp"]);
    $luas_bumi = empty($data["luas_bumi"]) ? '-' : htmlspecialchars($data["luas_bumi"]);
    $kelas_bumi = empty($data["kelas_bumi"]) ? '-' : htmlspecialchars($data["kelas_bumi"]);
    $njop_bumi = empty($data["njop_bumi"]) ? '-' : htmlspecialchars($data["njop_bumi"]);
    $luas_bangunan = empty($data["luas_bangunan"]) ? '-' : htmlspecialchars($data["luas_bangunan"]);
    $kelas_bangunan = empty($data["kelas_bangunan"]) ? '-' : htmlspecialchars($data["kelas_bangunan"]);
    $njop_bangunan = empty($data["njop_bangunan"]) ? '-' : htmlspecialchars($data["njop_bangunan"]);
    $tanggal = empty($data["tanggal"]) ? '-' : htmlspecialchars($data["tanggal"]);

    $query = "UPDATE data_sppt SET
            user_id = '$user_id',
            kode_id = '$kode_id',
            nop = '$nop',
            akun = '$akun',
            nama = '$nama',
            alamat_op = '$alamat_op',
            alamat_wp = '$alamat_wp',
            luas_bumi = '$luas_bumi',
            kelas_bumi = '$kelas_bumi',
            njop_bumi = '$njop_bumi',
            luas_bangunan = '$luas_bangunan',
            kelas_bangunan = '$kelas_bangunan',
            njop_bangunan = '$njop_bangunan',
            tanggal = '$tanggal'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Delete Data Sppt
function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_sppt WHERE id= $id");
    return mysqli_affected_rows($conn);
}

// Search Data SPPT
function search($request)
{
    $query = "SELECT * FROM data_sppt WHERE nama LIKE '%$request%' OR kode_id LIKE '%$request%' OR nop LIKE '%$request%' OR akun LIKE '%$request%' OR nama LIKE '%$request%'";
    return index($query);
}
?>