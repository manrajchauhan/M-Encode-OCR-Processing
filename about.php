<?php
session_start();
error_reporting(0);
include('inc/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image OCR & PDF Converter System | M-Encode </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" type="image/x-icon" href="inc/Encode.png">
</head>
<body>
<?php
include('inc/header.php');
?>

<main class="container">
  <h1 class="upload-text" >About Us</h1>
  <br>
  <p> M-Encode is a company that creates software and provides consulting services to businesses. We specialize in making strong software solutions that fit the needs of businesses of all sizes. Our team of experienced developers and engineers works closely with our clients to make sure we understand their needs and deliver custom solutions that work for them. We take pride in our commitment to quality, reliability, and making our customers happy. We want to build long-term relationships with our clients by giving them great service and support during every stage of the software development process. Whether you need new software, an upgrade to an existing system, or ongoing support, M-Encode has the knowledge and expertise to help your business succeed. Please contact us today to learn more about how we can help your business grow.</p>
</main>
</body>
</html>
<?php
include('inc/footer.php');
?>
