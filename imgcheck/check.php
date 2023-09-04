<?php
/*
$filename = "2.png";
echo getimagesize($filename)[0] . " width</br>";
echo getimagesize($filename)[1] . " height</br>";
echo pathinfo($filename, PATHINFO_EXTENSION) . " type</br>";
echo filesize($filename) . " bytes</br>";

echo "</br>";

*/

if (isset($_POST["data"])) {
    echo json_encode($_POST["data"]);
} else {
    echo json_encode("shit");
}



