


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="\LMS\admin.php">Home</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Add-Ons
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-white" href="\LMS\add_category.php">Add Category</a></li>
            <li><a class="dropdown-item text-white" href="\LMS\add_author.php">Add Author</a></li>
            <li><a class="dropdown-item text-white" href="\LMS\add_book.php">Add Book</a></li>
            <li><a class="dropdown-item text-white" href="\LMS\add_rack.php">Add Shelf</a></li>
            <li><hr class="dropdown-divider"></li>
            
          </ul>
        </li>
        

        <!-- second dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Book Action
          </a>
          <ul class="dropdown-menu">
         
            <li><a class="dropdown-item text-white" href="\LMS\issue_book.php">Issue Book</a></li>
            <li><a class="dropdown-item text-white" href="\LMS\return_book.php">Return Book</a></li>
            <li><hr class="dropdown-divider"></li>
            
          </ul>
        </li>



             <!-- Third dropdown -->
             <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Manage
          </a>
          <ul class="dropdown-menu">
         
            <li><a class="dropdown-item text-white" href="\LMS\settings.php">Settings</a></li>
            <li><a class="dropdown-item text-white" href="\LMS\updatepass.php">Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            
          </ul>
        </li>



      </ul>
      <form class="d-flex" role="search">
        <button class="btn btn-outline-danger" type="submit"><a href="\LMS\logout.php" class="text-decoration-none text-white">Logout</a></button>
      </form>
    </div>
  </div>
</nav>

        





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>