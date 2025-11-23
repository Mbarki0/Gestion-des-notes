<?php
    include("connectDb.php");
    include("erreur403.php");
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
    <link rel="stylesheet" href="sous_modules_chef.css">
    
    <title>Document</title>
    
</head>
<body>
<header>
<img src="LOGO.png" >
            <a href="prof_last.php"><input type="button" id="prof" name="prof" VALUE="Espace du professeur"></a>
                    <a href="chef-module.php"><input type="button" id="chef" name="chef" VALUE="Espace chef de module"></a>
                    <a href="deconnection.php" >
                    <input type="button" id="deconnection" name="deconnection" VALUE="Déconnection">
                        </a>
            </header> 
            
            <p>&nbsp; Bonjour Mr.<b>
                    <?php
                    echo $_SESSION['nom'];
                    ?></b></p>
                    <br>
                    <TABLE id="info">
                    <TH> Nom sous module</TH>
                    <TH> Nom du professeur</TH>
                    <?php $moduleInfo= mysqli_query($connexion ,"select * from matiere 
                     inner join enseignant on enseignant.id_ens = matiere.id_ens where matiere.id_matiere='".$_SESSION['finalChoice']."'");
                            if($moduleInfo)
                            {while($ligne = mysqli_fetch_object($moduleInfo)) {
                                echo'
                                <TR><TD><b>'.$ligne->nom_matiere.'</b></TD><TD>'.$ligne->nom.' '.$ligne->prenom.'</TD></TR>';
                            }}
                            
                    ?>
                    <TR> <TD class="meet" COLSPAN="2"> <a href="http://meet.google.com\new" target="_blank"><img src="meet.png" style="height:20PX;width:auto;"> </a> </TD> </TR>
                        </TABLE>
                    <table>
                    <caption>Voici les notes :</caption>
                    <form method="post">
                    <?php
         $Notes = mysqli_query($connexion ,"SELECT * from note_en_attent
         INNER join module 
         on module.id_module = note_en_attent.id_module
         INNER join enseignant
         on enseignant.id_ens = module.id_ens
         INNER join etudiant ON etudiant.Apogée = note_en_attent.Apogée
         inner join matiere on matiere.id_matiere = note_en_attent.id_matiere
         where matiere.id_matiere = '".$_SESSION['finalChoice']."';");
         if($Notes)
          {
            if (mysqli_num_rows($Notes)!=0)
            {
              echo '<th>Apogée</th>
            <th>nom  de la matiere </th>
            <th>Nom </th>
            <th>Prénom</th>
            <th>Note</th>
            <th>Absence</th>
            ';
            
        echo"<input type='submit' value='Valider le sous module' name='submit' class='submit'>";
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
        $idmodule = $ligne->id_module;
        $nomMAtiere = $ligne->nom_matiere;
        $idMAtiere = $ligne->id_matiere;
        $ap = $ligne->Apogée;
        
        if(isset($_POST['submit']))
        {
            echo '<script>alertify.confirm("Envoyer maintenant ?.",
            function(){
              alertify.success("Oui");
            },
            function(){
              alertify.error("Annuler");
            });
            </script>';
            $Not = mysqli_query($connexion ,"select * from note where id_matiere ='".$idMAtiere."' and Apogée = '".$ap."'");
            if (mysqli_num_rows($Not)==0)
            {
            $valider = mysqli_query($connexion ,"INSERT INTO `note`(`note`, `Absence`, `id_module`, `Apogée`, `id_matiere`)
             VALUES ('".$ligne->note."','".$ligne->Absence."','".$ligne->id_module."','".$ligne->Apogée."','".$ligne->id_matiere." ')");
            }
            else
            {
                $req2= "UPDATE note
                SET note ='".$ligne->note."', Absence= '".$ligne->Absence."'where id_module ='".$ligne->id_module."' and Apogée='".$ligne->Apogée."'and id_matiere=".$ligne->id_matiere.";";
                $req2 = mysqli_query($connexion ,$req2);

            }
            
        }
        
            }
        }
        else
        {
        echo"<script>alert('La maquette n'est pas encore remplis ');</script>";
        echo "<p id='erreur'>La maquette est vide</p>";
        }
    }
    
        else { echo "Erreur dans l'exécution de la requête. ". mysqli_error($connexion); }   
        ?>
        
        </table>
    </form>
        <div>
        </div>

    
</body>
</html>
