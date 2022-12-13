<?php
	require_once("dbconfig.php");	

	session_start();	
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <title>Recept törlése</title>
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
				<div class="tooltip" id="currOldal"> <a href="recepttorol.php">Törlés</a> <span class="tooltiptext">Recept törlése az adatbázisból.</span> </div>
				<div class="tooltip"> <a href="receptlistaz.php">Listázás</a> <span class="tooltiptext">Adatbázisban lévő receptek listázása</span> </div>
				<div class="tooltip"> <a href="receptkalkulator.php">Kalkulátor</a> <span class="tooltiptext">Alapanyag kiszámoló oldal</span> </div>			
			</ul>			
		</div>
    </header>
	<div id="content">
			<form method="post" action="recepttorol.php">
				<fieldset>
					<legend>Recept törlése</legend>
					<table>
						<?php
																																					
							if(!(empty($_POST['nev']))){	
									$nev=$_POST['nev'];									
																	
																											
									$res=mysqli_query($kapcsolat, "DELETE FROM etel WHERE id=$nev");
									if($res)
										echo "<p align=\"center\">A Receptet töröltük az adatbázisból</p>";
									else
										echo "Nem sikerült törölni a receptet";
								
								
							}
						?>
						<tr>
							<td><label for="nev">Recept neve:</label></td>
							<td>
								<select id="nev" name="nev">
								<?php
									$res=mysqli_query($kapcsolat, "SELECT * FROM receptkonyv.etel");
									while($row=mysqli_fetch_row($res)){
										echo "<option value=\"$row[0]\">$row[1]</option>";
									}
									
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td><input class="gomb" type="submit" name="torol" id="torol" value="Törlés" /></td>
						</tr>
					</table>
						
				</fieldset>
			</form>
		</div>
  </div>
</body>

</html>