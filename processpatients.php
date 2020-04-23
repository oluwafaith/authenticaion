<?php 

require_once('functions/user.php');

$errorCount = 0;

$dateOfAppointment = $_POST['dateOfAppointment'] !="" ? $_POST['dateOfAppointment'] : $errorCount++ ;
$appointmentTime = $_POST['appointmentTime']!="" ? $_POST['appointmentTime'] : $errorCount++;
$appointmentNature = $_POST['appointmentNature']!="" ? $_POST['appointmentNature'] : $errorCount++;
$initialComplaint = $_POST['initialComplaint']!="" ? $_POST['initialComplaint'] : $errorCount++;
$department = $_POST['department']!="" ? $_POST['department'] : $errorCount++;


$_SESSION['dateOfAppointment'] = $dateOfAppointment;
$_SESSION['appointmentTime'] = $appointmentTime;
$_SESSION['appointmentNature'] = $appointmentNature;
$_SESSION['initialComplaint'] = $initialComplaint;
$_SESSION['department'] = $department;




    if($errorCount > 0){
        $session_error = "You have " . $errorCount . " error"; 
    
        if($errorCount > 1) {
            $session_error .= "s";
        }
    
        $session_error .= " in your form submission";
        $_SESSION["error"] = $session_error;
        
        header("Location: patients.php");
        die();


    }
     



else{


$newUserId = ($countAllUsers -1);



    $userObject = [
        'id' => $newUserId,
'dateOfAppointment' => $dateOfAppointment,
'appointmentTime' => $appointmentTime,
'appointmentNature' => $appointmentNature,
'initialComplaint' => $initialComplaint,
'department' => $department
    ];


   // $userExists = find_user($email);
  
   
    save_user($userObject);

$_SESSION["message"] = "Registration successful, you can now login " . $firstname;
header("Location: patients.php");

}




?>