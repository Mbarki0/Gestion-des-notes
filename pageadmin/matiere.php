<?php
include_once("config.php");
include_once("actionmat.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin (matiere)</title>
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
        <th>id_matiere</th>
        <th>nom_matiere</th>
        <th>id_module</th>
        <th>id_ens</th>
        <th>lisible_prof</th>
        <td colspan="2" align="center" id="op"><b>Action</b></td> 


</tr>
</thead>

<?php 
  include_once("config.php");
  $sqli = "select * from matiere ";
  $query = mysqli_query($connexion,$sqli);
echo "<tbody>";
  if($query) {
            while($ligne = mysqli_fetch_object($query)) {
echo '<tr> 
         <td>'.$ligne->id_matiere.'</td>
         <td>'.$ligne->nom_matiere.'</td>
         <td>'.$ligne->id_module.'</td>
         <td>'.$ligne->id_ens.'</td>
         <td>'.$ligne->lisible_prof.'</td>
        <td><a href="actionmat.php?delete='.$ligne->id_matiere.'"  class="btn btn-danger">Supprimer</a></td>
        <td><a href="matiere.php?edit='.$ligne->id_matiere.'" class="btn btn-info">Modifier</a></td></tr>';      
  }
   }

echo "</tbody>";
  ?>






</table>
    </div>
    <div class="col-md-4">
    <h3 class="text-center"> Ajouter des matiere</h3><hr>
    <form method="post" action="actionmat.php">
    <div class="form-group">
        <label>Id-matiere:</label>
        <input type="number" name="id_matiere" class="form-control" value="<?php echo $id;?>" placeholder="taper Id_matiere" />
</div>
    <div class="form-group">
        <label>Nom_matiere :</label>
        <input type="text" name="nom_matiere" class="form-control" value="<?php echo $idn;?>" placeholder="taper le nom de matiere" />
</div>
<div class="form-group">
        <label>Id-module:</label>
        <input type="number" name="id_module" class="form-control" value="<?php echo $idm;?>" placeholder="taper Id_module" />
</div>
<div class="form-group">
        <label>Id-ens:</label>
        <input type="number" name="id_ens" class="form-control" value="<?php echo $ide;?>" placeholder="taper Id_enseignant" />
</div>
<div class="form-group">
        <label>Lisible_prof:</label>
        <input type="number" name="lisible_prof" class="form-control" value="<?php echo $idl;?>" placeholder="lisibilité" />
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