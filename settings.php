<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}

require("Files/navbar.php");
require("Files/dbconnect.php");

$sql11 = "select * from settings ";
$resultt = mysqli_query($conn, $sql11);
while ($row = mysqli_fetch_row($resultt)) {
   $fine = $row[1];
   $maximum_book = $row[2];
   $book_max_days = $row[3];
   
     }

if (isset($_POST['submit'])) 
{
  $fine = $_POST['fine'];
  $maximum_book = $_POST['maximum_book'];
  $book_max_days = $_POST['book_max_days'];
  

  $sql="update settings set fine=$fine,maxbook=$maximum_book,book_max_date=$book_max_days where s_id='1' ";
  $res=mysqli_query($conn,$sql);
  if($res){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Information Updated Sucessfully... </strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
  }
  else{
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed To Update... </strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
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


  <style>
    body,
    html {
      height: 100%;
      margin: 0;
      background-color: black;


    }

    .bg {
      
      background-image: url("https://source.unsplash.com/1920x720/?books");

      /* Full height */
      height: 100%;
      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    .ared:hover{
            font-size:x-large;
            color: red;
        }
  </style>




</head>

<body>
  <!-- Background Image Div -->
  <div class="bg">

  

    <section class=" gradient-custom text-white">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration"
              style="border-radius: 15px; background-color:rgb(28, 32, 34);">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Settings</h3>
                
                <form action="" method="post">

                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="fine">Fine Per Day</label>
                        <input type="text" name="fine"  class="form-control form-control-lg" value=<?php echo  $fine ?>  required/>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="maximum_book">Maximum Book Issue </label>
                        <input type="text" name="maximum_book"   class="form-control form-control-lg" value=<?php echo  $maximum_book ?>   required/>

                      </div>

                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="book_max_days">Issue Book Maximum Days</label>
                        <input type="text" name="book_max_days" class="form-control form-control-lg"  value=<?php echo  $book_max_days ?> required/>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">

                      

                    </div>
                  </div>

                 
                  

               
                  <div class="row">

                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Update" />
                    </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>