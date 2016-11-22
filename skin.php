<?php
	header("Content-type: text/css");
	include('functions/fileio.php');
	
	$temak = fajlbol_betolt('temak.json');
	
	$tema = isset($_COOKIE['skin']) ? $_COOKIE['skin'] : "0";
	
	if (!array_key_exists($tema,$temak)){
		$tema="0";
	}
	
	$name = $temak[$tema]["name"];
	$bg = $temak[$tema]["bg"];
	$color = $temak[$tema]["color"];
	$header = $temak[$tema]["header"];
	$headerhov = $temak[$tema]["headerhov"];
	$player = $temak[$tema]["player"];
	$bot = $temak[$tema]["bot"];
	$cella = $temak[$tema]["cella"];
?>

body {
	background-color: <?= $bg ?>;
	color: <?= $color ?>;
}
.menu {
	background-color: <?= $header ?>;
}
.menu ul li:hover{
	background-color: <?= $headerhov ?>;
}
.j{
    background-size: 50px 50px;
	background-image: url(<?= $player ?>);
}

.robot{
    background-size: 50px 50px;
	background-image: url(<?= $bot ?>);
}

.bumm{
    background-size: 50px 50px;
	background-image: url(kepek/bumm.png);
}
.gameTable td{
	border: 1px solid <?= $cella ?>;
}