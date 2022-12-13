<?php
	require_once("dbconfig.php");	

	session_start();	
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <title>Recept módosítása</title>
  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>
  <div class="main">
    <header>
      <a id="focim" href="index.php">Receptkönyv</a>
      <div id="mainMenu">
			<ul>
				<div class="tooltip"> <a href="receptfelvesz.php">Felvétel</a> <span class="tooltiptext">Recept felvétele az adatbázisba.</span> </div>
				<div class="tooltip" id="currOldal"> <a href="receptmodosit.php">Módosítás</a> <span class="tooltiptext">Recept módosítása az adatbázisban.</span> </div>				
				<div class="tooltip"> <a href="recepttorol.php">Törlés</a> <span class="tooltiptext">Recept törlése az adatbázisból.</span> </div>
				<div class="tooltip"> <a href="receptlistaz.php">Listázás</a> <span class="tooltiptext">Adatbázisban lévő receptek listázása</span> </div>
				<div class="tooltip"> <a href="receptkalkulator.php">Kalkulátor</a> <span class="tooltiptext">Alapanyag kiszámoló oldal</span> </div>			
			</ul>			
		</div>
    </header>
	<div id="content">
			<form method="post" action="receptmodosit.php">
				<fieldset>
					<legend>Recept adatainak módosítása</legend>
					<table>
						<tr>
							<td><label for="id">Recept jelenlegi neve:</label></td>
							<td>
								<select id="id" name="id">
								<?php
									$res=mysqli_query($kapcsolat, "SELECT nev FROM etel");
									while($row=mysqli_fetch_row($res)){
										echo "<option value=\"$row[0]\">$row[0]</option>";
									}
								?>
							</td>
						</tr>
						<tr>
							<td><label for="ujnev">Recept új neve:</label></td>
							<td><input type="textfield" name="ujnev" id="ujnev" maxlength="30" /></td>
						</tr>
					
						<tr>
							<td><label for="elkIdo">Elkészítési ideje:</label></td>
							<td><input title="percben" type="textfield" name="elkIdo" id="elkIdo" maxlength="30" /></td>
						</tr>
						<tr>
							<td><label for="alapanyagok">Alapanyagok és mennyiségük:</label></td>
							<td><input title="grammban" type="textfield" name="alapanyagok" id="alapanyagok" maxlength="100" /></td>
						</tr>
						<tr>
							<td><label for="hanyszemely">Hány személyre szól a recept:</label></td>
							<td><input title="hanyszemely" type="textfield" name="hanyszemely" id="hanyszemely" maxlength="30" /></td>
						</tr>
						<tr>
							<td><input class="gomb" type="submit" name="elkuldes" id="elkuldes" value="Módosít" /></td>
							<td><input class="gomb" type="reset" name="megsem" id="megsem" value="Mégsem" /></td>
						</tr>
					</table>
						<?php
																																					
							if(!(empty($_POST['id']) || empty($_POST['ujnev']) || empty($_POST['elkIdo']) || empty($_POST['alapanyagok']) )){	
									$reginev = $_POST['id'];
									$ujnev=$_POST['ujnev'];
									$elkIdo=$_POST['elkIdo'];
									$alapanyagok=$_POST['alapanyagok'];
									$hanyszemely=$_POST['hanyszemely'];
									$daraboltalapanyagok = explode(" ",$alapanyagok); /*<!-- [liszt-100],[cukor-80] -->*/
									$result = "";
									foreach($daraboltalapanyagok as &$value) {
									list($k,$v) = explode('-', $value); 
										$result .= $k . "-" . $v . " ";
									}
									$corrigedresult = substr_replace($result ,"",-1);
									
									$query = "UPDATE receptkonyv.etel SET nev=\"$ujnev\",elkIdo=\"$elkIdo\",alapanyag=\"$corrigedresult\",hanyszemely=\"$hanyszemely\" WHERE nev=\"$reginev\"";
									$res=mysqli_query($kapcsolat, $query);
									if($res)
										echo "<p align=\"center\">A recept adatai módosultak</p>";
									else
										echo "Nem sikerült módosítani";			
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