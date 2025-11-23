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
    $id_chef_module = $_POST['idc'];
    $id_ens = $_POST['ens'];
    $nom='';
    $prenom='';
$sql = "SELECT * FROM enseignant where id_ens ='".$id_ens."'";
$quer = mysqli_query($connexion,$sql);
if($quer)
{
    while($ligne = mysqli_fetch_object($quer)) {  
        $nom = $ligne->nom;
        $prenom = $ligne->prenom; 
}
}
$sqli = "INSERT INTO chef_module VALUES ('$id_chef_module','$nom','$prenom','$id_ens')";
$query = mysqli_query($connexion,$sqli);
if($query)
{
   
 echo "<script>alert('l'operation a été effectuer avec success');</script>";
}
else{
    echo "Erreur d'enregistrement";
}
header("refresh:0; url=fchef.php");
 }
// pour la supression
 if(isset($_GET['delete']))
 {
     $id = $_GET['delete'];
     $sqli = "DELETE FROM chef_module where id_chef_module='$id'";
     $query = mysqli_query($connexion,$sqli);
 if($query)
 {
    
  echo "supression a bien";
 }
 else{
    echo "Erreur supression";
}
header("refresh:0; url=fchef.php");
 
  }
  //afficher la zone pour modifier
  if(isset($_GET['edit']))
  {
      $id = $_GET['edit'];
      $sqli = "SELECT * FROM chef_module where id_chef_module='$id'";
      $query = mysqli_query($connexion,$sqli);
      $ligne = mysqli_fetch_object($query);
      $id = $ligne->id_chef_module;
      $idn = "$ligne->nom";
      $idp = "$ligne->prenom";
      $idf = $ligne->id_ens;  

      $modifier = true;
   } 
   //btn edit
   if(isset($_POST['btn_edit']))
   {

$id = $_POST['idc'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$id_ens = $_POST['ens'];
$sqli = "UPDATE chef_module SET nom='$nom',prenom='$prenom',id_ens='$id_ens' WHERE id_chef_module='$id'";
$query = mysqli_query($connexion,$sqli);
if($query)
{
echo "modification sucess";

}
header("refresh:0; url=fchef.php");
   }
      

 

?>