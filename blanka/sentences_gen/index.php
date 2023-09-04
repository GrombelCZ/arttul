<?php
include("core.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<title>Generátor náhodných vět | Soutěž Devbook.cz</title>
</head>
<body>
<header>Generátor vět</header>
<section id="vystup">
<article id="vety">
<?php
$pocetVet = $_GET['vet'];
if(isset($pocetVet))
{
for($I = 0; $I < $pocetVet; $I++)
{
echo(VypisVetu());
}
}
else
{
echo('
<article id="pocetVet">
<form action="index.php" method="get">
Počet vět <input type="number" value="1" max="10" name="vet"><input type="submit" value="Generuj">
</form>
</article>
');
}
?>
</article>
<?php if(isset($_GET['vet'])){echo('<a href="index.php" class="pocetVet">Změnit počet vět</a><a href="#" onClick="document.location.reload();" class="odkazDalsi">Další</a>');} ?>
</section>
</body>
</html>