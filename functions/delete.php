<?php
	include('fileio.php');
	$temak = fajlbol_betolt('../temak.json');
	$tema = isset($_GET['skin']) ? $_GET['skin'] : header('Location: admin.php');

	unset($temak[$tema]);
	$temak = array_values($temak);
	var_dump($temak);
 
 fajlba_ment('../temak.json', $temak);
 header('Location: ../index.php?o=admin');
 exit();
