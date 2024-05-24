<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}

require("Files/navbar.php");
require("Files/dbconnect.php");

if (isset($_POST['submit'])) 
{


  $bname = $_POST['bname'];
  $bcate = $_POST['bcat'];
  $bautho = $_POST['bauthore'];
  $brack = $_POST['brack'];
  $bisbn = $_POST['bisbn'];
  $btotal = $_POST['btotal'];




        //Checking Book Present or not
        $existSql = "select * from addbook where b_name='$bname'";
        $result = mysqli_query($conn, $existSql);
        $numExistsRow = mysqli_num_rows($result);
        if ($numExistsRow > 0) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">  <strong>Book Alerady Present... 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
        } else {

            $sqll = "select * from category where cname='$bcate'";
            $resultt = mysqli_query($conn, $sqll);
            
        
               

            $sql = "INSERT INTO `addbook` (`b_name`, `b_category`, `b_author`, `b_location_rack`, `b_isbn`,`b_no_of_copy`, `cidd` ) VALUES ('$bname','$bcate','$bautho','$brack','$bisbn','$btotal',$bcate)";

               $result = mysqli_query($conn, $sql);
        

            if ($result) {
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Book Added Successfully... :)
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

            } else {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">  <strong>Failed...  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            }
        }

    
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
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Book</h3>
                            <form action="add_book.php" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="bname">Book Name</label>
                                            <input type="text" name="bname" class="form-control form-control-lg" maxlength="80" required />

                                        </div>
                                    </div>
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <label class="form-label" for="udob">Category</label>
                                                <select class="form-select" name="bcat" aria-label="Default select example" required>
                                                    <option  disabled selected value></option>
                                                    <!-- Fetch Book Category -->
                                                    <?php
                                                 $sql="select * from category";
                                                $res=mysqli_query($conn,$sql);
                                                   while($row=mysqli_fetch_row($res)){
                                                      $category = $row[1];
                                                        $catid = $row[0];
                                                       

                                                     ?>
                                                        <option value="<?php echo $catid?>"><?php echo $category?></option>
                                                        <?php
                                                    
                                                    }
                                                    ?>
                                                  </select>
                                            </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <div class="form-outline">
                                                <label class="form-label" for="udob">Author</label>
                                                <select class="form-select" name="bauthore" aria-label="Default select example" required>
                                                    <option selected>Select Book Author</option>
                                                    <!-- fetch author -->
                                                    <?php
                                                    $sql="select * from author";
                                                    $res=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_row($res)){
                                                        $author = $row[1]." ".$row[2];

                                                        ?>
                                                        <option value="<?php echo $author?>"><?php echo $author?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                  </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Rack</label>
                                            <select class="form-select" aria-label="Default select example" name="brack" required>
                                                <option selected>Select Book Shelf</option>
                                                <!-- Fetch Shelf Detail -->
                                                <?php
                                                    $sql="select * from rack_location";
                                                    $res=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_row($res)){
                                                        $rack = $row[1];

                                                        ?>
                                                <option values="<?php echo $rack?>"><?php echo $rack?></option>
                                                <?php
                                                    }
                                             ?>
                                              </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label">ISBN Number</label>
                                            <input type="text" name="bisbn" class="form-control form-control-lg" required />
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label">Total Number of Book</label>
                                            <input type="text" name="btotal" class="form-control form-control-lg" required />
                                        </div>
                                        
                                </div>

                                <div class="row">

                                    <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Add Book" />
                                     
                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <div class="container" style="border: 2px solid black; border-radius: 15px; padding: 15px; color: black; ">
    <!-- <form action="add_category.php" method="post"> -->
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
            <th scope="col">Action</th>
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
            //  $putcat= $row[1];//category
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
                   }  
                 //  echo $row[1] ?>
               </b></td>

         
              <td>
                <button type="submit" name="edit" class="btn btn-primary  "><a class="text-decoration-none text-white"
                    href="update_book.php?abc=<?php echo base64_encode($id) ?>">Edit</a></button>
                <button type="submit" name="delete" class="btn btn-danger "><a class="text-decoration-none text-white"
                    href="delete_book.php?abc=<?php echo base64_encode($id); ?>">Delete</a></button>
              </td>
             
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