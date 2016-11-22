<?php  
	$temak = fajlbol_betolt('temak.json');
	$tema = array_keys($temak);
				
				
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP beadandó</title>
		<link rel="stylesheet" type="text/css" href="skin.php">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="font-awesome-4.3.0\css\font-awesome.min.css">
		<script type="text/javascript" src="jsbead.js"></script>
		<script type="text/javascript" src="ajax.js" ></script>
		<script type="text/javascript" src="ell.js" ></script>

	</head>
	<body>
		<header class="menu">
			<ul>
			  
				<?php foreach($tema as $t) : ?>
					<li>
						<a href="setcookie.php?skin=<?= $t ?>">
							<?= $temak[$t]["name"] ?>
						</a>
					</li>
				<?php endforeach; ?>
				<?php
					$auth = new Authentication () ;
					if(!($auth ->is_authenticated()) ) :
				?>
				<li>
					<a href="index.php?o=reg">
						Regisztráció
					</a>					
				</li>
				<li>
					<a href="index.php?o=login">
						Belépés
					</a>
				</li>
				<?php else: ?>
				Welcome: <?= $_SESSION['felhnev'] ?>
					<?php
						if($_SESSION['admin']):
					?>
					<li>
						<a href="index.php?o=admin">adminmenu</a>
					</li>
					<?php endif; ?>
					<li>
					<a href="logout.php">
							Kilépés
					</a>
					</li>
				<?php endif; ?>
			</ul>

			
		</header>
		<div class="content">