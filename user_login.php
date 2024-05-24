<?php


require('Files\dbconnect.php');

if (isset($_POST['login'])) 
{
    $uemail = $_POST['uemail'];
    $password = $_POST['password'];


    $sql = "select * from user_profile where uemail='$uemail'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo $num;
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {

        
        if (password_verify($password, $row['password'])) {
            //  $login = true;
            $a = $row['uestatus'];
                     if ($a == 0) 
                     {
                         $enc = base64_encode($uemail);
                       header("location:verify_mail.php?aaa=$enc");
                                exit;
                    } else {
                session_start();
                $_SESSION['User_loggedin'] = true;
                $_SESSION['User_uemail'] = $uemail;
                header("location:USER_HOME.php");   

                    }
               
            } else {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong> Please Check Email And Password...:(
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
            }
        
}
    } else {
        // header("location:login.php");
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong> Please Check Email And Password...:(
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

                    <form action="user_login.php" method="post"
                        class="shadow-lg shadow-intensity-xl rounded p-4 mb-5 text-white heightt bg-dark">

                        <div class="mb-2  text-center text-white">
                            <h2><u> User Login...</u></h2>
                            <!-- <h1><u>Library Management System...</u></h1> -->
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                name="uemail" required style="font-weight: bold;">
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control" name="password" required
                                style="font-weight: bold;">
                        </div>

                        <div class="mb-3 mt-4">
                            <button type="submit" name="login" class="btn btn-primary mt-4 mx-auto btnhover"
                                style="width:120px;"><b>Login</b></button>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="email" class="form-label fw-bold">New to Library ? <a class="ared"
                                    href="user_reg.php">Join Now </a></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>