<?php
function GererujVetu()
{
/////////////////////
//// Zásoba slov ////
/////////////////////
$pridavneBarvy = array("bílý","zelený","růžový","modrý","barevný","červený","oranžový","modrý");
$pridavneVlastnost = array("blbý","tupý","chytrý","líný","inteligentní","fakt moc chytrý","malý","velký","skákající","živý");
$podmet = array("slon","lenochod","potkan","králík","zajíc","notebook","tablet","počítač","jazyk","zámek","pes","pán","stroj","muž","chlapec","reproduktor","myšák");
$sloveso = array("mlátil krokodýla","skákal","utíkal","se učil","mlátil hlavou o zeď","mlátil kladivem do počítače","poslouchal","tě zmlátil");

////////////////
// Výběr slov //
////////////////
switch(rand(0,1)) // Rozhodnutí, jestli bude 1. Přídavné jméno - Barva nebo Přídavné jméno - Vlastnost
{
case "0":
$prvni = $pridavneBarvy[array_rand($pridavneBarvy)];
$druhe = $pridavneVlastnost[array_rand($pridavneVlastnost)];
break;
case "1":
$druhe = $pridavneBarvy[array_rand($pridavneBarvy)];
$prvni = $pridavneVlastnost[array_rand($pridavneVlastnost)];
break;
}
$treti = $podmet[array_rand($podmet)];
$ctvrte = $sloveso[array_rand($sloveso)];

//////////////
// Výsledek //
//////////////
$vysledek = $prvni . " " . $druhe . " " . $treti . " " . $ctvrte;
return $vysledek;
}

function VypisVetu() // Složení věty - Přidá odstavce
{
$veta = "<p>" . GererujVetu() . "</p>";
return $veta;
}
?>