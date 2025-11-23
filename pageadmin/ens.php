<?php
include_once("config.php");
include_once("actionens.php");
include_once("erreur403.php");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin (enseignant)</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="all.css">
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
        <th>id_ens</th>
        <th>Nom</th>
        <th>Prénom</th>
        <td colspan="2" align="center" id="op" ><b>Action</b></td> 


</tr>
</thead>

<?php 
  include_once("config.php");
  $sqli = "select * from enseignant ";
  $query = mysqli_query($connexion,$sqli);
echo "<tbody>";
  if($query) {
            while($ligne = mysqli_fetch_object($query)) {
echo '<tr> 
         <td>'.$ligne->id_ens.'</td>
         <td>'.$ligne->nom.'</td>
         <td>'.$ligne->prenom.'</td>
        <td><a href="actionens.php?delete='.$ligne->id_ens.'"  class="btn btn-danger">Supprimer</a></td>
        <td><a href="ens.php?edit='.$ligne->id_ens.'" class="btn btn-info">Modifier</a></td></tr>';      
  }
   }

echo "</tbody>";
  ?>






</table>
    </div>
    <div class="col-md-4">
    <h3 class="text-center"> Ajouter des enseignant</h3><hr>
    <form method="post" action="actionens.php">
    <div class="form-group">
        <label>Id-ens:</label>
        <input type="number" name="id_ens" class="form-control" value="<?php echo $id;?>" placeholder="taper ID enseignant" />
</div>
    <div class="form-group">
        <label>Nom :</label>
        <input type="text" name="nom" class="form-control" value="<?php echo $idn;?>" placeholder="taper le nom d'enseignant" />
</div>
<div class="form-group">
        <label>Prénom :</label>
        <input type="text" name="prenom" class="form-control" value="<?php echo $idp;?>"  placeholder="taper le prénom d'enseignant" />
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
   



    <footer><b>developpers</b>Mohammed M'barki and Omar BERRAHOU</footer>
</body>
</html>