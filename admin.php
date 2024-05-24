<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
require("Files/navbar.php");
require('Files/dbconnect.php');


function test($a,$b){
    require('Files/dbconnect.php');
    $sql="select $a from $b";
$res=mysqli_query($conn,$sql);
$author = mysqli_num_rows($res);
echo $author;
}



?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    

</head>

<body>
    
    <!-- <div class="d-flex align-items-center justify-content-center" style="min-height:700px">
        <div class="com-md-6">
            <div class="card">
                <div class="card-header">Admin login</div>
            </div>
        </div>
    </div> -->


    <div class="container-fluid py-4">
	<h1 class="mb-5">Dashboard</h1>
	<div class="row">
		<div class="col-xl-3 col-md-6">
			<a target="_self" href="view_users.php" class="text-decoration-none"><div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php test('uid','user_profile'); ?></h1>
					<h5 class="text-center">Total Users</h5>
				</div>
			</div>
            </a>
		</div>
		<div class="col-xl-3 col-md-6">
			<!-- <div class="card bg-warning text-white mb-4"> -->
            <a target="_self" href="add_author.php" class="text-decoration-none"><div class="card bg-warning text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php test('a_id','author'); ?></h1>
					<h5 class="text-center">Total Author</h5>
				</div>
			</div>
            </a>
		</div>
        
		<div class="col-xl-3 col-md-6">
			<a target="_self" href="view_addbook.php" class="text-decoration-none"><div class="card bg-danger text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php  test('b_id','addbook'); ?></h1>
					<h5 class="text-center">Total Books</h5>
				</div>
			</div>
            </a>
		</div>
		<div class="col-xl-3 col-md-6">
			<a target="_self" href="view_issuebook.php" class="text-decoration-none"><div class="card bg-success text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php test('i_id','issuebook'); ?></h1>
					<h5 class="text-center">Total Issued Books </h5>
				</div>
			</div>
            </a>
		</div>
		<div class="col-xl-3 col-md-6">
			<a target="_self" href="add_rack.php" class="text-decoration-none"><div class="card bg-success text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php test('r_id','rack_location'); ?></h1>
					<h5 class="text-center">Total Racks</h5>
				</div>
			</div>
            </a>
		</div>
		
		<div class="col-xl-3 col-md-6">
			<a target="_self" href="add_category.php" class="text-decoration-none"><div class="card bg-danger text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php test('cid','category'); ?></h1>
					<h5 class="text-center">Total Books Category</h5>
				</div>
			</div>
            </a>
		</div>
		
	</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>