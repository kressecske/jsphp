<?php
$auth = new Authentication () ;

if($auth ->is_authenticated() ) {
	header('Location: index.php');
}

$hibak = array();
if ($_POST) {
 $felhnev = trim($_POST['felhnev']);
 $jelszo = $_POST['jelszo'];
 $email = $_POST["email"];
 $jelszavak = fajlbol_betolt('logins/jelszavak.json');


 if (strlen($felhnev) == 0) {
 $hibak[] = 'Nincs felhnev!';
 }

 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $hibak[] = "Rossz email formátum."; 
 }
 if (strlen($jelszo) == 0) {
 $hibak[] = 'Nincs jelszo!';
 }
if (array_key_exists($email, $jelszavak)) {
 $hibak[] = 'Letezo email cím!';
}
foreach($jelszavak as $em){
	if($em[0]==$felhnev){
		$hibak[] = 'Létező felhasználó név';
	}
}
 if (!$hibak) {
 $jelszavak[$email] = [$felhnev,md5($jelszo),false];
 fajlba_ment('logins/jelszavak.json', $jelszavak);
 header('Location: index.php?o=login');
 exit();
 }
}
?>
<h1>Regisztráció</h1>

<?php if($hibak) : ?>
	<ul>
	<?php foreach($hibak as $hiba) : ?>
		<li><?= $hiba ?></li>
	<?php endforeach ?>
	</ul>
<?php endif; ?>


<form action="" method="post">
 Email cím:
 <input type="text" id="email" name="email">
 <span id="spanregemail"></span>
 <br>
 Felhasználónév:
 <input type="text" id="felhnev" name="felhnev">
 <span id="spanregfhnev"></span>
 <br>
 Jelszó:
 <input type="password" name="jelszo"> <br>
 <input type="submit" name="reg" value="Regisztrál">
</form>