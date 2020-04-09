<?php  session_start();
include_once('lib/header.php');
// session_start();
if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
    header("Location: dashboard.php");
}



?>

<h1>Register</h1>
   Welcome, please register here
     <form action="processregister.php" method="post">
    
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
     <label>First Name</label><br>
     <input 
     <?php
     if(isset($_SESSION['firstname'])){
        echo "value= " . $_SESSION['firstname'];
     }
        ?>
     type="text" name="firstname"   placeholder = "First Name"  >
     </p>
     <p>
     <label>Last Name</label><br>
     <input 
     <?php
     if(isset($_SESSION['lastname'])){
        echo "value= " . $_SESSION['lastname'];
     }
        ?>
     type="text" name="lastname" placeholder = "Last Name"  >
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
     <label >Gender</label><br>
     <select name="gender" >  
     
     <option value=""> select one</option>
     <option 
     <?php
     if(isset($_SESSION['gender']) && $_SESSION['gender'] =='Female'){
        echo  "Selected";
     }
        ?>
     >Female</option>
     <option
     <?php
     if(isset($_SESSION['gender']) && $_SESSION['gender'] =='Male'){
        echo  "Selected";
     }
        ?>
     >Male</option>
     </select>
     </p>
     
     <p>
     <label >Designation</label><br>
    <select name="designation" >
    <option value=""> select one</option>
    <option 
    <?php
     if(isset($_SESSION['designation']) && $_SESSION['designation'] =='Medical Team (MT)'){
        echo  "Selected";
     }
        ?>
    >Medical Team (MT) </option>
    <option 
    <?php
     if(isset($_SESSION['designation']) && $_SESSION['designation'] =='Patients'){
        echo  "Selected";
     }
        ?>
    >Patients</option>
    <option 
    <?php
     if(isset($_SESSION['designation']) && $_SESSION['designation'] =='Super Admin'){
        echo  "Selected";
     }
        ?>
    >Super Admin</option>
    </select>
     </p>
     <p>
     <label >Department</label><br>
     <input 
     <?php
     if(isset($_SESSION['department'])){
        echo "value= " . $_SESSION['department'];
     }
        ?>
     type="text" name = "department" placeholder="Department" >
     </p>
     
     <p>
     <button type="submit">Register</button>
     </p>
     </form>
  
  
  
     <?php
include_once('lib/footer.php');

?>