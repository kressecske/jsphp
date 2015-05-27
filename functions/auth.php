<?php
include_once('functions/fileio.php');
class Authentication {

	public function is_authenticated() {
		return isset($_SESSION['belepve']);
	}
	
	public function login($email, $jelszo) {
			$jelszavak = fajlbol_betolt('logins/jelszavak.json');
			 
			 if ((array_key_exists($email, $jelszavak) &&
				$jelszavak[$email][1] == md5($jelszo))) {
				$_SESSION['belepve'] = true;
				$_SESSION['felhnev'] = $jelszavak[$email][0];
				$_SESSION['admin'] = $jelszavak[$email][2];
				return true;
			 }else{
				return false;
			 }
	}

	
	
}