<?php

include 'config.php';

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

// Search Data Warga
function search($request)
{
    $query = "SELECT * FROM data_warga WHERE nik LIKE '%$request%' OR nama LIKE '%$request%' ";
	// echo " <script> alert('Pencarian Berhasil!'); </script> ";
    return index($query);
}

?>