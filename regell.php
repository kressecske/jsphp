<?php
function fajlbol_betolt($fajlnev, $alap = array()) {
	$s = @file_get_contents($fajlnev);
	return ($s === false
		? $alap
		: json_decode($s, true));
}

$result['unique'] = true;
$felhnev = trim($_GET['felhnev']);
$jelszavak = fajlbol_betolt('logins/jelszavak.json');

foreach($jelszavak as $em){
	if($em[0]==$felhnev){
		$result['unique'] = $result['unique'] && false;
	}else{
		$result['unique'] = $result['unique'] && true;
	}
}
echo json_encode($result);


?>