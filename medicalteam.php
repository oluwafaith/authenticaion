<?php session_start();

include_once('lib/header.php'); 

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
}

echo "Time of login " . date("d M Y h:i:sa");
?>

<h3>Medical team Dashboard</h3>
    LoggedIn User ID: <?php echo $_SESSION['loggedin'] ?>
    Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>), and your ID is <?php echo $_SESSION['loggedin'] ?>


    <?php include_once('lib/footer.php'); ?>