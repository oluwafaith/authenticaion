<?php session_start();
$errorCount = 0;

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
    
    header("Location: login.php");
}
    else{
        $allUsers = scandir("db/users/");
        $countAllUsers = count($allUsers);

        for($counter = 0; $counter < $countAllUsers; $counter++){
            $currentUser = $allUsers[$counter];

            if($currentUser == $email . ".json"){
                //check password
                $userString = file_get_contents("db/users/" .$currentUser);
                $userObject = json_decode($userString);
                $passwordFromDb = $userObject->password;

                $passwordFromUser = password_verify($password, $passwordFromDb);

                

                if($passwordFromDb == $passwordFromUser){
                    $_SESSION['loggedin'] = $userObject->id;
                    $_SESSION['fullname'] = $userObject->firstname . " " . $userObject-> $lastname ;
                    $_SESSION['role'] = $userObject->designation;
                    $_SESSION['department'] = $userObject->department;
                    

                    //date and time
                    (getdate());

                    $mydate = getdate(date("U"));
        
                    $_SESSION['timein'] = "$mydate[hours]:$mydate[minutes]";
                    $_SESSION['Date'] = "$mydate[weekday], $mydate[month] $mydate[mday] $mydate[year]";
                    $dateTime = $_SESSION['Date'] ." ". $_SESSION['timein'];
        
                    file_put_contents("db/timein/".  $_SESSION['Email'] . ".json", json_encode($dateTime));


                    if($userObject->designation == 'Patients'){
                        header("Location: patients.php"); 
                    }else if($userObject->designation == 'Medical Team (MT)'){
                        header("Location: medicalteam.php");
                    }
                    else{
                        header("Location: superadmin.php");
                    }

                   
                    die();
                }
               
            }
        }
        $_SESSION["error"] = "Invalid email or password";
        header("Location: login.php");
        die();
   
}


