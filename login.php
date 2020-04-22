<?php  session_start();
include_once('lib/header.php');
require_once('function/alert.php');

if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
    header("Location: dashboard.php");
}




?>
   <h3>Login</h3> 
   <?php
   message();
   ?>


    <form action="processlogin.php" method="post">
    
    <p>
     <?php
     
     if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
         echo "<span style='color:red'>" .  $_SESSION['error'] . "</span>";
        //  session_unset();
         session_destroy();
     }
     ?>
     </p>
    
     <p>
     <label>Email</label><br>
     <input 
     <?php
     if(isset($_SESSION['email'])){
        echo "value= " . $_SESSION['email'];
     }
        ?>
     type="text" name="email" placeholder = "Email" >
     </p>
     
     <p>
     <label>Password</label><br>
     <input type="password" name="password" placeholder = "Password" > 
     </p>
     
     <p>
     <button type="submit">Login</button>
     </p>
     </form>

<p>

<br>

<?php
     
     if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
         echo "<span style='color:green'>" .  $_SESSION['error'] . "</span>";
         session_destroy();
     }
     ?>
</p>

    <?php

include_once('lib/footer.php');

?>