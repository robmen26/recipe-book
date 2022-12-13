<?php

require_once("dbconfig.php");	
	session_start();	
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <title>Receptek listázása</title>
  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>
<?php

?>
  <div class="main">
    <header>
      <a id="focim" href="index.php">Receptkönyv</a>
      <div id="mainMenu">
			<ul>
				<div class="tooltip"> <a href="receptfelvesz.php">Felvétel</a> <span class="tooltiptext">Recept felvétele az adatbázisba.</span> </div>
				<div class="tooltip"> <a href="receptmodosit.php">Módosítás</a> <span class="tooltiptext">Recept módosítása az adatbázisban.</span> </div>				
				<div class="tooltip"> <a href="recepttorol.php">Törlés</a> <span class="tooltiptext">Recept törlése az adatbázisból.</span> </div>
				<div class="tooltip" id="currOldal"> <a href="receptlistaz.php">Listázás</a> <span class="tooltiptext">Adatbázisban lévő receptek listázása</span> </div>
				<div class="tooltip"> <a href="receptkalkulator.php"">Kalkulátor</a> <span class="tooltiptext">Alapanyag kiszámoló oldal</span> </div>			
			</ul>			
		</div>
    </header>
	
	<div id="listazasiLista">
	
	<h4>Receptek</h4>
			<table class="tabla">
				<tr class="tabla">
					<th>ID</th>
					<th>Név</th>
					<th>Elkészítési idő</th>
					<th>Alapanyagok és mennyiségük</th>
					<th>Hány személyre</th>
				</tr>
				<?php
					$res=mysqli_query($kapcsolat,"SELECT * FROM etel");
					while($row=mysqli_fetch_row($res)){
						 echo "<tr><td class=\"tabla\">$row[0]</td><td class=\"tabla\">$row[1]</td><td class=\"tabla\">$row[2]</td><td class=\"tabla\">$row[3]</td><td class=\"tabla\">$row[4]</td></tr>";
					}
				?>
			</table>
	
	</div>
  </div>
</body>

</html>