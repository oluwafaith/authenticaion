<?php 
//session_start();
require_once('functions/user.php');
//collecting the data
$errorCount = 0;

$firstname = $_POST['firstname'] !="" ? $_POST['firstname'] : $errorCount++ ;
$lastname = $_POST['lastname']!="" ? $_POST['lastname'] : $errorCount++;
$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] !="" ? $_POST['password'] : $errorCount++;
$gender = $_POST['gender'] !="" ? $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] !="" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department']!="" ? $_POST['department'] : $errorCount++;


$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;




    if($errorCount > 0){
        $session_error = "You have " . $errorCount . " error"; 
    
        if($errorCount > 1) {
            $session_error .= "s";
        }
    
        $session_error .= " in your form submission";
        $_SESSION["error"] = $session_error;
        
        header("Location: register.php");
        die();


    }
      // name not to have numbers
       
     if (!preg_match("/^[a-zA-Z]+$/", $firstname) || !preg_match("/^[a-zA-Z]+$/", $lastname)) {
    $_SESSION['error'] = "Name should not have numbers";
    header("location:register.php");
    die();
}

//name should not be less than two
if (strlen($firstname) < 2 || strlen($lastname) < 2) {
    $_SESSION['error'] = "Name should not not be less than 2";
    header("location:register.php");
    die();
}

//validating email

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Your email is not valid";
          header("location:register.php");
            die();
}

//validating email length
if (strlen($email) < 5) {
    $_SESSION['error'] = "Email must not be less than 5";
    header("location:register.php");
    die();

    }
else{
    //count all users
// $allUsers = scandir("db/users");

// $countAllUsers = count($allUsers);

$newUserId = ($countAllUsers -1);



    $userObject = [
        'id' => $newUserId,
'firstname' => $firstname,
'lastname' => $lastname,
'email' => $email,
'password' =>password_hash($password, PASSWORD_DEFAULT),
'gender' => $gender,
'designation' => $designation,
'department' => $department,
'dateOfegistery' => $date
    ];


    $userExists = find_user($email);
    // for($counter = 0; $counter < $countAllUsers; $counter++){
    //     $currentUser = $allUsers[$counter];
        // if($currentUser == $email . ".json"){
        //     if(userExists){
        //     $_SESSION["error"] = "RegistrationFailed, User already exists";
        //     header("Location: register.php");
        //     die();
        // }
    
    //save in database3
   
    save_user($userObject);
// file_put_contents("db/users/". $email .  ".json",json_encode($userObject));
$_SESSION["message"] = "Registration successful, you can now login " . $firstname;
header("Location: login.php");

}



// print_r($_POST);
?>