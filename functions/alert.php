<?php session_start();

function error(){
    
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style='color:red'>" .  $_SESSION['error'] . "</span>";
       //  session_unset();
        session_destroy();
    }}


function message(){
    
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo "<span style='color:green'>" .  $_SESSION['message'] . "</span>";
       //  session_unset();
        session_destroy();
    }
}
}
?>