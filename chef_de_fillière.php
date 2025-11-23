<?php
include 'erreur403.php';

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef de fillière</title>
    <link rel="stylesheet" href="chef_account.css">
</head>
<body>
   <header>
   <img src="LOGO.png" >
       <a href="chef_de_fillière.php"><input type="button" id="prof" name="prof" VALUE="Envoie des maquettes"></a>
       <a href="reception-chef.php"><input type="button" id="reception" name="reception" VALUE="Reception des réponses"></a>
       <a href="deconnection.php" >
       <input type="button" id="deconnection" name="deconnection" VALUE="Déconnection" >
    </a>
    </header> 
    

   <p>Bonjour Mr. <b>
    <?php
    echo $_SESSION['nom'];
    ?></b>
    <p>
   <fieldset>
       <legend>
       <image src="FORM.png" >
       Veuillez choisir la semester</legend>
   <form method="post">
    <button class="a" name="s1" >Semester 1</button>
    <button class="a" name="s2" >Semester 2</button>
    <button class="a" name="s3" >Semester 3</button>
    <button class="a" name="s4" >Semester 4</button>
    </form>
    </fieldset>
    <?php
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if (isset($_POST['s1']))
     {
         session_start();
         $_SESSION['Semester'] = '1';
         header("location:semester.php");
         }
     if (isset($_POST['s2']))
     {
         session_start();
         $_SESSION['Semester'] = '2';
         header("location:semester.php");
     }
     if (isset($_POST['s3']))
     {
         session_start();
         $_SESSION['Semester'] = '3';
         header("location:semester.php");
     }
     if (isset($_POST['s4']))
     {
         session_start();
         $_SESSION['Semester'] = '4';
         header("location:semester.php");
     }
     
    if (isset($_POST['Retour']))
    {
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
   
} 

    ?>
</body>
</html>