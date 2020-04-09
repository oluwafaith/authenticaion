
<?php

include_once('lib/header.php');

?>

Welcome to SNG hospital
<br>

<?php
$cars = ["volvo", "toyota", "bmw"];
$arrlength = count($cars);
for($i = 0; $i < $arrlength; $i++){
    echo $cars[$i];
    echo"<br>";
}
?>


<?php

include_once('lib/footer.php');

?>
