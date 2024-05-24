<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}


require("Files/navbar.php");
require('Files/dbconnect.php');
    
$gid = base64_decode($_GET['abc']);

$sql = "select * from rack_location where r_id=$gid";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result)){
    $val = $row['r_name'];
}

if(isset($_POST['update'])){
    $pick = $_POST['catname'];

    $upd = "update rack_location set r_name='$pick' where r_id=$gid";
    $res = mysqli_query($conn, $upd);
    if($res){
      echo "<script>     
      alert('Updated Sucessfully...:)');
      window.location.replace('http://localhost/LMS/add_rack.php');
      </script>";
        
    }
    else{
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

  <style>
    body {
      background: #f093fb;


      background: linear-gradient(80deg, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
    }
  </style>



</head>

<body>
  <!-- <div class="bg"> -->

  <section class=" gradient-custom text-white">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-11 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration"
            style="border-radius: 15px; background-color:rgb(23, 24, 23);">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Shelf Details</h3>

              <form action="" method="post">


                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="firstName">Shelf</label>
                      <input type="text" name="catname"  value="<?php echo $val; ?>" id="firstName" class="form-control form-control-lg" required />
                    </div>

                  </div>

                </div>



                <div class="row">

                  <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" name="update" type="submit" value="Add Shelf" />
                  </div>
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
