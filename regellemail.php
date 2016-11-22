<?php
function fajlbol_betolt($fajlnev, $alap = array()) {
	$s = @file_get_contents($fajlnev);
	return ($s === false
		? $alap
		: json_decode($s, true));
}

$result['unique'] = true;
$email = trim($_GET['email']);
$jelszavak = fajlbol_betolt('logins/jelszavak.json');
 if (!(array_key_exists($email, $jelszavak))){
	$result['unique'] = true;
 }else{
	$result['unique'] = false;
 }

echo json_encode($result);


?>