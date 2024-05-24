<?php
require("Files/dbconnect.php");
session_start();
if(isset($_SESSION['loggedin']) == true){
    require("Files/navbar.php");
//    echo "ADmin login";



if (isset($_POST['login'])) 
{
    $username= $_SESSION['username'];
    $passwordd=$_POST['currentpass'];




    $sql = "select * from login where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    // echo $num;
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {

        
        if (password_verify($passwordd, $row['password']))
         {
           
            $newpass=$_POST['newpass'];
            $retype=$_POST['renewpass'];

            // Genrating password has
            $hash = password_hash($newpass , PASSWORD_DEFAULT);

                if($newpass == $retype)
                {
                    // Updating Password
                    $sql="update login set password='$hash' where username='$username'";
                    $res=mysqli_query($conn,$sql);

                        if($res){
                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Password Updated Sucessfully || </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
                        }


                    
                }
                else{
                    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong>Password Not Match...:(
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
                }




               
        } else {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong>Invalid Password...:(
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
            }
        
}
    } else {
       
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong>Invalid Password...:(
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
    }


}





}
else if(isset($_SESSION['User_loggedin']) == true){
    require("Files/usernav.php");



    if (isset($_POST['login'])) 
    {
        $uemail= $_SESSION['User_uemail'];
        $passwordd=$_POST['currentpass'];

        // echo $uemail;

    
        $sql = "select * from user_profile where uemail='$uemail'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        // echo $num;
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
    
            
            if (password_verify($passwordd, $row['password']))
             {
                //  $login = true;
                $newpass=$_POST['newpass'];
                $retype=$_POST['renewpass'];

                // Genrating password has
                $hash = password_hash($newpass , PASSWORD_DEFAULT);

                    if($newpass == $retype)
                    {
                        // Updating Password
                        $sql="update user_profile set password='$hash' where uemail='$uemail'";
                        $res=mysqli_query($conn,$sql);

                            if($res){
                                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Password Updated Sucessfully || </strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
                            }


                        
                    }
                    else{
                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong>Password Not Match...:(
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
                    }




                   
            } else {
                    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong>Invalid Password...:(
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
                }
            
    }
        } else {
           
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong>Invalid Password...:(
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
        }
    
    
    }
    












}
else{
    header("location:index.php");   
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
        body,
        html {
            height: 100%;
            margin: 0;
            /* background-color: black; */
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

       
        <!-- Login Form -->
        <div class="container-fluied">
            <div class="row justify-content-center ">
                <div class="col-md-4 col-sm-6">

                    <form action="updatepass.php" method="post"
                        class="shadow-lg shadow-intensity-xl rounded p-4 mb-5 text-white heightt bg-dark">

                        <div class="mb-2  text-center text-white">
                            <h2><u> Update Password...</u></h2>
                            <!-- <h1><u>Library Management System...</u></h1> -->
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="email" class="form-label fw-bold">Current Password</label>
                            <input type="password" class="form-control" id="email" aria-describedby="emailHelp"
                                name="currentpass" required style="font-weight: bold;">
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="password" class="form-label fw-bold"> New Password</label>
                            <input type="password" class="form-control" name="newpass" required
                                style="font-weight: bold;">
                        </div>
                        <div class="mb-3 mt-4">
                            <label for="password" class="form-label fw-bold"> Retype Password</label>
                            <input type="password" class="form-control" name="renewpass" required
                                style="font-weight: bold;">
                        </div>

                        <div class="mb-3 mt-4">
                            <button type="submit" name="login" class="btn btn-primary mt-4 mx-auto btnhover"
                                style="width:170px;"><b>Update Password</b></button>
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