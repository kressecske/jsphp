<?php

$auth = new Authentication () ;
$hibak = array();
if(!($auth ->is_authenticated() )) {
	header('Location: index.php');
}
	$temak = fajlbol_betolt('temak.json');
	$tema = isset($_GET['skin']) ? $_GET['skin'] : header('Location: admin.php');
	if($tema == count($temak) ){
		$name = "";
		$bg = "";
		$color = "";
		$header = "";
		$headerhov = "";
		$player = "";
		$bot = "";
		$cella= "";
	}else{
		$name = $temak[$tema]["name"];
		$bg = $temak[$tema]["bg"];
		$color = $temak[$tema]["color"];
		$header = $temak[$tema]["header"];
		$headerhov = $temak[$tema]["headerhov"];
		$player = $temak[$tema]["player"];
		$bot = $temak[$tema]["bot"];	
		$cella = $temak[$tema]["cella"];	
	}
if($_POST){
	if (strlen($_POST["name"]) == 0) {
	 $hibak[] = 'Nincs megadva a név!';
	 }
	 if (strlen($_POST["bg"]) == 0) {
	 $hibak[] = 'Nincs megadva a háttér!';
	 }
	 if (strlen($_POST["color"]) == 0) {
	 $hibak[] = 'Nincs megadva a szöveg szín!';
	 }
	 if (strlen($_POST["header"]) == 0) {
	 $hibak[] = 'Nincs megadva a fejléc szín!';
	 }	 
	 if (strlen($_POST["headerhov"]) == 0) {
	 $hibak[] = 'Nincs megadva a fejléc áttűnési színe!';
	 }

	 if (strlen($_POST["cella"]) == 0) {
	 $hibak[] = 'Nincs megadva a Cella szegély színe!';
	 }
	 $id = $_POST["id"];
	
	$target_dir = "uploads/";
	$target_file = $player;
	$target_file_bot = $bot;
	if(basename($_FILES["player"]["name"])!=''){
		$target_file = $target_dir . basename($_FILES["player"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["player"]["tmp_name"]);
		if($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		} else {
		$hibak[]= "Kötelező játékos képet választani.";
		$uploadOk = 0;
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			$hibak[]= "Ilyen nevű kép már létezik (player).";
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["player"]["size"] > 500000) {
			$hibak[]= "Túl nagy méretű a játékos kép.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$hibak[]= "Csak JPG, JPEG, PNG & GIF kiterjesztésű filet lehet feltölteni (játékos).";
			$uploadOk = 0;
		}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$hibak[]= "A Filet nem lehet feltölteni (játékos).";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["player"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["player"]["name"]). " has been uploaded.";
			} else {
				$hibak[] = "Hiba történt file feltöltés közben. Próbálja Újra.(játékos)";
			}
		}
	}
	
	if(basename($_FILES["bot"]["name"])!=''){
		$target_file_bot = $target_dir . basename($_FILES["bot"]["name"]);
		$uploadOk_bot = 1;
		$imageFileType_bot = pathinfo($target_file_bot,PATHINFO_EXTENSION);
		$check_bot = getimagesize($_FILES["bot"]["tmp_name"]);
		if($check_bot !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk_bot = 1;
		} else {
			$hibak[]= "Kötelező robot képet választani.";
			$uploadOk_bot = 0;
		}
		if (file_exists($target_file_bot)) {
			$hibak[]= "Ilyen nevű kép már létezik (robot).";
			$uploadOk_bot = 0;
		}
		if ($_FILES["bot"]["size"] > 500000) {
			$hibak[]= "Túl nagy méretű a robot kép.";
			$uploadOk_bot = 0;
		}
		if($imageFileType_bot != "jpg" && $imageFileType_bot != "png" && $imageFileType_bot != "jpeg"
		&& $imageFileType_bot != "gif" ) {
			$hibak[]= "Csak JPG, JPEG, PNG & GIF kiterjesztésű filet lehet feltölteni (robot).";
			$uploadOk_bot = 0;
		}
		if ($uploadOk_bot == 0) {
			$hibak[]= "A Filet nem lehet feltölteni (robot).";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["bot"]["tmp_name"], $target_file_bot)) {
				echo "The file ". basename( $_FILES["bot"]["name"]). " has been uploaded.";
			} else {
				$hibak[] = "Hiba történt file feltöltés közben. Próbálja Újra.(robot)";
			}
		}
	}
	
	if (strlen($target_file) == 0) {
	 $hibak[] = 'Nincs beállítva játékos kép!';
	 }
	if (strlen($target_file_bot) == 0) {
	 $hibak[] = 'Nincs beállítva robot kép!';
	 }

	 if (!$hibak) {
	 $temak[$id]["name"] = $_POST["name"];
	 $temak[$id]["bg"] = $_POST["bg"];
	 $temak[$id]["color"] = $_POST["color"];
	 $temak[$id]["header"] = $_POST["header"];
	 $temak[$id]["headerhov"] = $_POST["headerhov"];
	 $temak[$id]["player"] = $target_file;
	 $temak[$id]["bot"] = $target_file_bot;
	 $temak[$id]["cella"] = $_POST["cella"];
	 fajlba_ment('temak.json', $temak);
	 header('Location: index.php?o=admin');
	 exit();
	 }
}
	
?>

<?php if($hibak) : ?>
	<ul>
	<?php foreach($hibak as $hiba) : ?>
		<li><?= $hiba ?></li>
	<?php endforeach ?>
	</ul>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
 ID:<input type="text" name="id" value="<?= $tema ?>" readonly><br>
 Név:<input type="text" name="name" value="<?= $name ?>"  ><br>
 Háttér:<input type="text" name="bg" value="<?= $bg ?>" ><br>
 Szöveg színe:<input type="text" name="color" value="<?= $color ?>" ><br>
 Fejléc színe:<input type="text" name="header" value="<?= $header ?>"><br>
 Fejléc áttűnési színe:<input type="text" name="headerhov" value="<?= $headerhov ?>"><br>
 Játékos (kép URL):<?= $player ?><input type="file" name="player" id="player"><br>
 Robot (kép URL):<?= $bot ?><input type="file" name="bot" id="bot"><br>
 Cella szegély színe:<input type="text" name="cella" value="<?= $cella ?>"><br> 
 <input type="submit" name="submit" value="Mentés" onclick="return confirm('Biztos, hogy elmented a változtatásokat?');">
</form>
<a href="index.php?o=admin"> Vissza </a>