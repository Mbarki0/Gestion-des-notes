<?php
include_once("config.php");
include_once("actionmo.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin (module)</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="all.css">
</head>
<body>
     <div class="container col-md-12">
         <div class="row justify-content-center">
        <div class="col-md-8">   
            <br>
<h3 class="text-center"> Faire les modification</h3><hr><br>
</div>
</div> 
</div>
<div class="row">
    <div class="col-md-8">
        <h3 class="text-center" >Afficher les données de la BD </h3><hr>  
        <table class="table table-bordered" id="om">
<thead>
    <tr>
        <th>id module</th>
        <th>nom module</th>
        <th>Semester</th>
        <th>nom de chef de module et son id</th>
        <td colspan="2" align="center" id="op"><b>Action</b></td> 

</tr>
</thead>

<?php 
  include_once("config.php");
  $sqli = "select * from module inner join chef_module on module.id_chef_module = chef_module.id_chef_module ";
  $query = mysqli_query($connexion,$sqli);
echo "<tbody>";
  if($query) {
            while($ligne = mysqli_fetch_object($query)) {
echo '<tr> 
         <td>'.$ligne->id_module.'</td>
         <td>'.$ligne->nom_module.'</td>
         <td>'.$ligne->Semester.'</td>
         <td>'.$ligne->nom .' '.$ligne->prenom.' '.$ligne->id_chef_module.'</td>
        <td><a href="actionmo.php?delete='.$ligne->id_module.'"  class="btn btn-danger">Supprimer</a></td>
        <td><a href="module.php?edit='.$ligne->id_module.'" class="btn btn-info">Modifier</a></td></tr>';      
  }
   }

echo "</tbody>";
  ?>






</table>
    </div>
    <div class="col-md-4">
    <h3 class="text-center"> Ajouter des modules</h3><hr>
    <form method="post" action="actionmo.php">
    <div class="form-group">
        <label>Id-module:</label>
        <input type="number" name="id_module" class="form-control" value="<?php echo $id;?>" placeholder="taper ID module" />
</div>
    <div class="form-group">
        <label>Nom de module:</label>
        <input type="text" name="nom_module" class="form-control" value="<?php echo $idn;?>" placeholder="taper le nom de module" />
</div>
<div class="form-group">
        <label>Semester :</label>
        <!--<input type="number" name="Semester"  value="<?php echo $idp;?>"  placeholder="Choisir semester" />-->
        <select name="Semester" class="form-control" >
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
        </select>
</div> 
<div class="form-group">
        <label>Id du chef de module:</label>
        <input type="number" name="id_chef_module" class="form-control" value="<?php echo $idc;?>" placeholder="taper ID_chef_module" />
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
   



    <footer><b>developpers</b> Mohammed M'barki and Omar BERRAHOU</footer>
</body>
</html>