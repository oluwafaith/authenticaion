

<p>
<a href="index.php">Home</a>
<?php

if(!isset($_SESSION['loggedin'])){ ?>

<a href="login.php">Login</a>|
<a href="register.php">Register</a>|
<a href="forgot.php">Forgot password</a> 

<?php }else{ ?>
    <a href="logout.php">Logout</a>
    <a href="reset.php">Reset password</a> 

<?php } ?>




</p>
  
</body>
</html>