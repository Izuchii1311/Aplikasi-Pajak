<?php


include '../config.php';

// Index Perhitungan PBB
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

// Search Data SPPT
function search($request)
{
    $query = "SELECT * FROM data_sppt WHERE kode_id LIKE '$request'";
    return index($query);
}

?>