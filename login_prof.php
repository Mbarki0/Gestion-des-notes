<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="STYLE_prof.css">
    <title>Login</title>
    
   </head>
<body>
    
    <div id="aaa"></div>
    <a href="http://www.esto.ump.ac.ma">
    </a>
    <div id="page">
     <img id="logo" src="logo.svg" ALT="logo">
<form method="post"  >
    
    <input class="input-field" id="username" type='text' name="login" placeholder="&nbsp;Nom d'utilisateur" required  >
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
      $sql = "SELECT username , mtp FROM `compte`  where typeCompte =0  ";
      $req1 =mysqli_query($db, $sql);
      while($ligne = mysqli_fetch_object($req1))
       {
         if(strcmp($ligne->username,$usr)==0 && strcmp($ligne->mtp,$pss)==0)
         { 
             $sql0="SELECT id_ens
             FROM compte
             where  username='".$usr."' and mtp='".$pss."'" ;
             $req2 =mysqli_query($db, $sql0);
             while($ligne = mysqli_fetch_object($req2))
                {
                   $id =  $ligne->id_ens ;
                }
            $sql1 = "SELECT enseignant.nom , enseignant.prenom ,enseignant.id_ens
            FROM enseignant 
            INNER JOIN compte ON enseignant.id_ens=compte.id_ens
            where compte.id_ens=$id;  ";
            $req =mysqli_query($db, $sql1);
            while($ligne = mysqli_fetch_object($req))
               {
                  $Nom =  $ligne->nom ." ".$ligne->prenom ;
                  $id_ens = $ligne->id_ens; 
               }
             // echo $Nom;
            session_start();
          $_SESSION['nom'] = $Nom;
          $_SESSION['id_ens'] = $id_ens; 

          header("location:prof_last.PHP");  
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