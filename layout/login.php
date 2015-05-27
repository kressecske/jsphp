<?php

$auth = new Authentication () ;

if($auth ->is_authenticated() ) {
	header('Location: index.php');
}

$hibak = array();
if ($_POST) {
 $email = trim($_POST['email']);
 $jelszo = $_POST['jelszo'];

 if($auth->login($email, $jelszo)){
	header('Location: index.php?o=game');
	exit();

 }else{
	$hibak[] = 'Nem jó!';
 }

}
?>

<h1>Belepes</h1>

<?php if($hibak) : ?>
	<ul>
	<?php foreach($hibak as $hiba) : ?>
		<li><?= $hiba ?></li>
	<?php endforeach ?>
	</ul>
<?php endif; ?>


<form action="" method="post">
 Email cím:
 <input type="text" name="email"> <br>
 Jelszó:
 <input type="password" name="jelszo"> <br>
 <input type="submit" name="belep"
value="Belép">
</form>
<a href="index.php?o=reg"> Regisztráció</a>