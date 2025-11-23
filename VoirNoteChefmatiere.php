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
         $Notes = mysqli_query($connexion ,"SELECT * from note_en_attent 
         INNER join matiere 
         on matiere.id_matiere = note_en_attent.id_matiere
         INNER join enseignant
         on enseignant.id_ens = matiere.id_ens
         INNER join etudiant ON etudiant.Apogée = note_en_attent.Apogée
         where matiere.id_matiere = '".$_SESSION['finalChoice']."';");
         if($Notes)
          {echo '<th>Apogée</th>
            <th>nom  du module</th>
            <th>Nom </th>
            <th>Prénom</th>
            <th>Note</th>
            <th>Absence</th>
            ';
        while($ligne = mysqli_fetch_object($Notes)) {
        echo   
        '<tr align="center" style=" border-top :1px solid rgb(161, 161, 161);">
        <td>'. $ligne->Apogée.'</td>
        <td>'.$ligne->nom_matiere.'</td>
        <td>'.$ligne->Nom.'</td>
        <td>'.$ligne->Prenom.'</td>
        <td>'. $ligne->note.'</td>
        <td>'. $ligne->Absence.'</td>
        </tr>';
        $id_matiere = $ligne->id_matiere;
            }
        }
        else { echo "Erreur dans l'exécution de la requête. ". mysqli_error($connexion); }   
        ?>
        </table>
        <div>
            <?php
            echo' <a href="'.$id_matiere.'_1.csv" download id="download"><span>Download</span><span>XSL</span></a>';
            ?>
		
</div>

    </form>
</body>
</html>