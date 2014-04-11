
<form action=login.php method=post>
   
    
                       
     <?php
     session_start();
    // unset($_SESSION['username']);
     
     if(isset($_POST["abmelden"])){
         session_destroy();
     
     header("Location: login.php");
     //exit
         
     }
   
    
?>   
                   
</form>                      
    
