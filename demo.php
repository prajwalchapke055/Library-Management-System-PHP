<?php
require("Files/navbar.php");
require("Files/dbconnect.php");

$fine = 20;
// $date = date("Y-m-d",strtotime('-$a day'));

// // echo $date;
// echo "<br>";
// // echo $fine*$date;
// $date1=date_create("2023-02-10");

// $date_expire = '2014-08-06 00:00:00';    
// $date = new DateTime($date_expire);
// $now = new DateTime();

// echo $date->diff($now)->format("%d days, %h hours and %i minuts");



// // $diff = date_diff(strtotime($date2) - strtotime($date1)); 
// echo $diff->format("%R%a")*$fine;
// echo $diff->format("%R%a");
// if($date1>$date2){
//    echo "Greater";
// }
// else{
//    echo "smaller";
// }




$sql1 = "select * from issuebook where book_isbn='123456789124'";
$result = mysqli_query($conn, $sql1);
while ($row = mysqli_fetch_row($result)) {

   $id = $row[0];


   $issuedate = $row[3];
   // $expected_return_date = $row[4];
   echo  "return date  ".$returndate;
   echo "<br>";
   // var_dump($returndate);

//    if ($issuedate < $returndate) {
//       $date1 = date_create($issuedate);
//       $date2 = date_create($returndate);
//       $diff = date_diff($date1, $date2);
//       echo $diff->format("%R%a") * $fine;
//       // echo $diff->format("%R%a"); 


// $date = new DateTime($returndate);
  $now = new DateTime();
echo $now->format('Y-m-d');
  
//   $k= $date->diff($now)->format("%d ");
//   echo $k;



$fine=20;

// $now = new DateTime();
// if(  $now > $returndate )
// {
 
// //   $date_expire = '2023-02-09';    
//   $date = new DateTime($returndate);
  
//   echo "\nfine :- ".$date->diff($now)->format("%d")*$fine;

// }
// else{
//    $fine=0;
// }





                  $current_date_time = new DateTime();
        					$expected_return_date = new DateTime($row[4]);

        					if($current_date_time > $expected_return_date)
        					{
        						$interval = $current_date_time->diff($expected_return_date);

        						$total_day = $interval->d;

        						$book_fines = $total_day * $fine;
                        echo "Fine :- ".$book_fines;

                     }
}
?>