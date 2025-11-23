<?php
include 'erreur403.php';
include("connectDb.php");

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef de fillière</title>
    <link rel="stylesheet" href="VoirNoteChef.css">
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
    <table>
    <form>
        <?php
         $Notes = mysqli_query($connexion ,"SELECT * from note  
         INNER join module 
         on module.id_module = note.id_module
         INNER join etudiant ON etudiant.Apogée = note.Apogée
         LEFT join matiere on note.id_matiere = matiere.id_matiere
         where module.id_module ='".$_SESSION['finalChoice']."'
         group by matiere.id_matiere ,note.Apogée ");
         if($Notes)
          {echo '<th>Apogée</th>
            <th>nom  du module</th>
            <th>Nom </th>
            <th>Prénom</th>
            <th>Note</th>
            <th>Absence</th>
            <th>nom  du matiere</th>
            ';
        while($ligne = mysqli_fetch_object($Notes)) {
        echo   
        '<tr align="center" style=" border-top :1px solid rgb(161, 161, 161);">
        <td>'. $ligne->Apogée.'</td>
        <td>'.$ligne->nom_module.'</td>
        <td>'.$ligne->Nom.'</td>
        <td>'.$ligne->Prenom.'</td>
        <td>'. $ligne->note.'</td>
        <td>'. $ligne->Absence.'</td>
        <td><b>'.$ligne->nom_matiere.'</b></td>
        </tr>';
        $idmodule = $ligne->id_module;
            }
        }
        else { echo "Erreur dans l'exécution de la requête. ". mysqli_error($connexion); }   
        ?>
        </table>
        <div>
            <?php
            echo' <a href="'.$_SESSION['finalChoice'].'_1.csv" download id="download"><span>Download</span><span>CSV</span></a>';
            ?>
		
</div>

    </form>
</body>
</html>