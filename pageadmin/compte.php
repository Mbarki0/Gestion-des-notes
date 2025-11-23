<?php
include_once("config.php");
include_once("actionco.php");
include_once("erreur403.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin (compte)</title>
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
    <div class="col-md-4 container center_div">
    <h3 class="text-center"> Ajouter des comptes</h3><hr>
    <form method="post" action="actionco.php">
    <div class="form-group">
        <label> id_compte:</label>
        <input type="number" name="idco" class="form-control" value="<?php echo $id;?>" placeholder="taper l'id compte" />
</div>
    <div class="form-group">
        <label>Username :</label>
        <input type="text" name="username" class="form-control" value="<?php echo $idn;?>" placeholder="taper username" />
</div>
<div class="form-group">
        <label>mot de passe :</label>
        <input type="text" name="mtp" class="form-control" value="<?php echo $idp;?>" placeholder="taper le mtp" />
</div>  
<div class="form-group">
        <label> Type compte:</label>
        <select name="co" class="form-control" >
            <option value="0">Enseignant</option>
            <option value="1">Chef de filiere</option>
            <option value="2">Admin</option>
        </select>
</div>
<div class="form-group">
        <label>ID :</label>
        <input type="number" name="id" class="form-control" value="<?php echo $ida;?>"  />
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
   



    <footer><b>developpers </b>Mohammed M'barki and Omar BERRAHOU</footer>
</body>
</html>