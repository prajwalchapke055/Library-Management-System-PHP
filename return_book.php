<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}

require("Files/navbar.php");
require("Files/dbconnect.php");

// Getting fine from settings
$sql1 = "select * from settings";
$result = mysqli_query($conn, $sql1);
while ($row = mysqli_fetch_row($result)) {
  $fine=$row[1];

}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS...</title>
    <!-- Boostrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
  <!-- datatble cdn -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>




</head>

<body>
    <!-- Background Image Div -->
    <!-- <div class="bg"> -->

    <section class=" gradient-custom text-white">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration"
                        style="border-radius: 15px; background-color:rgb(28, 32, 34);">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Return Book</h3>
                            <form action="return_book.php" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="mail">Enter User Gmail</label>
                                            <input type="text" name="mail" class="form-control form-control-lg" maxlength="80" required />

                                        </div>
                                    </div>
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                            <br>
                                            <button type="submit" name="search" class="btn btn-primary mt-2 ">Search</button>
                                            </div>

                                    </div>
                                </div>
                                        </div>
                                         <div class="col-md-6 mb-4">

                                            <div class="form-outline">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



   
                                         
    <div class="container" style="border: 2px solid black; border-radius: 15px; padding: 15px;">
    
      <table class="table " id="myTable">
        <thead>
          <tr>
            <th scope="col">Sr no.</th>
            <th scope="col">Issue Date</th>
            <th scope="col">Expected Return Date</th>
            <th scope="col">Book Fine</th>
            <th scope="col">Book Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_POST['mail'])) {
            $mail = $_POST['mail'];
            $sr = 1;
            // $fine = 20;
            
            $sql1 = "select * from issuebook where user_mail='$mail'";
            $result = mysqli_query($conn, $sql1);
            while ($row = mysqli_fetch_row($result)) {
              $id = $row[0];
              $bookisbn = $row[1];
             
              $Totalnobook = $row[6]; //Total no. of Book
              $today=date("Y-m-d");
              $issuedate = $row[3];
       

                // Calcultating Book Fine
              $current_date = new DateTime();
              $expected_return_date = new DateTime($row[4]);

              if($current_date > $expected_return_date)
              {
                $diffrence = $current_date->diff($expected_return_date);
                $days = $diffrence->d;
                $getfine = $days * $fine;                  
              }
             else{
                $getfine=0;
              }

              ?>
              
           
            <tr>

              <td><b><?php echo $sr ?></b></td>         
              <td><b><?php echo $row[3] ?></b></td> 
              <td><b><?php echo $row[4] ?></b></td>
              <td><b><?php echo $getfine ?></b></td> 
              <td><b><?php 
            //   getting book name form book isbn
              $sql11 = "select * from addbook where b_isbn=$bookisbn";
              $resultt = mysqli_query($conn, $sql11);
              while ($row = mysqli_fetch_assoc($resultt)) {
                  echo $row['b_name'];
                   }   ?>
               </b></td>
          
        
              <td>
                    <button type="submit" id="myBtn" name="edit" class="btn btn-primary  "><a class="text-decoration-none text-white"
                    href="new_return_book.php?abc=<?php echo base64_encode($id); ?>&a=<?php echo base64_encode($mail); ?>">Return Book</a></button>
              </td>
           
            </tr>

            <?php
            $sr = $sr + 1;
            }
          }
    
          ?>

        </tbody>
      </table>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>