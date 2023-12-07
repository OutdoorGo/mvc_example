<?php

//affichage message d'erreur PHP
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
// include("file_with_errors.php");

//connexion à la base
require_once 'pdoconfig.php';
try {
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
die ("Could not connect to the database $dbname :" . $pe->getMessage());
}

?>