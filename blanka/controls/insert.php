<?php
session_start();
header("Content-type: text/plain; charset=UTF-8");

include_once "../config/config.php";

$ip_address = $_POST["ip_address"];
$sentence = $_POST["sentence"];

$data = [
    'ip_address' => $ip_address,
    'sentence' => $sentence
];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = "INSERT INTO sentences (ip_address, sentence) VALUES (:ip_address, :sentence)";
    $statement= $conn->prepare($sql);

    if($statement->execute($data)) {
        echo "Změny uloženy!";
    } else {
        echo "Chyba!";
    }

} catch(PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        echo "Duplicitní ID!";
    } else {
        // an error other than duplicate entry occurred
        echo "Chyba!";
        echo "<br>" . $e->getMessage();
    }
}

$conn = null;
