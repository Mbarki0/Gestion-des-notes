<?php
include_once("config.php");

$id = "";
$idn = "";
$idp = "";
$idc = "";
$idl = "";
$ide = "";
$idd = "";

$modifier = "";

//pour ajouter
if(isset($_POST['btn_Ajout']))
{
    $id_module = $_POST['id_module'];
    $nom_module = $_POST['nom_module'];
    $Semester = $_POST['Semester'];
    $id_chef_module = $_POST['id_chef_module'];
$sqli = "INSERT INTO module (id_module,nom_module,Semester,id_chef_module, id_ens) VALUES ('$id_module','$nom_module','$Semester','$id_chef_module','$id_chef_module') ";
$query = mysqli_query($connexion,$sqli);
if($query)
{
   
 echo "enregistrement a bien";
}
else{
    echo "Erreur enregistrement";
}
header("refresh:3; url=module.php");
 }
// pour la supression
 if(isset($_GET['delete']))
 {
     $id = $_GET['delete'];
     $sqli = "DELETE FROM module where id_module='$id'";
     $query = mysqli_query($connexion,$sqli);
 if($query)
 {
    
  echo "supression a bien";
 }
 else{
    echo "Erreur supression";
}
header("refresh:0; url=module.php");
 
  }
  //afficher la zone pour modifier
  if(isset($_GET['edit']))
  {
      $id = $_GET['edit'];
      $sqli = "SELECT * FROM module where id_module='$id'";
      $query = mysqli_query($connexion,$sqli);
      $ligne = mysqli_fetch_object($query);
      $id = $ligne->id_module;
      $idn = "$ligne->nom_module";
      $idp = $ligne->Semester;
      $idc = $ligne->id_chef_module;
 

      $modifier = true;
   } 
   //btn edit
   if(isset($_POST['btn_edit']))
   {

$id = $_POST['id_module'];
$nom_module = $_POST['nom_module'];
$Semester = $_POST['Semester'];
$id_chef_module = $_POST['id_chef_module'];
$lisible_prof = $_POST['lisible_prof'];
$id_ens = $_POST['id_ens'];
$delais = $_POST['delais'];
$sqli = "UPDATE module SET nom_module='$nom_module',Semester='$Semester',id_chef_module='$id_chef_module',lisible_prof='$lisible_prof',id_ens='$id_ens',delais='$delais' WHERE id_module='$id'";
$query = mysqli_query($connexion,$sqli);
if($query)
{
echo "modification sucess";

}
header("refresh:0; url=module.php");
   }


?>