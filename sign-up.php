<?php
session_start();
error_reporting(0);
include('inc/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    
    echo '<script>alert("You have successfully registered.");
    window.location.href = "login.php";
    </script>';
  }
  else
    {
    
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
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
            <div class="pb-5"> <img src="inc/sign.png" alt=""> </div>
        </div>
        <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-3">
           
            <div class="mt-3 mt-md-5">
                <h5>Sign Up Your New Account</h5>
                <form method="post" name="signup" onsubmit="return checkpass();" class="pt-4">
                <div class="d-flex flex-column pb-3"> 
                        <label for="email">First Name:</label> 
                        <input type="text" name="firstname" required="" class="border-bottom border-primary"> 
                    </div>
                    <div class="d-flex flex-column pb-3"> 
                        <label for="email">Last Name:</label> 
                        <input type="text" name="lastname" required="" class="border-bottom border-primary"> 
                    </div>
                    <div class="d-flex flex-column pb-3"> 
                        <label for="email">Mobile Number:</label> 
                        <input type="text" name="mobilenumber" required="" pattern="[0-9]+" maxlength="10"  class="border-bottom border-primary"> 
                    </div>
                    <div class="d-flex flex-column pb-3"> 
                        <label for="email">Email Address</label> 
                        <input type="email" name="email" id="emailId" required="" class="border-bottom border-primary"> 
                    </div>

                    <div class="d-flex flex-column pb-3"> 
                        <label for="password">Password</label> 
                        <input type="password" name="password" id="pwd" required="" class="border-bottom border-primary"> 
                    </div>

                    <div class="d-flex flex-column pb-3"> 
                        <label for="password">Repeat Password</label> 
                        <input type="password" name="repeatpassword" id="pwd" required="" class="border-bottom border-primary"> 
                    </div>
                    <button class="btn button-1 mt-3" type="submit" name="submit">Sign Up</button>
                    <div class="register mt-5">
                    <p>Already Sign Up? <a href="login.php" >Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>
</body>
</html>
<?php
include('inc/footer.php');
?>
