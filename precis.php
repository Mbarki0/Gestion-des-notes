
<!DOCTYPE html>
<html lang="en">
<head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Page d'enseiganant</title>
                <link rel="stylesheet" href="precis.css">
</head>
<body onload="coloring();">  
    <?php
    include("connectDb.php");
    connectproblem($connexion);
   /* $count_req = "SELECT  DISTINCT  count(etudiant.Apogée)
    FROM etudiant
      where etudiant.id_filiere = 1 ";
        
    $resultat = mysqli_query($connexion ,$count_req);
    if($resultat) {
    $ligne = mysqli_fetch_assoc($resultat);
    $count = $ligne['count(etudiant.Apogée)'];
    }*/
    
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
                    session_start();
                    echo $_SESSION['nom'];
                    ?>
                    </b>
                <p>
         <fieldset>
            <legend>
        <image src="info.png" >
        Informations sur le module</legend>
            <form method="post" >
            
             
        <section>

                
        <?php
                 $idens =$_SESSION['id_ens'];
                 $resultatModule = mysqli_query($connexion ,"SELECT module.id_module , module.nom_module ,module.Semester , chef_module.nom , chef_module.prenom 
                 FROM module 
                 INNER join 
                 chef_module ON chef_module.id_chef_module = module.id_chef_module  where chef_module.id_chef_module ='".$idens."' and lisible_prof = 1 and id_module= '".$_SESSION['finalChoice']."';");
                 if($resultatModule)
                  {
                      
                     while($ligne = mysqli_fetch_object($resultatModule)) 
                     {
                       
                        echo '
                        <style>
                        div
                        {
                         height :160px;width:80%;
                         margin-left:20px;
                         color:black;
                         padding:10PX;
                        }
                        </style>
                        <div> <b>Id module </b>: '.  $ligne->id_module.'<br><b>Nom de module</b> : '.$ligne->nom_module.
                        '<br><b> Nom de chef de filiére </b>: '. $ligne->prenom.' '. $ligne->nom.
                        '<br> <b>Semester : </b>'.$ligne->Semester.
                        
                        
                        '</div>';
                        $idmodule = $ligne->id_module;
                        $nomModule=$ligne->nom_module;
                        
                    }
                        }
                
                        ?>
                        <?php

        $r_date = "SELECT delais as date from module where id_module ='".$idmodule."'";
        $resultat_date = mysqli_query($connexion ,$r_date);
        if($resultat_date) {
            while($ligne = mysqli_fetch_object($resultat_date)) {
                $date2=$ligne->date;
                $date1=date("Y-m-d");
                $now = time(); 
                $chef_filiere = strtotime($date2);
                $datediff = $chef_filiere -$now ;
                
            echo '
                <button id="rest" name="rest" VALUE="'.round($datediff / (60 * 60 * 24)).'" > il vous reste '. round($datediff / (60 * 60 * 24)).' joures </button>';
            echo '
                <input type="text"  id="date" name="rest" VALUE="Le derniere delais c\'est  : '.$date2.'"disabled>';
        }
    }
                ?>
                <script>
                    
                    function coloring()
                    {
                    var date= document.getElementById("rest");
                    var tabl= document.getElementById("tbl").getElementsByTagName('input');;
                   
                        if(parseInt(date.value) < 0)
                        {
                        
                        alert('vous ne pouvez plus faire des modification \n contacter l\'admin ');
                        date.style.backgroundColor = "red";
                    var elems = document.getElementsByTagName('input');
var len = elems.length;

for (var i = 3; i < len; i++) {
    elems[i].disabled = true;
}
                   }
                   }
                    </script>
                    </fieldset> 
                    <div id="tbl">
                    <table border =0 cellspacing ='0' cellpadding = '10' >
                
     <?php
     echo"
     <style>
     table
{
  background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 1500px;
  
}	

th {
	background-color: #264653;
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
     </style>";
        connectproblem($connexion);
        $_SESSION['req']=$req = "SELECT  DISTINCT  etudiant.Apogée
        ,etudiant.Nom,etudiant.Prenom
                FROM etudiant,module
                  where etudiant.id_filiere = 1 
                  group by Apogée";
            
        $resultat = mysqli_query($connexion ,$req);
        if($resultat) {
            echo '<th>Apogée</th>
            <th>nom  du module</th>
            <th>Nom </th>
            <th>Prénom</th>
            <th>Note</th>
            <th>Absence</th>
            ';
            $i =1;
        while($ligne = mysqli_fetch_object($resultat)) {
        echo   
        '<tr align="center" style=" border-top :1px solid rgb(161, 161, 161);">
        <td><input type ="text" name="ap'.$i.'"value="'.$ligne->Apogée.'" placeholder="'.$ligne->Apogée.'" readonly required></td>
        <td><input type ="text" name="nm'.$i.'"value="'. $nomModule.'"readonly required></td>
        <td><input type ="text" name="nom'.$i.'"value="'.$ligne->Nom.'"readonly required></td>
        <td><input type ="text" name="pnom'.$i.'"value="'.$ligne->Prenom.'"readonly required></td>
        <td><input type="text" name="note'.$i.'"  placeholder="Entrer la note"  class="tbl" required value="0"></td>
          <td>  <select name="absence'.$i.'"required >
            <option value="present">Present</option>
            <option value="abj">Absence justifier</option>
            <option value="abnj">Absence non justifier</option>
            </td>
            </select>
        </tr>';
        $i++;
            }
        }
        else { echo "Erreur dans l'exécution de la requête. ". mysqli_error($connexion); }   
        ?>
        </table>
    

                <section>     
                 
                <input type="button" id="Retour" name="retour" VALUE="Retour">
                <input type="submit" id="Retour" name="Envoyer" VALUE="Envoyer" style="right:400px ;">
            </form>
            </div>
        <?php
         ob_start();
        if(isset($_POST['Envoyer']))
        {
                    $error = '';
                    $nom_module='';
                    $Apogée='';
                    $Nom='';
                    $Prenom='';
                    $note='';
                    $absence = '';
                    function clean_text($string)
                    {
                    $string = trim($string);
                    $string = stripslashes($string);
                    $string = htmlspecialchars($string);
                    return $string;
                    }
                    $j=1;
                    
                    $file_open = fopen($idmodule."_1.csv", "w");
                    $re = mysqli_query($connexion ,"SELECT * from etudiant where id_filiere = 1");
                     while($ligne = mysqli_fetch_object($re)) 
                                
                    {
                        if (isset($_POST["nm".$j]))
                            {$nom_module= $_POST["nm".$j];}
                        if (isset($_POST["ap".$j]))
                            {$Apogée = $_POST["ap".$j];}
                        if (isset($_POST["nom".$j]))    
                            {$Nom = $_POST["nom".$j];}
                        if (isset($_POST["pnom".$j]))               
                        { $Prenom =$_POST["pnom".$j];}
                        if (isset($_POST["note".$j]))  
                            {$note = $_POST["note".$j];}
                        if (isset($_POST["absence".$j]))  
                            { $absence = $_POST["absence".$j];}

                            $file_open = fopen($idmodule."_1.csv", "a");
                            $form_data = array(
                            'nom_module'  => $nom_module,
                            'Apogée'  => $Apogée,
                            'Nom'  => $Nom,
                            'Prenom' => $Prenom,
                            'note' => $note,
                            'absence' => $absence
                            );
                            fputcsv($file_open, $form_data);
                            if (isset($_POST["note".$j])) 
                            {
                                    $req = "SELECT Apogée FROM note";
                                    $req = mysqli_query($connexion ,$req);
                                    $q="SELECT COUNT(1) FROM note WHERE Apogée='".$Apogée."' and id_module='".$idmodule."'";
                                    $r = mysqli_query($connexion ,$q);
                                    $row=mysqli_fetch_row($r);
                                    //$ligne = mysqli_fetch_object($resultat);
                                    if($row[0] > 0) {

                                        $req2= "UPDATE note
                                        SET note ='".$note."', Absence= '".$absence."'where id_module ='".$idmodule."' and Apogée='".$Apogée."';";
                                        $req2 = mysqli_query($connexion ,$req2);
                                        //echo $idmodule." ".$Apogée;

                                    } else 
                                    {
                                        $req = "INSERT INTO note (note,Absence,id_module,Apogée)
                                        VALUES ('".$note."','".$absence."','".$idmodule."','".$Apogée."');";
                                        $req = mysqli_query($connexion ,$req);
                                    }
                                    $req2= "UPDATE module
                                    SET  lisible_prof=0
                                    where id_module ='".$idmodule."'";
                                    $req2 = mysqli_query($connexion ,$req2);
                                    echo("<script>alert('Les information sont envoyées avec success \n Si vous voullez modifier veuillez contacter le chef de fillière');</script>");
                                    
                            
                            }
                            $j++;
                }
        }
    
        if (isset($_POST['retour']))
        {
           header('Location:prof_last.php');
           
        }
        if(!isset($_SESSION['nom']))
        {
            header('location:erreur.html');
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
                    
                    echo("<script>alert('vous n\'etes pas un chef de module');</script>");
                    echo("<script>document.getElementById('chef').disabled;</script>");
                    
                        
                }
            }  
            ob_end_flush();  
        ?>
     <div>
</body>
</html>