<?php
require('Files\dbconnect.php');

if (isset($_POST['submit'])) 
{
  $ufname = $_POST['ufname'];
  $ulname = $_POST['ulname'];
  $ucontact = $_POST['ucontact'];
  $uemail = $_POST['uemail'];
  $upassword = $_POST['upassword'];
  $ugender = $_POST['ugender'];
  $udob = $_POST['udob'];

  

  
    //Checking Email Present or not
  $existSql = "select * from user_profile where uemail='$uemail'  ";
        $result = mysqli_query($conn, $existSql);
        $numExistsRow = mysqli_num_rows($result);
        if($numExistsRow>0) 
        {
          echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">  <strong>Email Alerady Registerd... || </strong> Try to take another one...:(
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
        } 
        else 
        {
            // matching password and confirm password
                  if ($_POST["upassword"] == $_POST["cpassword"]) 
                  {
                      // Genrating password has
                      $hash = password_hash($upassword , PASSWORD_DEFAULT);

                      $sql = "INSERT INTO `user_profile` (`ufname`, `ulname`, `ucontact`, `uemail`, `password`,`ugender`,`udob` ) VALUES ('$ufname','$ulname','$ucontact','$uemail','$hash','$ugender','$udob')";

                      $result = mysqli_query($conn, $sql);

                      if ($result) 
                      {
                          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>User Register Successfully... :)
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

                      } 
                      else 
                      {
                          echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">  <strong>Failed... || </strong> Please Check Username And Password...:( <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
                       }
                  } 
                  else 
                  {
                      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Error... || </strong> Password Does not Match:( <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
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

    <!-- Auto type effect -->
    <div class="text-center   p-2 card-header  bg-dark" style="color: red;">
      <h1><b>"<span class="auto-type"></span>"</b></h1>

    </div>
    <script>
      var typed = new Typed(".auto-type ", {
        strings: ["When In Doubt Go To The Library.", "There Is Nothing More Magical Than Learning The Wonders Of A Good Book !", "Libraries Always Remind Me That There Are Good Things In This World."],
        typeSpeed: 100,//150
        backSpedd: 150,
        loop: true
      })
    </script>

    <section class=" gradient-custom text-white">
      <div class="container py-5 h-100 ">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration"
              style="border-radius: 15px; background-color:rgb(28, 32, 34);">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                <form action="user_reg.php" method="post">

                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="emailAddress">Date Of Birth</label>
                        <input type="date" name="udob" id="emailAddress" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="contact">Contact Number</label>
                        <input type="tel" name="ucontact" id="contact" onfocusout="convalidate()" class="form-control form-control-lg"  maxlength="10" required/>

                      </div>

                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="firstName">First Name</label>
                        <input type="text" name="ufname" id="firstName" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="lastName">Last Name</label>
                        <input type="text" name="ulname" id="lastName" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4 d-flex align-items-center">

                      <div class="form-outline datepicker w-100">
                        <label for="birthdayDate" class="form-label">E-mail</label>
                        <input type="email" name="uemail"  onfocusout="mailvalidate()" id="eemail" class="form-control form-control-lg" required />
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">

                      <h6 class="mb-2 pb-1">Gender: </h6>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="ugender" type="radio"  value="Male" required />
                        <label class="form-check-label" for="femaleGender">Male</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="ugender" type="radio" value="Female" required/>
                        <label class="form-check-label" for="maleGender">Female</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="ugender" type="radio"   value="Other" required/>
                        <label class="form-check-label" for="otherGender">Other</label>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <label class="form-label" for="emailAddress">Password</label>
                        <input type="password" name="upassword" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <label class="form-label" for="phoneNumber">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control form-control-lg"  required/>
                      </div>

                    </div>
                  </div>

                  <div class="row">

                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Register" />
                    </div>

                    <div class="mb-2 mt-4">
                            <label for="email" class="form-label fw-bold">Have an account? <a class="ared" href="user_login.php">Log In. </a></label>
                       </div>
                  </div>    

                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>

<script>
  function convalidate(){
    var a = document.getElementById('contact').value;
    var regex = /[0-9]{10}/;
    if (!a.match(regex)){
      alert("Wrong contact Number");
     document.getElementById('contact').value='';
    }
  }
  function mailvalidate(){
    var a = document.getElementById('eemail').value;
    var regex = /[a-zA-Z0-9+_.-]+@gmail\.com$/;
    if (!a.match(regex)){
      alert("Wrong Email-Id\n Try to take this format \ne.g xxxxxxx@gmail.com");
     document.getElementById('eemail').value='';
    }
  }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>