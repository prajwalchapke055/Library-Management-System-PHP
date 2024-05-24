<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}


require("Files/navbar.php");
require("Files/dbconnect.php");
error_reporting(0);

$id = base64_decode($_GET['abc']);  
$mail = base64_decode($_GET['a']);
echo $id;
echo "<br>";
echo $mail;


$new="select * from issuebook where i_id=$id and user_mail='$mail'";
$re=mysqli_query($conn,$new);
while($row=mysqli_fetch_row($re))
{
    $isbn=$row[1];
    
}

$sql="select * from addbook where b_isbn='$isbn'";
$result=mysqli_query($conn,$sql);
// $data=mysqli_num_rows()
while($r1=mysqli_fetch_row($result)){
    $bname=$r1[4];//Getting bookname for mail
    $number=$r1[6];
    $number++;
    echo "<br>".$number;
    $upgrade="update addbook set b_no_of_copy=$number where b_isbn='$isbn'";
    $exe=mysqli_query($conn,$upgrade);
    if($exe){
        echo "<br>";
        // echo "Upgrade sucessfully";


    }
    else{
        // echo "Upgrade failde";
    }
}
$today=date("Y-m-d");
$to_email = $mail;
$subject = "Return Book";
$body = "Book Return Success ! \n Book Name :- $bname \n Book Return Date :- $today \n User :- $mail";
$headers = "From: asd";

if (mail($to_email, $subject, $body, $headers)) {
    // echo "Email successfully sent to hhh $to_email....";
} else {
    echo "Email sending failed...";
}



$sql1="delete from issuebook where i_id=$id and user_mail='$mail'";
$execute=mysqli_query($conn,$sql1);
if($execute){
    echo "<script>
           
    alert('Book Return Sucessfully');
    window.location.replace('http://localhost/LMS/return_book.php');
    </script>";
}
else{
    echo "<script>
           
    alert('Book Return Failed');
    window.location.replace('http://localhost/LMS/return_book.php');
    </script>";
}




?>

