<?php session_start();
//collecting the data
$errorCount = 0;

if(!$_SESSION['loggedin']){ 
    $token = $_POST['token']!="" ? $_POST['token'] : $errorCount++;
    $_SESSION['token'] = $token;
}



$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] !="" ? $_POST['password'] : $errorCount++;



$_SESSION['email'] = $email;

if($errorCount > 0){
    $session_error = "You have " . $errorCount . " error"; 

    if($errorCount > 1) {
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;
    
    header("Location: reset.php");
}else{
    $allUserTokens= scandir("db/tokens");

    $countAllUsers = count($allUserTokens);

    for($counter = 0; $counter < $countAllUserTokens; $counter++){
        $currentTokenFile = $allUserTokens[$counter];

        if($currenTokenFile == $email . ".json"){
            $tokenContent = file_get_contents("db/tokens/" .$currentTokenFile);

            $tokenObject = json_decode($tokenContent);
            $tokenFromDb = $tokenObject->token;


if($_SESSION['loggedin']){
    $checkToken = true;
}else{
    $checkToken = $tokenFromDb == $token;
}


            if($checkToken){
             
                $allUsers = scandir("db/users/");
                $countAllUsers = count($allUsers);
        
                for($counter = 0; $counter < $countAllUsers; $counter++){
                    $currentUser = $allUsers[$counter];
        
                    if($currentUser == $email . ".json"){
                        //check password
                        $userString = file_get_contents("db/users/" .$currentUser);
                        $userObject = json_decode($userString);

                     $userObject->password = password_hash($password, PASSWORD_DEFAULT);
                            unlink("db/users/" .$currentUser);

                       file_put_contents("db/users/". $email .  ".json",json_encode($userObject));
                       $_SESSION["message"] = "Password reset successful, you can now login " . $firstname;


                       $subject = "Password Reset successful";
                       $message = "your account on snh has just been updated, your password has changed , if you did not initiat the password change, please visit snh.org and reset your password immediately";
                       $headers = "From: no-reply@snh.org" . "\r\n" .
                       "CC: seyi@snh.org";
               
               
                      $try = mail($to,$subject,$message,$headers);


                       header("Location: login.php");
                        
                       die();

                     }
                    }

            }
        }
    }
    $_SESSION["error"] = "Password reset failed, token/email invalid or expired";
    header("Location: login.php");
}