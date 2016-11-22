<?php
	if(isset($_GET['skin'])) {
		$skin =$_GET['skin'];
		setcookie("skin", $skin);
	}
		header("Location: index.php");  
	exit();
 //COMMENTTRY
?>