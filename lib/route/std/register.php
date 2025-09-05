<?php
include_once("../../functions/userFunction.php");
$result = stdRegistration($_POST['stdName'],$_POST['stdEmail'],$_POST['stdNic'],$_POST['stdTel'],$_POST['stdDob'],$_POST['courseSelect']);
echo($result);



?>

