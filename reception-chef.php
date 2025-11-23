<?php
include 'erreur403.php';
include("connectDb.php");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef de fillière</title>
    <link rel="stylesheet" href="chef_account.css">
</head>
<body>
   <header>
        <img src="LOGO.png" >
            <a href="chef_de_fillière.php"><input type="button" id="prof" name="prof" VALUE="Envoie des maquettes"></a>
            <a href="reception-chef.php"><input type="button" id="reception" name="reception" VALUE="Reception des réponses"></a>
            <a href="deconnection.php" ><input type="button" id="deconnection" name="deconnection" VALUE="Déconnection" ></a>
   </header> 
    
   <p>Bonjour Mr. <b>
        <?php
        echo $_SESSION['nom'];
        ?></b>
    <p>
   <fieldset>
            <legend><image src="form.png" >Maquettes disponible</legend>
            <form method="post">
                 <section>
                            <?php
                            ob_start();//ob:output buffering :stocker "dans la ram"  tout mes output sauf les "header" pour envoyer tout les données en meme temps 
                            //source :https://www.php.net/manual/fr/function.ob-start.php
                            $reception = mysqli_query($connexion ,"SELECT  note.note , module.nom_module ,module.id_module
                            FROM note 
                            INNER join module on note.id_module = module.id_module   GROUP BY module.id_module");
                            $matiere = mysqli_query($connexion ,"SELECT  note.note , module.nom_module ,module.id_module
                            FROM note 
                            INNER join module on note.id_module = module.id_module   GROUP BY module.id_module");
                            if($reception)
                            {
                                $i=1;
                                while($ligne = mysqli_fetch_object($reception)) 
                                {
                                echo '
                                        <style>
                                        button div
                                        {
                                            height :120px;width:300px;
                                            background-color : #166dc5;
                                            margin:10PX;
                                            color:white;
                                            padding:10PX;
                                            text-decoration: none; 
                                            border-radius:5px;
                                            font-size:15px;
                                        }
                                        button:hover
                                        {
                                            transform: scale(1.1);
                                            
                                        }
                                                        #prof
                                        {
                                            margin-left: 40%;
                                        }
                                        header img
                                        {
                                            height: 80PX;
                                            align-items: center;
                                            left: 0%;
                                            LEFT: 10PX;
                                            position: absolute;
                                        }
                                        </style>
                                            <button name="choix_'.$i.'" style="float:left;text-align:center;margin-left :20PX; background-color: transparent;border:none; "; onclick="" >
                                            <div>'.$ligne->nom_module.'</div>
                                            </button>
                                            </a>
                                            ';
                                        $_SESSION['choix_'.$i]=$ligne->id_module;
                                        $i++;
                                
                                }
                                    for($i = 0 ; $i<50 ;$i++)
                                    {
                                   if(isset($_POST['choix_'.$i]))
                                    {
                                        $_SESSION['finalChoice']= $_SESSION['choix_'.$i] ;
                                        header("location:VoirNoteChef.php");
                                    }
                                    }
                            }
                            ob_end_flush();
                                ?>
                </section>       
            </form>
    </fieldset>

        <input type="button" id="Retour" name="Retour" VALUE="Retour">
   
</body>
</html>