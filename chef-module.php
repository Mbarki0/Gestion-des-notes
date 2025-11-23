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
    include("erreur403.php");
    ?>
        <header>
        <img src="LOGO.png" >
                <a href="prof_last.php"><input type="button" id="prof" name="prof" VALUE="Espace du professeur"></a>
                <a href="chef-module.php"><input type="button" id="chef" name="chef" VALUE="Espace chef de module"></a>
                
                <a href="deconnection.php" >
                <input type="button" id="deconnection" name="deconnection" VALUE="Déconnection">
                    </a>
        </header> 
                <p>&nbsp; Bonjour Mr.<b>
                    <?php
                    echo $_SESSION['nom'];
                    ?></b>
                <p>
         <fieldset>
            <legend>
        <image src="form.png" >
        Maquettes disponible</legend>
            <form method="post">
        <section>
    <?php
            ob_start();
                $idens =$_SESSION['id_ens'];
                $resultatModule = mysqli_query($connexion ,"select * from module where module.id_ens ='".$idens."' and module.lisible_prof = 1 and module.id_module NOT IN
                (
                SELECT module.id_module FROM module
                inner join matiere
                on module.id_module = matiere.id_module
                where module.id_ens ='".$idens."' and module.lisible_prof = 1 )
                    ;");
                $resultatMatiere = mysqli_query($connexion ,"SELECT * FROM matiere
                inner join module on module.id_module = matiere.id_module
                where module.id_ens ='".$idens."'  ;");
                $i=1;
                    if (!(mysqli_num_rows($resultatModule)==0))
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
                            <div>'.$ligne->nom_module.'<br>id de ce module : '. $ligne->id_module.'</div>
                            </a>
                            ';
                            
                            $_SESSION['choix_'.$i]=$ligne->id_module;
                            $i++;
                            }
                        
                            if(isset($_POST['choix_1']))
                            {
                                $_SESSION['finalChoice']= $_SESSION['choix_1'] ;
                            header("location:precis.php");
                            }
                            if(isset($_POST['choix_2']))
                            {
                                $_SESSION['finalChoice']= $_SESSION['choix_2'] ;
                                header("Location:precis.php");
                            }
                            if(isset($_POST['choix_3']))
                            {
                                $_SESSION['finalChoice']= $_SESSION['choix_3'] ;
                                header("location:precis.php");
                            }
                    
                        }

                else 
                {
                            while($ligne = mysqli_fetch_object($resultatMatiere)) 
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
                            <div>'.$ligne->nom_matiere.'<br>id de cette matiere : '. $ligne->id_matiere.'</div>
                            </a>
                            ';
                            
                            $_SESSION['choix_'.$i]=$ligne->id_matiere;
                            $i++;
                            }
                        
                            if(isset($_POST['choix_1']))
                            {
                                $_SESSION['finalChoice']= $_SESSION['choix_1'] ;
                            header("location:sous_modules_chef.php");
                            }
                            if(isset($_POST['choix_2']))
                            {
                                $_SESSION['finalChoice']= $_SESSION['choix_2'] ;
                                header("Location:sous_modules_chef.php");
                            }
                            if(isset($_POST['choix_3']))
                            {
                                $_SESSION['finalChoice']= $_SESSION['choix_3'] ;
                                header("location:sous_modules_chef.php");
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