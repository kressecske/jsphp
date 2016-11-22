<?php
	session_start();
	include('functions/fileio.php');
	include('functions/auth.php');

	$auth = new Authentication () ;
	if($auth ->is_authenticated()){

		$felh = $_SESSION['felhnev'];
		$ered = trim($_GET['pontok']);
		$time = date("D M j G:i:s T Y"); 
		$rekordok = fajlbol_betolt('logins/rekordok.json');
	if (array_key_exists($felh, $rekordok)) {
		if ( count($rekordok[$felh])!=10 ){
			$rekordok[$felh][$time]= $ered;
			arsort($rekordok[$felh]);
		}else if(count($rekordok[$felh])==10){
			$rekordok[$felh][$time]= $ered;
			arsort($rekordok[$felh]);
			array_pop($rekordok[$felh]);
		}
	}else{
		$rekordok[$felh][$time]= $ered;
	}	
		
	fajlba_ment('logins/rekordok.json', $rekordok);
	
	echo json_encode($rekordok[$felh]);
}