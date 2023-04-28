<?php
session_start();
error_reporting(0);
include('inc/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"select ID from tbluser where  (Email='$email' || MobileNumber='$email') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['m-encode']=$ret['ID'];
     header('location:index.php');
    }
    else{
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image OCR & PDF Converter System | M-Encode </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="inc/Encode.png">
</head>
<body>
<?php
include('inc/header.php');
?>

<div class="container bg-white pb-5">
    <div class="row d-flex justify-content-start align-items-center mt-sm-5">
        <div class="col-lg-5 col-10">
            <div id="circle"></div>
            <div class="pb-5"> <img src="inc/login.png" alt=""> </div>
        </div>
        <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-3">
           
            <div class="mt-3 mt-md-5">
                <h5>Log in to your account</h5>
                <form method="post" class="pt-4">
                    <div class="d-flex flex-column pb-3"> 
                        <label for="email">Email Address</label> 
                        <input type="email" name="email" id="emailId" class="border-bottom border-primary"> </div>
                    <div class="d-flex flex-column pb-3"> 
                        <label for="password">Password</label> 
                        <input type="password" name="password" id="pwd" class="border-bottom border-primary"> </div>
                    <button class="btn button-1 mt-3" type="submit" name="submit">Sign In</button>
                    <div class="register mt-5">
                        <p>Don't have an account? <a href="sign-up.php" >Create an account</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'></script>
</body>
</html>
<?php
include('inc/footer.php');
?>
