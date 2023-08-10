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

# Memanggil Logic Program
require 'functions.php';

// Tangkap id yang dikirimkan
$id = $_GET["id"];

// Condition delete data
if (delete($id) > 0) {
    echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
}