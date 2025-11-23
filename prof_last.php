<!DOCTYPE html>
<html lang="en">
<head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Page d'enseiganant</title>
                <link rel="stylesheet" href="prof_last.css">
</head>
<body>  
    <?php
    include("connectDb.php");
    
   
    
    ?>
    <form method="post">
        <header>
        <img src="LOGO.png" >
                <a href="prof_last.php"><input type="button" id="prof" name="prof" VALUE="Espace du professeur"></a>
                <button id="chef" name="chef" >Espace chef de module</button>
                
                <a href="deconnection.php" >
                <input type="button" id="deconnection" name="deconnection" VALUE="Déconnection">
                    </a>
        </header> 
                <p>&nbsp; Bonjour Mr.<b>
                    <?php
                    session_start();
                    echo $_SESSION['nom'];
                    ?></b>
                <p>
         <fieldset>
            <legend>
        <image src="form.png" >
        Maquettes disponible</legend>
            
        <section>
    <?php
                $idens =$_SESSION['id_ens'];
                $resultatModule = mysqli_query($connexion , "SELECT * FROM matiere
inner JOIN module ON module.id_module = matiere.id_module
where matiere.id_ens =".$idens." and module.lisible_prof = 1  ");//module.delais >=  NOW(); on peut l'ajouter si on veut que la maquette ne sera pas visible si la date limite est terminées
                $i=1;
                if($resultatModule)
                 {
                    while($ligne = mysqli_fetch_object($resultatModule)) 
                    {
                      
                       echo '
                       <style>
                       button div
                       {
                        height :120px;width:300px;
                        background-image: linear-gradient(#264653,#2A9D8F);
                        margin:0PX;
                        color:white;
                        padding:10PX;
                        text-decoration: none; 
                        border-radius:5px;
                       }
                       button:hover
                       {
                        transform: scale(1.1);
                        
                       }
                       </style>
                       <button name="choix_'.$i.'" style="float:left;text-align:center;margin-left :20PX; background-color: transparent;border:none; "; >
                       <div>'.$ligne->nom_matiere.'<br>id de la matiere : '. $ligne->id_matiere.'</div>
                       </a>
                       ';
                       
                       $_SESSION['choix_'.$i]=$ligne->id_module;
                       $i++;
                    }
                   
                       if(isset($_POST['choix_1']))
                    {
                        $_SESSION['finalChoice']= $_SESSION['choix_1'] ;
                        header("location: precis_ens.php");
                    }
                    if(isset($_POST['choix_2']))
                    {
                        $_SESSION['finalChoice']= $_SESSION['choix_2'] ;
                        header("location: precis_ens.php");
                    }
                    if(isset($_POST['choix_3']))
                    {
                        $_SESSION['finalChoice']= $_SESSION['choix_3'] ;
                        header("location: precis_ens.php");
                    }
                    }
                    if(isset($_POST['chef']))
                    {
                        $resultatModule = mysqli_query($connexion , "SELECT id_chef_module FROM chef_module where id_chef_module ='".$idens."';");
                        if($resultatModule)
                        {
                            while($ligne = mysqli_fetch_object($resultatModule)) 
                            {
                            echo("<script>alert('vous etes un chef de module');</script>");
                            
                            header("location:chef-module.php");
                            }
                            
                        }
                        else
                            { 
                                
                                echo("<script>document.getElementById('chef').disabled;</script>");
                                echo("<script>alert('vous n\'etes pas un chef de module');</script>");
                                
                                    
                            }
                        }
                            
                        



                   
                
                ?> 
                </section>       
            </form>
    </fieldset>

        <input type="button" id="Retour" name="Retour" VALUE="Retour">

        <?php
        if (isset($_POST['Retour']))
        {
            header('Location:'.$_SERVER['HTTP_REFERER']);
        }
        if(!isset($_SESSION['nom']))
        {
            header('location:erreur.html');
        } 

        ?>
    
    
</body>
</html>