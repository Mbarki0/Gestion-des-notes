<?php
include_once("erreur403.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ADMIN.css">
  <title>Document</title>
</head>
<body>
  <head>
<a href="../deconnection.php" >
    <input type="button" id="deconnection" name="deconnection" VALUE="Déconnection" >
 </a>
</head>
<h2>Bienvenue à la page d'administrateur</h2>
<p id="nom">Bonjours <b><?php
echo $_SESSION['nom'];
?><b></p>
  <section>
    <input type='button' onclick="window.location.href ='ad.php'" name='upload' value='espace de modification des étudiant' >
    <input type='button' onclick="window.location.href ='ens.php'" name='upload' value='espace de modification enseignant' >
    <input type='button' onclick="window.location.href ='fchef.php'" name='upload' value='espace de modification chef_module' >
    <input type='button' onclick="window.location.href ='compte.php'" name='upload' value='espace de modification les compte' >
    <input type='button' onclick="window.location.href ='fil.php'" name='upload' value='espace de modification les filieres' >
    <input type='button' onclick="window.location.href ='module.php'" name='upload' value='espace de modification les modules' >
    <input type='button' onclick="window.location.href ='matiere.php'" name='upload' value='espace de modification les matiere' >
   
  </section>
</body>
</html>