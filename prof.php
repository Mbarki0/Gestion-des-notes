<!DOCTYPE html>
<html lang="fr">
<head>
<?php   
        include 'erreur403.php';
        include 'connectDb.php';
        ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prof</title>
    <link rel="stylesheet" href="professeur.css">
</head>
<body>
    <div class="bg"></div>
<header>
<img src="LOGO.png" >
       <a href="chef_de_fillière.php"><input type="button" id="prof" name="prof" VALUE="Espace chef de filière"></a>
       <a href="deconnection.php" >
       <input type="button" id="deconnection" name="deconnection" VALUE="Déconnection" >
    </a>
</header>
  
    <h1>System de gestion des notes</h1>
    <fieldset>
    <p>Bonjour Mr<b>. 
    <?php
    echo $_SESSION['nom'];
    ?></b></p>
    <p> Filière :<b>DAI</b></p>
    <p> Nom du module : 
    <?php
  if( $_SESSION['Semester'] == 1)
  {
        $nmodule = $_SESSION['n_module'];
  }
  elseif($_SESSION['Semester'] == 2)
  {
    $nmodule = $_SESSION['n_module'] + 4;
  }
  elseif($_SESSION['Semester'] == 3)
  {
    $nmodule = $_SESSION['n_module'] + 8 ;

  }
  else
  {
  $nmodule = $_SESSION['n_module'] + 12 ;
  }
        if(isset($_SESSION['n_module']))
        {
            connectproblem($connexion);
            $resultatModule = mysqli_query($connexion ,"SELECT nom_module FROM module where id_module ='".$nmodule."' ;");
            if($resultatModule)
             {
                while($ligne = mysqli_fetch_object($resultatModule)) 
                {
                    echo '<b>'. $ligne->nom_module .'</b>';
                    $nom_module =$ligne->nom_module;
                }
            }
        }
    ?>
    </p>
     <p> Nom  du chef de module : 
    <?php
     connectproblem($connexion);
     $resultatModule = mysqli_query($connexion ,"SELECT chef_module.nom, chef_module.prenom
     FROM chef_module
     INNER JOIN module ON chef_module.id_chef_module = module.id_chef_module
      where id_module  ='".$nmodule."' ;");
     if($resultatModule)
      {
         while($ligne = mysqli_fetch_object($resultatModule)) 
         {
             echo '<b>'. $ligne->prenom .'</b>';
             echo '<b> '. $ligne->nom .'</b>';
         }
     }
    ?>
    </p>
     <p> Id  du chef de module : 
    <?php
     connectproblem($connexion);
     $resultatModule = mysqli_query($connexion ,"SELECT id_chef_module FROM module where id_module ='".$nmodule."' ;");
     if($resultatModule)
      {
         while($ligne = mysqli_fetch_object($resultatModule))
         {
             echo '<b>'.$id_chef= $ligne->id_chef_module .'</b>';
         }
     }
    ?>
    </p>
    </fieldset>
    <form method="POST">
    <label id="delais-le">Ajouter un delais</label>
    <input id="delais" type="date" value="Envoyer" name="delais" required="required">
    <ul><li><b>La maquette vide :</b></li></ul>
        <table border =0 cellspacing ='0' cellpadding = '10'>
     <?php

        $_SESSION['req']=$req = "SELECT  DISTINCT  etudiant.Apogée
        ,etudiant.Nom,etudiant.Prenom
                FROM etudiant
                  where etudiant.id_filiere = 1 
                  group by Apogée";
            
        $resultat = mysqli_query($connexion ,$req);
        if($resultat) {
            echo '<th>Apogée</th>
            <th>nom  du module</th>
            <th>Nom </th>
            <th>Prénom</th>
            <th>Note</th>
            <th>Absence</th>
            ';
        while($ligne = mysqli_fetch_object($resultat)) {
        echo   
        '<tr align="center" style=" border-top :1px solid rgb(161, 161, 161);">
        <td>'. $ligne->Apogée.'</td>
        <td>'. $nom_module.'</td>
        <td>'.$ligne->Nom.'</td>
        <td>'.$ligne->Prenom.'</td>
        <td>'.'</td>
        <td>'.'</td>
        </tr>';
            }
        }
        else { echo "Erreur dans l'exécution de la requête. ". mysqli_error($connexion); }   
      

        ?>
        </table>
        
        <input id="sub" type="submit" value="Envoyer" name="envoyer">
        
    </form>
        <?php
        if(isset($_POST['envoyer']))
        {
        
                        connectproblem($connexion);
                    $resultat = mysqli_query($connexion ,"UPDATE module
                    SET lisible_prof = 1
                    WHERE id_chef_module ='".$id_chef."' and id_module='".$nmodule."';");
                    $_SESSION["File_name"] = $nmodule."_1"; 
                    if(isset($_POST['delais']))
                    {
                        echo $nmodule;
                       connectproblem($connexion);
                       $demande = "update module 
                       set delais ='".$_POST['delais']."' where id_module=".$nmodule;
                       ;
                       $resultat = mysqli_query($connexion ,$demande);
                    }
                    if($demande)
                    {echo '<script>alert("Le delais est modifier avec succés");</script>
                        ';

                    }
                    if($resultat) {
                        echo '<script>alert("Les données sont envoyer avec succés");</script>
                        ';
                       include "export.php";
                                 }
                                 
                    else { echo "Erreur dans l'exécution de la requête. ". mysqli_error($connexion); } 
        }    
        
        ?>

</body>
</html>