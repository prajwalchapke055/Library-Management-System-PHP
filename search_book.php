<?php
session_start();
if(!isset($_SESSION['User_loggedin']) || $_SESSION['User_uemail']!=true){
    header("location:user_login.php");
    exit;
}

require("Files/usernav.php");
require("Files/dbconnect.php");






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
  <!-- <link rel="stylesheet" href="css/user_reg.css"> -->
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
 
    
    <div class="container-fluid py-4 ">
	<h1 class="ms-5 mt-2">Total Books...</h1>
    <hr>
    </div>
    <div class="container mt-5 " style="border: 2px solid black; border-radius: 15px; padding: 15px;">

   

                    <table class="table text-center" id="myTable">
        <thead>
          <tr>
            <th scope="col">Sr no.</th>
            <th scope="col">Name</th>
            <th scope="col">Shelf</th>
            <th scope="col">Author</th>
            <th scope="col">ISBN</th>
            <th scope="col">Total Books</th>
            <th scope="col">Category</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
          $sr = 1;
          $sql1 = "select * from addbook";
          $result = mysqli_query($conn, $sql1);
          while ($row = mysqli_fetch_row($result)) {
            //  global $id ;
            $id = $row[0];
             $putcat= $row[1];//category
            ?>
            <tr>

              <td><b><?php echo $sr ?></b></td>
              <td><b><?php echo $row[4] ?></b></td>
              <td><b><?php echo $row[3] ?></b></td>
              <td><b><?php echo $row[2] ?></b></td>
              <td><b><?php echo $row[5] ?></b></td>
              <td><b><?php echo $row[6] ?></b></td>
              <td><b><?php 
              $sql11 = "select * from category where cid=$putcat";
              $resultt = mysqli_query($conn, $sql11);
              while ($row = mysqli_fetch_assoc($resultt)) {
                  echo $row['cname'];
                   }   ?>
               </b></td>

         
             
             
            </tr>

            <?php
            $sr = $sr + 1;
          }
    
          ?>

        </tbody>
        <!-- </form> -->
      </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>