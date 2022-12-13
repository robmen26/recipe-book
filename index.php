<?php
	require_once("dbconfig.php");	
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <title>Receptkönyv</title>
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
				<div class="tooltip"> <a href="receptkalkulator.php">Kalkulátor</a> <span class="tooltiptext">Alapanyag kiszámoló oldal</span> </div>			
			</ul>
		</div>
    </header>
	<div id="welcomeText">
				<p>Üdvözöljük a Receptkönyv nevű oldalon!</p>
				<p>Kérem válasszon a feljebb találhatő menüpontok közül annak megfelelően, hogy milyen műveletet szeretne elvégezni.</p>
				<p>Ha a menüpontokra viszi az egérmutatót egy rövid leírást fog látni az adott funkcióról.</p>
				<img src="img/chef.png" alt="Chef" id="chefImg">
	</div>
  </div>
  <div id="foot">
  <p>Készítette:Nagy Róbert Dávid<br>2021</p>
</div>
</body>

</html>