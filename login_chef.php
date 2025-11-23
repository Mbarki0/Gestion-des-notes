<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="STYLE_chef.css">
    <title>Login</title>
    
   </head>
<body>


    
    <div id="aaa"></div>
    <a href="http://www.esto.ump.ac.ma">
    </a>
    <div id="page">
     <img id="logo" src="logo.svg" ALT="logo">
<form method="POST">
    
    <input class="input-field" id="usr" type='text' name="login" placeholder="&nbsp;Nom d'utilisateur" required  >
    <br><br>
    <input class="input-field" id="mtp" type='password' name="MTP" placeholder="&nbsp;Mot de passe" required><br>
    <p style="color : white ; margin :20px ; background-color : red;text-align:center;font-size:11px;"></p>
    <input class="pass" type='submit' name="valide" value="Connexion">
    </form>
    </div>
    <?php
    session_start();
 $_SESSION['Type']="chef";
$db = mysqli_connect("localhost","root", "" );
mysqli_select_db($db, "projet");
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
   // username and password sent from form 
   $i=1;
   $usr = $_POST['login'];
   $pss =$_POST['MTP']; 
   $count = "select count(*) from compte where typeCompte = 1 ";
   $nbro =mysqli_query($db, $count);
   $sql = "SELECT username , mtp FROM compte where typeCompte=1  ";
   $req1 =mysqli_query($db, $sql);
   while($ligne = mysqli_fetch_object($req1))
    {
      if(strcmp($ligne->username,$usr)==0 && strcmp($ligne->mtp,$pss)==0)
      {  $sql0= "SELECT id_chef
         FROM compte
         where  username='".$usr."' and mtp='".$pss."'" ;
         $req2 =mysqli_query($db, $sql0);
         while($ligne = mysqli_fetch_object($req2))
            {
               $id =  $ligne->id_chef ;
            }
        $sql1 = "SELECT chef_filiere.nom , chef_filiere.prenom
        FROM chef_filiere
        INNER JOIN compte ON chef_filiere.id_chef=compte.id_chef
        where compte.id_chef='".$id."'";
        $req =mysqli_query($db, $sql1);
        while($ligne = mysqli_fetch_object($req))
           {
               $Nom =  $ligne->nom ." ".$ligne->prenom ;
           }
         echo $Nom;
         $_SESSION['nom'] = $Nom;
         header("location:chef_de_fillière.php");  
      }    
   }
   
   echo('<script> 
   document.getElementsByTagName("p")[0].innerHTML = "le mot de passe ou  le nom d \'utilisateur <br>sont invalide";
   </script>
   ');
     
}
 ?> 


</body>
</html>