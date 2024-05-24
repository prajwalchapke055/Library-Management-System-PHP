<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}

require("Files/navbar.php");
require("Files/dbconnect.php");


if (isset($_POST['submit'])) {
  
  $afname = $_POST['afname'];
  $alname = $_POST['alname'];

  // check category present or not
  $existSql = "select * from author where a_fname='$afname' and a_lname='$alname'  ";
  $result = mysqli_query($conn, $existSql);
  $numExistsRow = mysqli_num_rows($result);
  if($numExistsRow>0) 
  {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">  <strong>Author Already Present...:( || </strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
  } else {
    $sql = "insert into author(a_fname,a_lname)values('$afname','$alname')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Author Added  Sucessfully...:)</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
    } else {
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed.... </strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
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

  <!-- CDN FOR TYPE JS -->
  <!-- https://github.com/mattboldt/typed.js/ -->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>



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
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Author</h3>
                
                <form action="add_author.php" method="post">

                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="firstName">First Name</label>
                        <input type="text" name="afname" id="firstName" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="lastName">Last Name</label>
                        <input type="text" name="alname" id="lastName" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                  </div>

                  <div class="row">

                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Add Author" />
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
    <!-- <form action="add_category.php" method="post"> -->
      <table class="table text-center" id="myTable">
        <thead>
          <tr>
            <th scope="col">Sr no.</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sr = 1;
          $sql1 = "select * from author";
          $result = mysqli_query($conn, $sql1);
          while ($row = mysqli_fetch_row($result)) {
            //  global $id ;
            $id = $row[0];
            ?>
            <tr>

              <td><b>
                  <?php echo $sr ?>
                </b></td>
              <td><b><?php echo $row[1] ?></b></td>
              <td><b><?php echo $row[2] ?></b></td>
              <td>
                <button type="submit" name="edit" class="btn btn-primary  "><a class="text-decoration-none text-white"
                    href="update_author.php?abc=<?php echo base64_encode($id) ?>">Edit</a></button>
                <button type="submit" name="delete" class="btn btn-danger "><a class="text-decoration-none text-white"
                    href="delete_author.php?abc=<?php echo base64_encode($id); ?>">Delete</a></button>
              </td>
            </tr>

            <?php
            $sr = $sr + 1;
          }
    
          ?>

        </tbody>
        <!-- </form> -->
      </table>


  <!-- </div> -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>