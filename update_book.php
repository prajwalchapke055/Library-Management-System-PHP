<?php


session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}


require("Files/navbar.php");
require("Files/dbconnect.php");


          

$bidg = base64_decode($_GET['abc']);

$sql = "select * from addbook where b_id=$bidg";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($res))
{
    $bname = $row[4];
    $bcate = $row[1];
    $bautho= $row[2];
    $brack = $row[3];
    $bisbn = $row[5];
    $btotal = $row[6];
    $cidd=$row[8];

}
//getting name using id category
$sql11 = "select * from category where cid=$bcate";
$resultt = mysqli_query($conn, $sql11);
while ($row = mysqli_fetch_assoc($resultt)) {
    $bcate= $row['cname'];
     }

if (isset($_POST['submit'])) 
{
  $bname = $_POST['bname'];
  $bcate = $_POST['bcat'];
  $bautho = $_POST['bauthore'];
  $brack = $_POST['brack'];
  $bisbn = $_POST['bisbn'];
  $btotal = $_POST['btotal'];

   



  $upd = "update addbook set b_name='$bname',b_category='$bcate',b_author='$bautho',b_isbn='$bisbn',b_no_of_copy='$btotal',b_location_rack='$brack',cidd='$bcate' where b_id =$bidg";
  $res = mysqli_query($conn, $upd);
  if($res){
    echo "<script>     
    alert('Updated Sucessfully...:)');
    window.location.replace('http://localhost/LMS/add_book.php');
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
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Update Book</h3>
                            <form action="" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="bname">Book Name</label>
                                            <input type="text" name="bname" value="<?php echo $bname ?>" class="form-control form-control-lg" maxlength="80" required />

                                        </div>
                                    </div>
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <label class="form-label" for="udob">Category</label>
                                                <select class="form-select" name="bcat" aria-label="Default select example" required>
                                                    <!-- Fetch Book Category -->
                                                    <option value="<?php echo $cidd?>" selected><?php echo $bcate ?></option>
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
                                                    <option selected><?php echo $bautho ?></option>
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
                                                <option selected><?php echo $brack ?></option>
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
                                            <label for="" class="form-label">ISBN Number</label>
                                            <input type="text" name="bisbn" value="<?php echo $bisbn ?>" class="form-control form-control-lg" required />
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label">Total Number of Book</label>
                                            <input type="text" name="btotal" value="<?php echo $btotal ?>" class="form-control form-control-lg" required />
                                        </div>
                                        
                                </div>

                                <div class="row">

                                    <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" name="submit" type="submit"
                                            value="Update Book" />
                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>