<?php
$rekordok = fajlbol_betolt('logins/rekordok.json');
$best = [];
if( $auth ->is_authenticated() ){
	$felh = $_SESSION['felhnev'];
}

?>
	<div id="gamEEe">
		<button id="sett"><i class="fa fa-cog"> Beállítások</i></button>
		<button id="start"><i class="fa fa-play"> Start</i></button>
		<div id="settings" class="settingsClass" style="display:none">
			<ul>
				<li>Játékmező:<input type="text" id="n" class="inputSize iN" value="10"> x <input type="text" id="m" class="inputSize" value="10"></li>
				<li>Biztonságos teleportálások száma: <input type="text" id="superSz" class="inputSize" value="3"></li>
				<ul id="hibaMSG"></ul>
			</ul>

		</div>
		<div class="gameClass">
			<div id="tpHiba" ></div>
			<table id="game" class="gameTable">
			</table>
		</div>
		<div id="steps" class="stepsClass"></div>
		<div id="gameResult" class="gameResultClass"></div>
	</div>

	<br>
	<?php
		if($auth ->is_authenticated() ) :
	?>
	<td>
	Legjobb Egyéni Eredmények:
	<div id="rekordok">
	<?php if (array_key_exists($felh,$rekordok) ) : ?>
	<?php foreach($rekordok[$felh] as $t => $a ) : ?>
		<?= $t ?> Pont: <?= $a ?><br>
	<?php endforeach; ?>
	<?php endif; ?>
	</div>
	</td>
	<?php endif;?>
	<div class="controlz">
	<table class="howToControl">
	  <tr>
	    <th colspan="2">Irányítás</th>
	  </tr>
	  <tr>
	    <td>Fel</td>
	    <td>W / <i class="fa fa-arrow-up"></i></td>
	  </tr>
	  <tr>
	    <td>Le</td>
	    <td>S / <i class="fa fa-arrow-down"></i></td>
	  </tr>
	  <tr>
	    <td>Jobbra</td>
	    <td>A / <i class="fa fa-arrow-right"></i></td>
	  </tr>
	  <tr>
	    <td>Balra</td>
	    <td>D / <i class="fa fa-arrow-left"></i></td>
	  </tr>
	  <tr>
	    <td>Fel & Jobbra</td>
	    <td class="szovegKozep">E</td>
	  </tr>
	  <tr>
	    <td>Fel & Balra</td>
	    <td class="szovegKozep">Q</td>
	  </tr>
	  <tr>
	    <td>Le & Jobbra</td>
	    <td class="szovegKozep">X</td>
	  </tr>
	  <tr>
	    <td>Le & Balra</td>
	    <td class="szovegKozep">Y</td>
	  </tr>
	  <tr>
	    <td>Teleportálás</td>
	    <td class="szovegKozep">T</td>
	  </tr>
	</table>

	</div>