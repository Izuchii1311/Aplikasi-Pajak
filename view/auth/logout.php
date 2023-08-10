<?php
	session_start();
	session_destroy();
	echo " <script> alert('Berhasil Logout!'); document.location.href = '../home.php'; </script> ";
	// header("Location:../home.php");
	die();
?>