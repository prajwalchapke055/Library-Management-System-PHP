<?php


session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}

require("Files/navbar.php");
require('Files/dbconnect.php');
    
$gid = base64_decode($_GET['abc']);

$sql = "select * from author where a_id=$gid";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_row($result)){
    $fname = $row[1];
    $lname = $row[2];
}

if(isset($_POST['update'])){
    $fname = $_POST['afname'];
    $lname = $_POST['alname'];
    
        $upd = "update author set a_fname='$fname',a_lname='$lname' where a_id=$gid";
        $res = mysqli_query($conn, $upd);
        if ($res) {
          echo "<script>     
          alert('Updated Sucessfully...:)');
          window.location.replace('http://localhost/LMS/add_author.php');
          </script>";
            
        } else {
            echo "Faild";
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
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Update Author</h3>
                
                <form action="" method="post">

                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="firstName">First Name</label>
                        <input type="text" name="afname"  value="<?php echo $fname;?>" id="firstName" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="lastName">Last Name</label>
                        <input type="text" name="alname" id="lastName"  value="<?php echo $lname;?>" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                  </div>

                  <div class="row">

                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" name="update" type="submit" value="Update Author" />
                    </div>
                  </div>    
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  <!-- </div> -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>