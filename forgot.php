<?php session_start();
include_once('lib/header.php');  ?>

<h3>Forgot Password</h3>
<p>Provide the email associated with your account</p>

<form action="processforgot.php" method="post">
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
     <button type="submit">Send Reset Code</button>
     </p>
     
</form>


    Reset your password here
    <?php

include_once('lib/footer.php');

?>