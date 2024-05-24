<?php
// error_reporting(0);
require('Files\dbconnect.php');
$a=$_GET['abc'];
//echo $a;

$sql = "update user_profile set uestatus=1 where uemail='$a'";
$result = mysqli_query($conn, $sql);
if($result){
    // echo "done";
    header("location:user_login.php");  
}
else{
    echo "fail";
}

?>