

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
        body,html {
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
            background-color: red;
            font-size: x-large;
            transition: 0.5s;
            border: 2px solid black;

        }

        .heightt {
            margin-top: 10vh;
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
                strings: ["When In Doubt Go To The Library.","There Is Nothing More Magical Than Learning The Wonders Of A Good Book !","Libraries Always Remind Me That There Are Good Things In This World."],
                typeSpeed: 100,//150
                backSpedd: 150,
                loop: true
            })
        </script>

        <div class="container-fluied">
            <div class="row justify-content-center ">
                <div class="col-md-3 col-sm-6 row  shadow-lg shadow-intensity-xl rounded p-4 mb-5 text-white heightt bg-dark">
                    <!-- card 1 -->
                    <div class="card bg-dark " style="width: 25rem; border: 2px solid white;">
                        <div class="card-body text-center mb-5 mt-5">
                          <h2 class="card-title ">Admin Login</h2>
                        
                          <div class="d-grid gap-2 col-6 mx-auto">
                          
                              <button type="button" class="btn btn-primary btnhover row-4 btn-lg mt-4 "><a href="login.php" class="card-link text-decoration-none text-white">Proceed</a></button> 
                          </div>
                           
                        
                        </div>
                        </div>
                        &nbsp; &nbsp; &nbsp;
                        <!-- card 2 -->
                        <div class="card bg-dark mt-2 " style="width: 25rem; border: 2px solid white;">
                            <div class="card-body text-center mb-5 mt-5">
                              <h2 class="card-title">User Login</h2>
                                  
                              <div class="d-grid gap-2 col-6 mx-auto">
                          
                                <button type="button" class="btn btn-primary btnhover row-4 btn-lg mt-4 "><a href="user_login.php" class="card-link text-decoration-none text-white">Proceed</a></button> 
                            </div>
                            
                            
                            </div>
                            </div>
                      </div>
                    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>