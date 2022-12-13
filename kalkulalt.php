<?php
	
	require_once("dbconfig.php");	

	session_start();	
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
  <div id="listazasiLista">
    <header>
      <a id="focim" href="index.php">Receptkönyv</a>
	</header>
		<table class="tabla">
			<th class="tabla">Hozzávaló neve</th>
			<th class="tabla">Szükséges mennyiség</th>
			<?php
																																		
			if(!(empty($_POST['fejadagszam']) || empty($_POST['receptnev']))){		
				$fejadagszam = $_POST['fejadagszam'];
				$receptnev = $_POST['receptnev'];
				echo "<h4 id=\"kalkulatorreceptnev\"><b>$receptnev</b></h4>";	
				echo "<p id=\"kalkulatormennyiseg\"><b>$fejadagszam főhöz szükséges mennyiségek</b></p>";	
				?>
				<?php
				$res=mysqli_query($kapcsolat, "SELECT alapanyag, hanyszemely FROM receptkonyv.etel WHERE nev = \"$receptnev\"");
				while($row=mysqli_fetch_row($res)){
					$eredetifejadag = $row[1];
					$daraboltalapanyagok = explode(" ",$row[0]);
									$result = "";
									foreach($daraboltalapanyagok as &$value) { 
										list($k,$v) = explode('-', $value); 
										$ujmenny = ($k /  $eredetifejadag) * $fejadagszam;
										$kerekitett = ceil($ujmenny);
										?>
										<tr class="tabla">
											<td class="tabla">
										<?php
										echo $v; 
										?>
										</td>
										<td class="tabla">
											<?php
										echo $kerekitett; 						
									}
			   	}
			}
			?></td>
			</tr>
		</table>
		<form method="get" action="receptkalkulator.php">
				<button class="visszagomb" type="submit">Vissza</button>
		</form>
  </div>
</body>

</html>