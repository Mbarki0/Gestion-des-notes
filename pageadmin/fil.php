<?php
include_once("config.php");
include_once("actionfil.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin (filiere)</title>
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
        <th>id_filiere</th>
        <th>Nom_filiere</th>
        <th>Departement</th>
        <td colspan="2" align="center" id="op"><b>Action</b></td> 


</tr>
</thead>

<?php 
  include_once("config.php");
  $sqli = "select * from filiere ";
  $query = mysqli_query($connexion,$sqli);
echo "<tbody>";
  if($query) {
            while($ligne = mysqli_fetch_object($query)) {
echo '<tr> 
         <td>'.$ligne->id_filiere.'</td>
         <td>'.$ligne->nomfiliere.'</td>
         <td>'.$ligne->departement.'</td>
        <td><a href="actionfil.php?delete='.$ligne->id_filiere.'"  class="btn btn-danger">Supprimer</a></td>
        <td><a href="fil.php?edit='.$ligne->id_filiere.'" class="btn btn-info">Modifier</a></td></tr>';      
  }
   }

echo "</tbody>";
  ?>

</table>
    </div>
   

    <div class="col-md-4">
    <h3 class="text-center"> Ajouter des filiéres</h3><hr>
    <form method="post" action="actionfil.php">
    <div class="form-group">
        <label>ID_filiére:</label>
        <input type="number" name="id_filiere" class="form-control" value="<?php echo $id;?>" placeholder="taper l'ID filiere" />
</div>
    <div class="form-group">
        <label>Nom-filiere:</label>
        <input type="text" name="nom_filiere" class="form-control" value="<?php echo $idn;?>" placeholder="taper le nom de la filiére" />
</div>
<div class="form-group">
        <label>Departement :</label>
        <input type="text" name="departement" class="form-control" value="<?php echo $idp;?>" placeholder="taper le departement " />
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