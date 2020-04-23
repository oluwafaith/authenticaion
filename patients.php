<?php session_start();

include_once('lib/header.php'); 

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
}

echo "Time of login: " . date("d M Y h:i:sa");

?>

<h3>Patients Dashboard</h3>
    LoggedIn User ID: <?php echo $_SESSION['loggedin'] ?>
    Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>),your department is (<?php echo $_SESSION['department'] ?>),  and your ID is <?php echo $_SESSION['loggedin'] ?>
<p>

<?php echo $_SESSION['department'] ?>
</p>
<?php (getdate());
echo "<br><br>";

$mydate = getdate(date("U"));
?>

<p> Your Log in Time is:  <?php echo  $_SESSION['timein']?></p>

<p> Your Log in date is: <?php echo  $_SESSION['Date']?></p>

<h3>pay your bills here</h3>
<form action="paybill.php" method="post">
<p>
     <button type="submit">Pay bills</button>
     </p>
     </form>




     <h3>Book appointment</h3>

     <form action="processpatients.php" method="post">
    
   
     <p>
     <label>Date of appointment</label><br>
     <input 
     <?php
     if(isset($_SESSION['dateOfAppointment'])){
        echo "value= " . $_SESSION['dateOfAppointment'];
     }
        ?>
     type="text" name="dateOfAppointment"   placeholder = "date of appointment"  >
     </p>
     <p>
     <label>time of appointment</label><br>
     <input 
     <?php
     if(isset($_SESSION['appointmentTime'])){
        echo "value= " . $_SESSION['appointmentTime'];
     }
        ?>
     type="text" name="appointmentTime" placeholder = " appointment time"  >
     </p>
     
     <p>
     <label> Nature of appointment</label><br>
     <input 
     <?php
     if(isset($_SESSION['appointmentNature'])){
        echo "value= " . $_SESSION['appointmentNature'];
     }
        ?>
     type="text" name="appointmentNature" placeholder = " appointment nature"  >
     </p>
     
     <p>
     <label> initial complaint</label><br>
     <input 
     <?php
     if(isset($_SESSION['initialComplaint'])){
        echo "value= " . $_SESSION['initialComplaint'];
     }
        ?>
     type="text" name="initialComplaint" placeholder = " initial complaint"  >
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
     <button type="submit">book appointment</button>
     </p>
     </form>
  




    <?php include_once('lib/footer.php'); ?>