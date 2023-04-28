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
// Include the header section
include('inc/header.php');
?>
<header class="text-align-center ">
		<h1 class="upload-text">M-Encode</h1>
		<p>A simple file upload and text extraction application.</p>
	</header>
	<main class="container ">
		<section>
			<h2 class="upload-text">About M-Encode</h2>
			<p>M-Encode is a web application that allows you to upload a file and extract the text from it using optical character recognition (OCR) technology. The application supports popular file formats such as PDF and image files.</p>
			<p>The extracted text can be downloaded in both PDF and text file formats.</p>
		</section>
		<section>
			<h2 class="upload-text">How to use M-Encode</h2>
			<ol class="list-group list-group-numbered">
				<li class="list-group-item">Click on the "Choose File" button and select the file you want to upload.</li>
				<li class="list-group-item">Click on the "Upload" button to upload the file.</li>
				<li class="list-group-item">Once the file is uploaded, the extracted text will be displayed on the screen.</li>
				<li class="list-group-item">You can download the extracted text in PDF or text file format by clicking on the "Download PDF File" or "Download TXT File" button respectively.</li>
			</ol>
		</section>
	</main>
</body>
</html>
<?php
// Include the footer section
include('inc/footer.php');
?>
