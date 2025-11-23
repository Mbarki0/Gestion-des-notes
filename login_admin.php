<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_admin.css">
    <title>Login</title>
    
   </head>
<body>
    
    <div id="aaa"></div>
    <a href="http://www.esto.ump.ac.ma">
    </a>
    <div id="page">
     <img id="logo" src="logo.svg" ALT="logo">
<form method="post" >
    
    <input class="input-field" id="usr" type='text' name="login" placeholder="&nbsp;Nom d'utilisateur" required  >
    <br><br>
    <input class="input-field" id="mtp" type='password' name="MTP" placeholder="&nbsp;Mot de passe" required><br>
    <p style="color : white ; margin :20px ; background-color : red;text-align:center;font-size:11px;"></p>
   <input class="pass" type='submit' name="valide" value="Connexion">
    </form>
    </div>
    <?php
   $db = mysqli_connect("localhost", "root", "" );
   mysqli_select_db($db, "projet");
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form 
      
      $usr = $_POST['login'];
      $pss =$_POST['MTP']; 
      $count = "select count(*) from compte";
      $nbro =mysqli_query($db, $count);
      $sql = "SELECT username , mtp FROM `compte`  where typeCompte =2 ";
      $req1 =mysqli_query($db, $sql);
      while($ligne = mysqli_fetch_object($req1))
       {
         if(strcasecmp($ligne->username,$usr)==0 && strcasecmp($ligne->mtp,$pss)==0)
         {  $sql1 = "SELECT enseignant.nom , enseignant.prenom
            FROM enseignant 
            INNER JOIN compte ON enseignant.id_ens=compte.id_compte
            where compte.id_compte=1;  ";
            $req =mysqli_query($db, $sql1);
            while($ligne = mysqli_fetch_object($req))
               {
                  $Nom =  $ligne->nom ." ".$ligne->prenom ;
               }
             // echo $Nom;
            session_start();
         $_SESSION['nom'] = $Nom;
             header("location:pageadmin/ADMIN.php");  
         }      
      }
      
      echo('<script> var snd = new Audio("lq.mkv");
      snd.play();
      document.getElementsByTagName("p")[0].innerHTML = "le mot de passe ou  le nom d \'utilisateur <br>sont invalide";
      </script>
      ');
      
         
   
     
   }
?>

</body>
</html>