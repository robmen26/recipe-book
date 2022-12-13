<?php
	
	require_once("dbconfig.php");	

	session_start();	
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <title>Recept kalkulátor</title>
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
				<div class="tooltip"> <a href="receptmodosit.php">Módosítás</a> <span class="tooltiptext">Recept módosítása az adatbázisban.</span> </div>				
				<div class="tooltip"> <a href="recepttorol.php">Törlés</a> <span class="tooltiptext">Recept törlése az adatbázisból.</span> </div>
				<div class="tooltip"> <a href="receptlistaz.php">Listázás</a> <span class="tooltiptext">Adatbázisban lévő receptek listázása</span> </div>
				<div class="tooltip" id="currOldal"> <a href="receptkalkulator.php">Kalkulátor</a> <span class="tooltiptext">Alapanyag kiszámoló oldal</span> </div>			
			</ul>			
		</div>
    </header>
	<div id="receptText">
				<img src="img/recipe.png" alt="Recipe" id="receptImg">
				<p>Válassza ki a kívánt receptet és adja meg, hány főre szeretné kiszámítani a hozzá tartozó alapanyagokat.</p>
				
	</div>
	<div id="contentKalk">
			<form method="post" action="kalkulalt.php">
				<fieldset>
					<legend>Recept kalkulátor</legend>
					<table>
						<tr>
							<td><label for="receptnev">Recept neve</label></td>
							<td>
								<select id="receptnev" name="receptnev">
								<?php
									$res=mysqli_query($kapcsolat, "SELECT nev FROM etel");
									while($row=mysqli_fetch_row($res)){
										echo "<option value=\"$row[0]\">$row[0]</option>";
									}
									
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="">Hány személyre szeretné elkészíteni</label></td>
							<td><input type="textfield" name="fejadagszam" id="fejadagszam" maxlength="30" /></td>
						</tr>
					
						<tr>
							<td><input class="gomb2" type="submit" name="elkuldes" id="elkuldes" value="Kiszámítás" /></td>
						</tr>
					</table>
						
				</fieldset>
			</form>
			
			
		</div>
  </div>
</body>

</html>