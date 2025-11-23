<?php
 
   $db = mysqli_connect("localhost", "root", "" );
  mysqli_select_db($db, "projet");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['mtp']); 
      
      $sql = "SELECT id FROM compte WHERE username = '$myusername' and mtp = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: prof.php");
      }else {
        echo "Your Login Name or Password is invalid";
      }
   }
?>

