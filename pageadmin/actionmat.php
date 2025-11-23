<?php
include_once("config.php");

$id = "";
$idn = "";
$idm = "";
$ide = "";
$idl = "";

$modifier = "";

//pour ajouter
if(isset($_POST['btn_Ajout']))
{
    $id_matiere = $_POST['id_matiere'];
    $nom_matiere = $_POST['nom_matiere'];
    $id_module = $_POST['id_module'];
    $id_ens = $_POST['id_ens'];
    $lisible_prof = $_POST['lisible_prof'];
$sqli = "INSERT INTO matiere VALUES ('$id_matiere','$nom_matiere','$id_module','$id_ens','$lisible_prof') ";
$query = mysqli_query($connexion,$sqli);
if($query)
{
   
 echo "enregistrement a bien";
}
else{
    echo "Erreur enregistrement";
}
header("refresh:0; url=matiere.php");
 }
// pour la supression
 if(isset($_GET['delete']))
 {
     $id = $_GET['delete'];
     $sqli = "DELETE FROM matiere where id_matiere='$id'";
     $query = mysqli_query($connexion,$sqli);
 if($query)
 {
    
  echo "supression a bien";
 }
 else{
    echo "Erreur supression";
}
header("refresh:0; url=matiere.php");
 
  }
  //afficher la zone pour modifier
  if(isset($_GET['edit']))
  {
      $id = $_GET['edit'];
      $sqli = "SELECT * FROM matiere where id_matiere='$id'";
      $query = mysqli_query($connexion,$sqli);
      $ligne = mysqli_fetch_object($query);
      $id = $ligne->id_matiere;
      $idn = "$ligne->nom_matiere";
      $idm = "$ligne->id_module";
      $ide = "$ligne->id_ens";
      $idl = "$ligne->lisible_prof";
 
 
      $modifier = true;
   } 
   //btn edit
   if(isset($_POST['btn_edit']))
   {

$id = $_POST['id_matiere'];
$nom_matiere = $_POST['nom_matiere'];
$id_module = $_POST['id_module'];
$id_ens = $_POST['id_ens'];
$lisible_prof = $_POST['lisible_prof'];
$sqli = "UPDATE matiere SET nom_matiere='$nom_matiere',id_module='$id_module',id_ens='$id_ens',lisible_prof='$lisible_prof' WHERE id_matiere='$id'";
$query = mysqli_query($connexion,$sqli);
if($query)
{
echo "modification sucess";

}
header("refresh:0; url=matiere.php");
   }


?>