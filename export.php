<?php
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
$dbHost = "localhost";
$dbName = "projet";
$dbChar = "utf8";
$dbUser = "root";
$dbPass = "";
try {
  $pdo = new PDO(
    "mysql:host=$dbHost;dbname=$dbName;charset=$dbChar",
    $dbUser, $dbPass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

$csvFile = $_SESSION["File_name"].".csv";
$handle = fopen($csvFile, "w");
if ($handle === false) { exit("Error creating $csvFile"); }

  

// (C) GET USERS FROM DATABASE + DIRECT OUTPUT
$stmt = $pdo->prepare($_SESSION['req']);
$stmt->execute();
fputcsv($handle, ["nom_module","Apogée","Nom", "Prenom","note","absence"]);
while ($ligne = $stmt->fetch()) {
    fputcsv($handle, [$nom_module,$ligne["Apogée"], $ligne["Nom"], $ligne["Prenom"]]);
}
fclose($handle);


