<?php   
        $connexion = mysqli_connect("localhost","root","");
        mysqli_select_db($connexion, "projet");
        function connectproblem($connexion)
        {
        if( !$connexion) { echo "Desolé, connexion à localhost impossible"; exit; }
        if( !mysqli_select_db($connexion,'projet')) { echo "Désolé, accès à la base projet
        impossible"; exit; }
        }
        function close($connexion)
        {
            mysqli_close($connexion);
        }
        ?>