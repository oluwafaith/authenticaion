<?php session_start();
require_once('functions/alert.php');

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    
    set_alert('error', $session_error);
    header("Location:paybill.php");
}else{
    $customer_email = $_POST['email'];
    $amount = 3000;

}
