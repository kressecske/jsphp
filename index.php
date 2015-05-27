<?php
session_start();

	include('functions/fileio.php');
	include('functions/auth.php');
	$o = 'game';
	if(isset($_GET['o'])) {
		$o =$_GET['o'];
	}

	$file = "layout/{$o}.php";


	include('layout/layout_header.php');

	if(file_exists($file)){
		include($file);
	} else {
		$file = "layout/404.php";
		include($file);
	}
	
	include('layout/layout_footer.php');
?>