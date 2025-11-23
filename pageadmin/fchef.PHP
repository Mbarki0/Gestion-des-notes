<?php
include_once("config.php");
include_once("fchefaction.php");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin (chef module)</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="all.css">
</head>
<body><header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="admin.html">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
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
        <p class="text-center" >Afficher les données de la BD </p><hr>  
        <div class="table responsive"> 
        <table class="table table-bordered" cellspacing="0"  >
<thead>
    <tr>
        <th>Id chef module </th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Id enseiganant</th>
        <td colspan="2" align="center" id="op"><b>Action</b></td> 


</tr>
</thead>



<?php 
  include_once("config.php");
  $sqli = "select * from chef_module ";
  $query = mysqli_query($connexion,$sqli);
echo "<tbody>";
  if($query) {
            while($ligne = mysqli_fetch_object($query)) {
echo '<tr> 
         <td>'.$ligne->id_chef_module.'</td>
         <td>'.$ligne->nom.'</td>
         <td>'.$ligne->prenom.'</td>
         <td>'.$ligne->id_ens.'</td>

        <td><a href="fchefaction.php?delete='.$ligne->id_chef_module.'"  class="btn btn-danger">Supprimer</a></td>
        <td><a href="fchef.php?edit='.$ligne->id_chef_module.'" class="btn btn-info">Modifier</a></td></tr>';      
  }
   }

echo "</tbody>";
  ?>

</table>
</div>
</div>
    <div class="col-md-4">
    <p class="text-center"> Ajouter chef du module  </p><hr>
    <form method="post" action="fchefaction.php">
    <div class="form-group">
        <label>ID chef de module:</label>
        <input type="number" name="idc" class="form-control" value="<?php echo $id;?>" placeholder="taper l'ID de chef de module " />
</div>
<div>
<div class="form-group">
        <label>ID enseignant :</label>
        <select name="ens" id="ens"  class="form-control">
            <?php 
            $sql = "select * from enseignant ";
            $q = mysqli_query($connexion,$sql);
            if($q) {
                      while($ligne = mysqli_fetch_object($q)) {
            echo '<option value="'.$id_ens.'">'.$ligne->id_ens.' '.$ligne->prenom.' '.$ligne->nom.'</option>';
                      }
                    }
            ?>
        </select>
    </div>
    


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
   
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