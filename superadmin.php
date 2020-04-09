<?php session_start();

include_once('lib/header.php'); 

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
}

echo "Time of login: " . date("d M Y h:i:sa");
?>

<h3>You are logged in as an Admin</h3>
    LoggedIn User ID: <?php echo $_SESSION['loggedin'] ?>
    Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>), and your ID is <?php echo $_SESSION['loggedin'] ?>


    <p>
    Your department is (<?php echo $_SESSION['department'] ?>),
<?php echo $_SESSION['department'] ?>
</p>
<?php (getdate());
echo "<br><br>";

$mydate = getdate(date("U"));
?>

<p> Your Log in Time is:  <?php echo  $_SESSION['timein']?></p>

<p> Your Log in date is: <?php echo  $_SESSION['Date']?></p>

<h4>Create New Users<h4>

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
     <button type="submit">CREATE</button>
     </p>
     </form>
  
  

    <?php include_once('lib/footer.php'); ?>