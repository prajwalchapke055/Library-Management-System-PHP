<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}

require("Files/navbar.php");
require("Files/dbconnect.php");
error_reporting(0);

$gid = base64_decode($_GET['abc']);
$mail = base64_decode($_GET['a']);


$sql1 = "select * from addbook where b_id='$gid'";
$result = mysqli_query($conn, $sql1);
while ($row = mysqli_fetch_row($result)) {

    $isbn = $row[5];
    $BookName = $row[4];
    $totalbookno=$row[6];//Getting total book

}


// getting user maximum entry
$sql1 = " SELECT user_mail FROM issuebook where user_mail='$mail'";
$result = mysqli_query($conn, $sql1);
$check= mysqli_num_rows($result);


// Issue book



    $sql1 = "select * from settings";
    $result = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_row($result)) {
        $datee=  $row[3];//max book days
        $status = "Issued";
    $maxbook = $row[2];




         $today = date("Y-m-d");

        $returndate = date("Y-m-d",strtotime("+".$datee."day"));



        // getting book detail from issuebook
        $existSql = "select * from issuebook where book_isbn='$isbn' and user_mail='$mail'  ";
        $result = mysqli_query($conn, $existSql);
        $numExistsRow = mysqli_num_rows($result);
       



        // check book available or not
    if ($totalbookno > 0  ) {
        //check maximum book issue limit
        if ($check < $maxbook) {
            // Check Book already taken or not
            if($numExistsRow>0) 
            {
                echo "<script>
           
            alert('User Alerady Isuued A Book...:(');
            window.location.replace('http://localhost/LMS/issue_book.php');
            </script>";
            exit;
            } 
            else {


                $today=date("Y-m-d");
                $sql = "insert into issuebook(book_isbn,user_mail,return_date,book_issue_status,issue_date)values('$isbn','$mail',' $returndate','$status','$today')";
                $result = mysqli_query($conn, $sql);
                if ($result) {

                    $a = $totalbookno - 1;
                    $sql = "update addbook set b_no_of_copy=$a where  b_id='$gid'";
                    $result = mysqli_query($conn, $sql);


                    echo "<script>
           
                alert('Book Issued Sucessfully...:)');
                window.location.replace('http://localhost/LMS/issue_book.php');
                </script>";

                                


 
             
                $to_email = $mail;
                $subject = "Book Issued";
                $body = "Book Name :- '$BookName'\n Issue Date :- '$today'\n Return Date:- '$returndate'\n User :- '$mail' ";
                $headers = "From: asd";
                
                if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email....";
                } else {
                    echo "Email sending failed...";
                }







                } else {

                    echo "<script>alert('Failed')</script>";

                }
            }
        }else{
            echo "<script>
           
            alert('Maximum Book Limit Reached');
            window.location.replace('http://localhost/LMS/issue_book.php');
            </script>";
            exit;
        }
    }
    else{
        echo "<script>
           
        alert('Book Is Not Available');
        window.location.replace('http://localhost/LMS/issue_book.php');
        </script>";
        exit;
    }
    
        
 }




 ?>