<?php

$auth = new Authentication () ;

if(!($auth ->is_authenticated() )) {
	header('Location: index.php');
}

	$temak = fajlbol_betolt('temak.json');
	$tema = array_keys($temak);
?>
Témák:
	<ul>
	<?php foreach($tema as $t) : ?>
		<li>
				ID:<?= $t ?><br>
				Név:<?= $temak[$t]["name"] ?><br>
				Háttér:<?= $temak[$t]["bg"] ?><br>
				Betűszín:<?= $temak[$t]["color"] ?><br>
				Fejléc színe:<?= $temak[$t]["header"] ?><br>
				Fejléc áttűnési színe:<?= $temak[$t]["headerhov"] ?><br>
				Player(kép URL):<?= $temak[$t]["player"] ?><br>
				Robot(kép URL): <?= $temak[$t]["bot"] ?><br>			
				Cella szegély színe: <?= $temak[$t]["cella"] ?><br>			
		<a href="index.php?o=edit&skin=<?= $t ?>">Szerkeszt</a>
		<?php if( (count($tema)) != 1 ) : ?>
			<a href="functions/delete.php?skin=<?= $t ?>" onclick="return confirm('Biztosan kívánni törli a kiválasztott témát?');">Töröl</a>
		<?php endif; ?>
		</li>
	<?php endforeach; ?>
	</ul>
	<a href="index.php?o=edit&skin=<?=count($tema)?>" > Új téma </a>