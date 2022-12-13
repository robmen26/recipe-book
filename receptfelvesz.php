<?php
	
	require_once("dbconfig.php");	

	session_start();	
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <title>Recept felvétele</title>
  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>
  <div class="main">
    <header>
      <a id="focim" href="index.php">Receptkönyv</a>
      <div id="mainMenu">
			<ul>
				<div class="tooltip" id="currOldal"> <a href="receptfelvesz.php">Felvétel</a> <span class="tooltiptext">Recept felvétele az adatbázisba.</span> </div>
				<div class="tooltip"> <a href="receptmodosit.php">Módosítás</a> <span class="tooltiptext">Recept módosítása az adatbázisban.</span> </div>				
				<div class="tooltip"> <a href="recepttorol.php">Törlés</a> <span class="tooltiptext">Recept törlése az adatbázisból.</span> </div>
				<div class="tooltip"> <a href="receptlistaz.php">Listázás</a> <span class="tooltiptext">Adatbázisban lévő receptek listázása</span> </div>
				<div class="tooltip"> <a href="receptkalkulator.php">Kalkulátor</a> <span class="tooltiptext">Alapanyag kiszámoló oldal</span> </div>			
			</ul>			
		</div>
    </header>
	<div id="content">
			<form method="post" action="receptfelvesz.php">
				<fieldset>
					<legend>Új recept felvétele</legend>
					<table class="felviteltable">
						
						<tr>
							<td><label for="nev">Recept neve</label></td>
							<td><input type="textfield" name="nev" id="nev" maxlength="30" /></td>
						</tr>
						<tr>
							<td><label for="elkIdo">Elkészítési ideje</label></td>
							<td><input title="percben" type="textfield" name="elkIdo" id="elkIdo" maxlength="30" /></td>
						</tr>
						<tr>
							<td><label for="alapanyag">Alapanyagok (szóközzel elválasztva) <br/>(mennyiség-hozzávaló <br/>mennyiség2-hozzávaló2 ...)</label></td> <!-- liszt-100,cukor-80 -->
							<td><input title="grammban" type="textfield" name="alapanyagok" id="alapanyagok" maxlength="100" /></td>
						</tr>
						<td><label for="hanyszemely">Hány személyre szól a recept</label></td>
							<td><input title="hanyszemely" type="textfield" name="hanyszemely" id="hanyszemely" maxlength="30" /></td>
						</tr>
						<tr>
							<td><input class="gomb" type="submit" name="elkuldes" id="elkuldes" value="Felvétel" /></td>
							<td><input class="gomb" type="reset" name="megsem" id="megsem" value="Mégsem" /></td>
						</tr>
					</table>
						<?php
								$alapanyagmennyisegparok = [];	
							if(!(empty($_POST['nev']) || empty($_POST['elkIdo']) || empty($_POST['alapanyagok']) )){	
									
									$nev=$_POST['nev'];
									$elkIdo=$_POST['elkIdo'];
									$hanyszemely=$_POST['hanyszemely'];	
									$alapanyagok=$_POST['alapanyagok'];
									$daraboltalapanyagok = explode(" ",$alapanyagok); /*<!-- [liszt-100],[cukor-80] -->*/
									$result = "";
									foreach($daraboltalapanyagok as &$value) {
									list($k,$v) = explode('-', $value); 
										$result .= $k . "-" . $v . " ";
									}
									$corrigedresult = substr_replace($result ,"",-1);
									
									$query = "INSERT INTO receptkonyv.etel(nev,elkIdo,alapanyag,hanyszemely) VALUES (\"$nev\",\"$elkIdo\", \"$corrigedresult\",\"$hanyszemely\")";
									$res=mysqli_query($kapcsolat, $query);
									
									if($res)
										echo "<p align=\"center\">A receptet rögzítettük az adatbázisban!</p>";
									else
										echo "Nem sikerült rögzíteni a receptet.";
							}
							else{
								echo "<p align=\"center\">Minden mező megadása kötelező</p>";
							}
						?>
				</fieldset>
			</form>
			
		</div>
  </div>
</body>

</html>