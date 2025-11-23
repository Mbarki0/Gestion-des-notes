<?php
$connexion = mysqli_connect("localhost","root","");
function connectproblem($connexion)
{
if( !$connexion) { echo "Desolé, connexion à localhost impossible"; exit; }
if( !mysqli_select_db($connexion,'projet')) { echo "Désolé, accès à la base projet
impossible"; exit; }
}
function close($connexion)
{
    mysqli_close($connexion);
}

include 'erreur403.php';

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="semester.css">
</head>
<body>
   <header>
   <img src="LOGO.png" >
       <input type="button" id="chef" name="chef" VALUE="Espace chef de filière">
       <a href="deconnection.php" >
       <input type="button" id="deconnection" name="deconnection" VALUE="Déconnection">
        </a>
   </header> 
   <p>Bonjour <b> 
    <?php
    echo $_SESSION['nom'];
    ?></b></p>
   <fieldset>
       <legend>
       <image src="FORM.png" >
        La listes des modules   
    </legend>
   <form method="post">
    <?php
        connectproblem($connexion);
        $resultat = mysqli_query($connexion ,"SELECT nom_module FROM module where Semester ='" .$_SESSION['Semester']."'");
        if($resultat) {
            $numModule=1;
        while($ligne = mysqli_fetch_object($resultat)) {
        echo   
        '
        <style>
        button 
            { width: 500PX;
                height: 100PX;
                padding: 35PX;
                margin: 10px;
                margin-left: 10%;
                float: left;
                background-color: #53A7DB;
                border : none;
                border-radius: 10PX;
                text-align: center;
                font-size: 15px;
                font-weight:500;
                text-decoration: none;
                color:white;
            }
             button:hover
            {
                transform: scale(1.05,1.05);
                background-color: #015C92;
                font-weight:bold;
            }
        </style>
        <button class="a" name="a'.$numModule.'">'.$ligne->nom_module.'</button>
        ';
        
        $numModule++;
            }
        }
        else { echo "Erreur dans l'exécution de la requête. ". mysqli_error($connexion); }   
       
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if (isset($_POST['a1']))
     {   $_SESSION['n_module']=1;
         header("location:prof.php");
         }
     if (isset($_POST['a2']))
     {
        $_SESSION["n_module"]=2;
        
         header("location:prof.php");
     }
     if (isset($_POST['a3']))
     {
        $_SESSION["n_module"]=3;
         header("location:prof.php");
     }
     if (isset($_POST['a4']))
     {
        $_SESSION["n_module"]=4;
         header("location:prof.php");
     }
    if(!isset($_SESSION['nom']))
    {
        header('location:erreur.html');
    }
}?></form>
    </fieldset>
    <a href="chef_de_fillière.php">
    <input type="button" id="Retour" name="Retour" VALUE="Retour">
</a>
</body>
</html>