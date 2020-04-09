<?php session_start();

include_once('lib/header.php'); 

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
}

?>

<h3>Dashboard</h3>
    LoggedIn User ID: <?php echo $_SESSION['loggedin'] ?>
    Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>),your department is (<?php echo $_SESSION['department'] ?>), and your ID is <?php echo $_SESSION['loggedin'] ?>


    <?php include_once('lib/footer.php'); ?>