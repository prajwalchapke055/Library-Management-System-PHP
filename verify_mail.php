 <?php

error_reporting(0);
include("Files\dbconnect.php");
$dec = base64_decode($_GET['aaa']);

    $code = rand(111111, 999999);
  //  echo $code;
        $to_email = $dec;
        $subject = "OTP verification";
        $body = "Welcome To Library, OTP  :- $code";
        $headers = "From: asd";
        
        if (mail($to_email, $subject, $body, $headers)) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Email Send Sucessfully... :)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        } else {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Email Send Failde Try TO Reload... :)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        
 
 error_reporting(0);

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
            /* The image used */
            /* background-image: url("https://source.unsplash.com/1920x720/?Library,library"); */
            background-image: url("https://source.unsplash.com/1920x720/?books");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .btnhover:hover {
            background-color: green;
            transition: 0.5s;
            border: 2px solid black;

        }

        .heightt {
            margin-top: 20vh;
        }

        .ared:hover {
            font-size: x-large;
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





        <!-- Login Form -->
        <div class="container-fluied">
            <div class="row justify-content-center ">
                <div class="col-md-4 col-sm-6">

                    <form action="verify_mail.php" method="post"
                        class="shadow-lg shadow-intensity-xl rounded p-4 mb-5 text-white heightt bg-dark">

                        <div class="mb-2  text-center text-white">
                            <h2><u> Verify Email To Continue...</u></h2>
                          
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="email" class="form-label fw-bold">Email :- <?php echo $dec ?></label>
                        </div>


                        <div class="mb-1 mt-2">
                            <label for="" class="form-label fw-bold" style="color: red;">If Didn't get OTP ?</label><br>
                            <button type="button" onclick="window.location.reload()" name="btnotp" class="btn btn-danger mt-4 mx-auto btnhover" style="width:130px;"><b>Request OTP</b></button>
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="password" class="form-label fw-bold">Enter OTP</label>
                            <input type="text" class="form-control" name="getotp" id="otp"   style="font-weight: bold;">
                        </div>

                        <div class="mb-3 mt-4">
                            <button type="button" name="verify" class="btn btn-primary mt-4 mx-auto btnhover" style="width:120px;" onclick="greet()"><b>Verify </b></button>
                          
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<script>
    function greet(){
        
        var simple = '<?php echo $code; ?>';
        var inb=document.getElementById("otp").value;  
        if(simple==inb){
        
            window.location = "http://localhost/LMS/verifyotpstatus.php?abc=<?php echo $dec ?>";
        
        }
        else{
            alert("Invalid OTP");
        }

     
    }
   



</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>