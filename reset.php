<?php 
//session_start();
include_once('lib/header.php'); 

require_once('functions/alert.php');
require_once('functions/user.php');


if(is_user_LoggedIn() && !is_token_set()){
    $_SESSION["error"] = "You are not authorized to view this page";
    header("Location: login.php");
}
?>

<h3>Reset Password</h3>
<p>Reset password associated with your account: [email]</p>

<form action="processreset.php" method="post">
<p>
     <?php 
     print_alert();
    //  if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
    //      echo "<span style='color:red'>" .  $_SESSION['error'] . "</span>";
    //     //  session_unset();
    //      session_destroy();
    //  }
     ?>
</p>
<p>
<?php 
if(!is_user_loggedIn()){?>
     <input 
     <?php
     if(isset($_SESSION['token'])){
        echo "value= " . $_SESSION['token'];
     }else{
        echo "value= " . $_GET['token'];
     }
        ?>
     type="hidden" name="token"   >
     </p>
     
<input
<?php
if(is_token_set_in_session()){
    echo "value='" .$_SESSION['token'] . "'";
}else{
    echo "value='" .$_GET['token'] . "'";
}

?>


 type="hidden" name="token" value="<?php echo $_GET['token'] ?>">

<?php } ?>
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
     <label> Enter new Password</label><br>
     <input type="password" name="password" placeholder = "Password" > 
     </p>
     <p>
     <button type="submit">Reset Password</button>
     </p>
     
</form>


    Reset your password here
    <?php

include_once('lib/footer.php');

?>