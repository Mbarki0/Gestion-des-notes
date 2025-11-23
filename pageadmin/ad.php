<?php
include_once("config.php");
include_once("action.php");
include_once("erreur403.php");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin (etudiant)</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style>
body{
    background-color: #fff;
}

h1,h2,h3,h4,h5,h6{
    color: black;
}
hr{
    border-color: #999;
}
table
{
  background: rgb(233, 234, 243);
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 1500px;
  border-radius: 10px 10px 0 0 ;
  overflow: hidden;
  
}	

th {
	background-color: #007bff;
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
  PADDING:15PX;
  
}
td {
	border: 1px solid #fff;
	padding: 10px 15px;
	position: relative;
}

}
input{
    background-color: #999;
}
#action
{
    background-color :#0468d2;
    color :white;
}



</style>
</head>
<body>
     <div class="container col-md-12">
         <div class="row justify-content-center">
        <div class="col-md-8">   
            <br>
<h2 class="text-center"> PAGE ADMIN</h2><hr><br>
</div>
</div> 
</div>
<div class="row">
    <div class="col-md-8">
        <h4 class="text-center" >Afficher les données de la BD </h4><hr>  
        <div class="table responsive"> 
        <table class="table table-bordered" cellspacing="0"  >
<thead>
    <tr>
        <th>Apogée</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>nom et ID filiére</th> 
        <td colspan="2" align="center" id="po" ><b>Action</b></td> 


</tr>
</thead>



<?php 
  include_once("config.php");
  $sqli = "select * from etudiant inner join filiere on etudiant.id_filiere = filiere.id_filiere ";
  $query = mysqli_query($connexion,$sqli);
echo "<tbody>";
  if($query) {
            while($ligne = mysqli_fetch_object($query)) {
echo '<tr> 
         <td>'.$ligne->Apogée.'</td>
         <td>'.$ligne->Nom.'</td>
         <td>'.$ligne->Prenom.'</td>
         <td>'.$ligne->nomfiliere.' '.$ligne->id_filiere.'</td>
        <td><a href="action.php?delete='.$ligne->Apogée.'"  class="btn btn-danger">Supprimer</a></td>
        <td><a href="ad.php?edit='.$ligne->Apogée.'" class="btn btn-info">Modifier</a></td></tr>';      
  }
   }

echo "</tbody>";
  ?>






</table>
</div>
</div>
    <div class="col-md-4">
    <h4 class="text-center"> Ajouter des étudiants</h4><hr>
    <form method="post" action="action.php">
    <div class="form-group">
        <label>Apogée:</label>
        <input type="number" name="apg" class="form-control" value="<?php echo $id;?>" placeholder="taper l'Apogée d'étudiant" />
</div>
    <div class="form-group">
        <label>Nom :</label>
        <input type="text" name="nom" class="form-control" value="<?php echo $idn;?>" placeholder="taper le nom d'étudiant" />
</div>
<div class="form-group">
        <label>Prénom :</label>
        <input type="text" name="prenom" class="form-control" value="<?php echo $idp;?>" placeholder="taper le prénom d'étudiant" />
</div>  

<div class="form-group">
        <label>ID_filiére :</label>
        <input type="number" name="filiere" class="form-control" value="<?php echo $idf;?>" placeholder="taper ID filiére" />
</div>

<div class="form-group">
    <?php if($modifier==true){  ?>
        <input type="submit" name="btn_edit" class="btn btn-success btn-block" value="Modifier"/>
        <?php  } else { ?>
        <input type="submit" name="btn_Ajout" class="btn btn-primary btn-block" value="Enregistrer"/> 
        <?php   }  ?>
        <hr>
</div>
    </form>
    </div>

</div>
</div>
</body>
</html>