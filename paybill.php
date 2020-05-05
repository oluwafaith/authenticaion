<?php session_start();

include_once('lib/header.php'); 
?>



<h3> You can pay your bills here</h3>

<form action="processpayment.php" method="post">
    
   
     <p>
     <label>First Name</label><br>
     <input 
     <?php
     if(isset($_SESSION['firstname'])){
        echo "value= " . $_SESSION['firstname'];
     }
        ?>
     type="text" name="firstname"   placeholder = "First Name"  >
     </p>
     <p>
     <label>Last Name</label><br>
     <input 
     <?php
     if(isset($_SESSION['lastname'])){
        echo "value= " . $_SESSION['lastname'];
     }
        ?>
     type="text" name="lastname" placeholder = "Last Name"  >
     </p>
     <p>
     <label>Email</label><br>
     <input 
     <?php
     if(isset($_SESSION['email'])){
        echo "value= " . $_SESSION['email'];
     }
        ?>
     type="text" name="email" placeholder = "Email" >
     </p>
     
     <p>
            <label>Amount (NGN)</label><br>
            <input value="3000" type="number" name="amount" readonly>
        </p>
     <p>
     <label>Transaction type</label><br>
     <input type="text" name="transaction" placeholder = "transaction type" > 
     </p>
     <p>
     <label>Transaction id</label><br>
     <input type="text" name="transactionid" placeholder = "transaction id" > 
     </p>
     <p>
            <label>Payment Option</label><br>
            <select name="payment_option">
                <option value="">Select one</option>
                <option <?php

                        if (isset($_SESSION['payment_option']) && $_SESSION['payment_option'] == "card") {
                            echo "selected";
                        }

                        ?> value="card">Card Payment</option>
                <option <?php

                        if (isset($_SESSION['payment_option']) && $_SESSION['payment_option'] == 'account') {
                            echo "selected";
                        }
                        ?> value="account">Account Payment</option>

            </select>
        </p>
     
     
     <p>
     <button type="submit">Register</button>
     </p>
     </form>









<?php include_once('lib/footer.php'); ?>