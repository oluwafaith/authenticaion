<?php session_start();

include_once('lib/header.php'); 

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
}



?>

     <h3>Book appointment</h3>

     <form action="processpatients.php" method="post">
    
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
     type="text" name = "department" placeholder="Department">
     </p>
     
     <p>
     <button type="submit">book appointment</button>
     </p>
     </form>
  




    <?php include_once('lib/footer.php'); ?>