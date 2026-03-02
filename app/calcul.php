<!DOCTYPE html>
<html lang="ca">
<head>
        <meta charset="utf-8">
        <title>CÀLCUL DEL PREU DEL PARTIT SELECCIONAT</title>
</head>
        <body>
                <p><u>CÀLCUL DEL PREU DEL PARTIT SELECCIONAT</u></p>
                <?php
			if ($_GET["e1"]==$_GET["e2"]){
				echo "Has d'escollir 2 equips diferents. Has de pagar 0,45 Euros per les molèsties ocasionades</br>";
			}
			else{
				if ((($_GET["e1"]=="a") and  ($_GET["e2"]=="b")) or (($_GET["e1"]=="b") and  ($_GET["e2"]=="a"))){
					echo "Partit de la màxima rivalitat comarcal. Preu: 4580,25 Euros</br>";
				}
				else {
					echo "Partit bàsic de la lliga comarcal. Preu: 2,75 Euros</br>";
				}
			}
		?>
		<br>
		<a href="index.html">Torna a la pàgina anterior</a>
        </body>
</html>
