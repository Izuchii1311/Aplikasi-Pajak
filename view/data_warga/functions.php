<?php

include '../config.php';

// Index Data Warga
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

// Store Data Warga
function store($data)
{
    global $conn;
    $nik = empty($data["nik"]) ? '-' : htmlspecialchars($data["nik"]);
    $no_kk = empty($data["no_kk"]) ? '-' : htmlspecialchars($data["no_kk"]);
    $nama = empty($data["nama"]) ? '-' : htmlspecialchars($data["nama"]);
    $alamat = empty($data["alamat"]) ? '-' : htmlspecialchars($data["alamat"]);
    $rt = empty($data["rt"]) ? '-' : htmlspecialchars($data["rt"]);
    $rw = empty($data["rw"]) ? '-' : htmlspecialchars($data["rw"]);

    $query = "INSERT INTO data_warga VALUES ('', '$nik', '$no_kk', '$nama', '$alamat', '$rt', '$rw')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Update Data Warga
function update($data)
{
    global $conn;
    $id = $data['id'];
    $nik = empty($data["nik"]) ? '-' : htmlspecialchars($data["nik"]);
    $no_kk = empty($data["no_kk"]) ? '-' : htmlspecialchars($data["no_kk"]);
    $nama = empty($data["nama"]) ? '-' : htmlspecialchars($data["nama"]);
    $alamat = empty($data["alamat"]) ? '-' : htmlspecialchars($data["alamat"]);
    $rt = empty($data["rt"]) ? '-' : htmlspecialchars($data["rt"]);
    $rw = empty($data["rw"]) ? '-' : htmlspecialchars($data["rw"]);

    $query = "UPDATE data_warga SET
            nik = '$nik',
            no_kk = '$no_kk',
            nama = '$nama',
            alamat = '$alamat',
            rt = '$rt',
            rw = '$rw'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Delete Data Warga
function delete($id)
{
    global $conn;
    // ambil nama berdasarkan id
    $get_nama_query = "SELECT nama FROM data_warga WHERE id = $id";
    $result = mysqli_query($conn, $get_nama_query);
    $row = mysqli_fetch_assoc($result);

    // hapus data di dalam data_sppt jika nama sama dengan $nama
    $nama = $row['nama'];
    $delete_query = "DELETE FROM data_sppt WHERE nama = '$nama'";
    mysqli_query($conn, $delete_query);

    // hapus data_warga berdasarkan $id
    mysqli_query($conn, "DELETE FROM data_warga WHERE id= $id");
    return mysqli_affected_rows($conn);
}

// Search Data Warga
function search($request)
{
    $query = "SELECT * FROM data_warga WHERE nik LIKE '%$request%' OR nama LIKE '%$request%' ";
    return index($query);
}
?>