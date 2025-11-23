<?php
include_once("config.php");
$id = "";
$idn = "";
$idp = "";


$modifier = "";
//pour ajouter
if(isset($_POST['btn_Ajout']))
{
    $id_filiere = $_POST['id_filiere'];
    $nom_filiere = $_POST['nom_filiere'];
    $departement = $_POST['departement'];
$sqli = "INSERT INTO filiere VALUES ($id_filiere,'$nom_filiere','$departement') ";
$query = mysqli_query($connexion,$sqli);
if($query)
{
   
 echo "enregistrement a bien";
}
else{
    echo "Erreur enregistrement";
}
header("refresh:0; url=fil.php");
 }
// pour la supression
 if(isset($_GET['delete']))
 {
     $id = $_GET['delete'];
     $sqli = "DELETE FROM filiere where id_filiere='$id'";
     $query = mysqli_query($connexion,$sqli);
 if($query)
 {
    
  echo "supression a bien";
 }
 else{
    echo "Erreur supression";
}
header("refresh:0; url=fil.php");
 
  }
  //afficher la zone pour modifier
  if(isset($_GET['edit']))
  {
      $id = $_GET['edit'];
      $sqli = "SELECT * FROM filiere where id_filiere='$id'";
      $query = mysqli_query($connexion,$sqli);
      $ligne = mysqli_fetch_object($query);
      $id = $ligne->id_filiere;
      $idn = "$ligne->nom_filiere";
      $idp = "$ligne->departement";
     

      $modifier = true;
   } 
   //btn edit
   if(isset($_POST['btn_edit']))
   {

$id = $_POST['id_filiere'];
$nom_filiere = $_POST['nom_filiere'];
$departement = $_POST['departement'];
$sqli = "UPDATE filiere SET nom_filiere='$nom_filiere',departement='$departement' WHERE id_filiere='$id'";
$query = mysqli_query($connexion,$sqli);
if($query)
{
echo "modification sucess";

}
header("refresh:0; url=fil.php");
   }


?>