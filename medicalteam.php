<?php 
//session_start();
include_once('lib/header.php');
require_once('functions/alert.php');
require_once('functions/user.php');

 

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
}

echo "Time of login " . date("d M Y h:i:sa");
?>

<h3>Medical team Dashboard</h3>
    LoggedIn User ID: <?php echo $_SESSION['loggedin'] ?>
    Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>),your department is (<?php echo $_SESSION['department'] ?>), and your ID is <?php echo $_SESSION['loggedin'] ?>



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

<p>appointments</p>

<!-- <p><?php  echo $_SESSION['dateOfAppointment'] ?> </p>
<p><?php echo $_SESSION['appointmentTime'] ?></p>
<p><?php echo $_SESSION['dateOfAppointment']?></p>
<p><?php echo $_SESSION['dateOfAppointment']?></p>
<p><?php echo $_SESSION['dateOfAppointment'] ?></p> -->





 


    <?php include_once('lib/footer.php'); ?>