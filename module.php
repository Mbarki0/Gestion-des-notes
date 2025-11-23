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
       <input type="button" id="chef" name="chef" VALUE="Espace chef de filière">
       <input type="button" id="deconnection" name="deconnection" VALUE="Déconnection">
   </header> 
   <fieldset>
       <legend>
       <image src="https://www.freeiconspng.com/uploads/inbox-empty-image-icon-26.png" >
        La listes des modules   
    </legend>
   <form method="post">
    <?php
    session_start();
        connectproblem($connexion);
        $resultat = mysqli_query($connexion ,"SELECT nom_module FROM module where Semester ='" .$_SESSION['Semester']."'");
        if($resultat) {
        while($ligne = mysqli_fetch_object($resultat)) {
        echo   
        '<a href="S2.php" name="s2" >'. $ligne->nom_module. '</a>';}
        }
        else { echo "Erreur dans l'exécution de la requête. ". mysqli_error($connexion); }   
        ?>
        
    </form>
    </fieldset>
    <input type="button" id="Retour" name="Retour" VALUE="Retour">
  
        

    
</body>
</html>