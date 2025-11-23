<?php
include_once("config.php");

$id = "";
$idn = "";
$idp = "";
$idcompte = "";
$idf = "";
$ide = "";
$ida = "";

$modifier = "";


//pour ajouter
if(isset($_POST['btn_Ajout']))
{
    $id_compte = $_POST['idco'];
    $username = $_POST['username'];
    $mtp = $_POST['mtp'];
    $typeCompte = $_POST['co'];
    $id = $_POST['id'];
    /*$id_chef = $_POST['id_chef'];
    $id_ad = $_POST['id_ad'];*/
    if(strcmp($typeCompte,0)==0)
         { 
            $sqli = "INSERT INTO compte (`id_compte`, `username`, `mtp`, `typeCompte`, `id_ens`)VALUES ($id_compte,'$username','$mtp',$typeCompte,$id) ";
            $query = mysqli_query($connexion,$sqli);
            if($query)
            {
            
            echo "enregistrement a bien";
            }
            else{
                echo "Erreur enregistrement";
            }
            header("refresh:0; url=compte.php");
        }
    elseif(strcmp($typeCompte)==1)
         { 
            $sqli = "INSERT INTO compte (`id_compte`, `username`, `mtp`, `typeCompte`,`id_chef`)VALUES ($id_compte,'$username','$mtp',$typeCompte,$id) ";
            $query = mysqli_query($connexion,$sqli);
            if($query)
            {
            
            echo "enregistrement a bien";
            }
            else{
                echo "Erreur enregistrement";
            }
            header("refresh:0; url=compte.php");
        }
    elseif(strcmp($typeCompte)==2)
         { 
            $sqli = "INSERT INTO compte (`id_compte`, `username`, `mtp`, `typeCompte`,`id_admin`)VALUES ($id_compte,'$username','$mtp',$typeCompte,$id) ";
            $query = mysqli_query($connexion,$sqli);
            if($query)
            {
            
            echo "enregistrement a bien";
            }
            else{
                echo "Erreur enregistrement";
            }
            header("refresh:0; url=compte.php");
        }
}
// pour la supression
 if(isset($_GET['delete']))
 {
     $id = $_GET['delete'];
     $sqli = "DELETE FROM compte where id_compte='$id'";
     $query = mysqli_query($connexion,$sqli);
 if($query)
 {
    
  echo "supression a bien";
 }
 else{
    echo "Erreur supression";
}
header("refresh:0; url=compte.php");
 
  }
  //afficher la zone pour modifier
  if(isset($_GET['edit']))
  {
      $id = $_GET['edit'];
      $sqli = "SELECT * FROM compte where id_compte='$id'";
      $query = mysqli_query($connexion,$sqli);
      $ligne = mysqli_fetch_object($query);
      $id = $ligne->id_compte;
      $idn = "$ligne->username";
      $idp = "$ligne->mtp";
      $idcompte = "$ligne->typeCompte";
      $idf = $ligne->id_ens; 
      $ide = $ligne->id_chef; 
      $ida = $ligne->id_admin;  

      $modifier = true;
   } 
   //btn edit
   if(isset($_POST['btn_edit']))
   {

$id = $_POST['idco'];
$username = $_POST['username'];
$mtp = $_POST['mtp'];
$typeCompte = $_POST['co'];
$id_ens = $_POST['id_ens'];
$id_chef = $_POST['id_chef'];
$id_ad = $_POST['id_ad'];
$sqli = "UPDATE compte SET username='$username',mtp='$mtp' typeCompte='$typeCompte' id_ens='$id_ens' id_chef='$id_chef' id_admin='$id_ad' WHERE id_compte='$id'";
$query = mysqli_query($connexion,$sqli);
if($query)
{
echo "modification sucess";

}
header("refresh:0; url=compte.php");
   }
      

 

?>