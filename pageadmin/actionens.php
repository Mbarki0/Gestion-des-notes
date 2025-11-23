<?php
include_once("config.php");

$id = "";
$idn = "";
$idp = "";

$modifier = "";

//pour ajouter
if(isset($_POST['btn_Ajout']))
{
    $id_ens = $_POST['id_ens'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
$sqli = "INSERT INTO enseignant VALUES ('$id_ens','$nom','$prenom') ";
$query = mysqli_query($connexion,$sqli);
if($query)
{
   
 echo "enregistrement a bien";
}
else{
    echo "Erreur enregistrement";
}
header("refresh:0; url=ens.php");
 }
// pour la supression
 if(isset($_GET['delete']))
 {
     $id = $_GET['delete'];
     $sqli = "DELETE FROM enseignant where id_ens='$id'";
     $query = mysqli_query($connexion,$sqli);
 if($query)
 {
    
  echo "supression a bien";
 }
 else{
    echo "Erreur supression";
}
header("refresh:0; url=ens.php");
 
  }
  //afficher la zone pour modifier
  if(isset($_GET['edit']))
  {
      $id = $_GET['edit'];
      $sqli = "SELECT * FROM enseignant where id_ens='$id'";
      $query = mysqli_query($connexion,$sqli);
      $ligne = mysqli_fetch_object($query);
      $id = $ligne->id_ens;
      $idn = "$ligne->nom";
      $idp = "$ligne->prenom";
 

      $modifier = true;
   } 
   //btn edit
   if(isset($_POST['btn_edit']))
   {

$id = $_POST['id_ens'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sqli = "UPDATE enseignant SET nom='$nom',prenom='$prenom' WHERE id_ens='$id'";
$query = mysqli_query($connexion,$sqli);
if($query)
{
echo "modification sucess";

}
header("refresh:0; url=ens.php");
   }


?>