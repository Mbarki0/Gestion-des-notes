<?php
include_once("config.php");

$id = "";
$idn = "";
$idp = "";
$idf = "";

$modifier = "";


//pour ajouter
if(isset($_POST['btn_Ajout']))
{
    $Apogee = $_POST['apg'];
    $nom = $_POST['nom'];
    $Prénom = $_POST['prenom'];
    $ID_filiére = $_POST['filiere'];
$sqli = "INSERT INTO etudiant VALUES ('$Apogee','$nom','$Prénom','$ID_filiére') ";
$query = mysqli_query($connexion,$sqli);
if($query)
{
   
 echo "enregistrement a bien";
}
else{
    echo "Erreur enregistrement";
}
header("refresh:0; url=ad.php");
 }
// pour la supression
 if(isset($_GET['delete']))
 {
     $id = $_GET['delete'];
     $sqli = "DELETE FROM etudiant where Apogée='$id'";
     $query = mysqli_query($connexion,$sqli);
 if($query)
 {
    
  echo "supression a bien";
 }
 else{
    echo "Erreur supression";
}
header("refresh:0; url=ad.php");
 
  }
  //afficher la zone pour modifier
  if(isset($_GET['edit']))
  {
      $id = $_GET['edit'];
      $sqli = "SELECT * FROM etudiant where Apogée='$id'";
      $query = mysqli_query($connexion,$sqli);
      $ligne = mysqli_fetch_object($query);
      $id = $ligne->Apogée;
      $idn = $ligne->Nom;
      $idp = $ligne->Prenom;
      $idf = $ligne->id_filiere;  

      $modifier = true;
   } 
   //btn edit
   if(isset($_POST['btn_edit']))
   {

$id = $_POST['apg'];
$nom = $_POST['nom'];
$Prénom = $_POST['prenom'];
$ID_filiére = $_POST['filiere'];
$sqli = "UPDATE etudiant SET Nom='$nom',Prenom='$Prénom',id_filiere='$ID_filiére' WHERE Apogée='$id'";
$query = mysqli_query($connexion,$sqli);
if($query)
{
echo "modification sucess";

}
header("refresh:0; url=ad.php");
   }
      

 

?>