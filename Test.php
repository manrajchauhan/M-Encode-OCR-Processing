<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('inc/dbconnection.php');
use thiagoalessio\TesseractOCR\TesseractOCR;
use Mpdf\Mpdf;
require 'vendor/autoload.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            $file_name = $_FILES['file']['name'];
            $tmp_file = $_FILES['file']['tmp_name'];

            if (!session_id()) {
                session_start();
                $unq = session_id();
            }
            $file_name = 'M-Encode' . time() . '_' . str_replace(array('!', "@", '#', '$', '%', '^', '&', ' ', '*', '(', ')', ':', ';', ',', '?', '/' . '\\', '~', '`', '-'), '_', strtolower($_FILES['file']['name']));


            if (move_uploaded_file($tmp_file, 'uploads/' . $file_name)) {
                try {

                    $fileRead = (new TesseractOCR('uploads/' . $file_name))
                        ->executable('C:\Program Files\Tesseract-OCR\tesseract.exe')
                        ->setLanguage('eng')
                        ->image('uploads/' . $file_name)
                        ->run();

                        $fileRead = preg_replace('/\. /', ".<br>", $fileRead);
        $mpdf = new Mpdf();

        $mpdf->WriteHTML('<pre>' . $fileRead . '</pre>');

        $pdf_file_name = pathinfo($file_name, PATHINFO_FILENAME) . '.pdf';
        $mpdf->Output('downloads/' . $pdf_file_name, 'F');

        $text_file_name = pathinfo($file_name, PATHINFO_FILENAME) . '.txt';
        file_put_contents('downloads/' . $text_file_name, $fileRead);           

                }catch (Exception $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "<p class='alert alert-danger'>File failed to upload.</p>";
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
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="inc/Encode.png">
</head>
<body><div data-animation="default" class="navbar w-nav" data-easing2="ease" data-easing="ease" data-collapse="medium" data-w-id="479e09bf-2712-51a4-b256-2a7a8ae86fea" role="banner" data-duration="400" data-doc-height="1">
                <div class="page-padding">
                    <div class="container-large navbar-container">
                        <a href="index.php">
                       <img src="inc/Encode.png" alt="logo" aria-current="page" class="logo w-nav-brand w--current">
                        </a>
                        <nav role="navigation" class="nav-menu w-nav-menu">
                            <a href="about.php" class="nav-link w-nav-link">About us</a>
                            <a href="docs.php" class="nav-link w-nav-link">Documentation</a>
                                <a href="Test.php" class="nav-link w-nav-link">Test</a>
                            <a href="sign-up.php" class="nav-link w-nav-link btn-dark ">Sign Up</a>
                            <a href="login.php" class="ml-3"><button type="button" class="btn btn-dark ">Sign In
                                </button>
                            </a>
                            </li>
          <?php 
if (isset($_SESSION['m-encode']))
          {?>
                            <a href="History.php" class="nav-link w-nav-link btn-dark ">History</a>
                            <a href="logout.php" class="ml-3"><button type="button" class="btn btn-dark ">Log Out
                                </button>
                            </a>
                            <div style="margin-left: 15px;">
                            </div>
                            <?php }?>
                        </div>
                        </nav>
                        <div class="menu-button w-nav-button">
                            <div class="w-icon-nav-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
  <section class="section-home-header">
                    <div class="page-padding">
                        <div class="padding-section-medium hero-padding">
                            <div class="container-large position-relative">
                                <div class="position-relative">
                                    <div class="text-align-center">
                                        <div class="home-header-component">
                                            <div class="margin-bottom margin-medium">
                                                <h1 class="upload-text">Upload Your Image File</h1>
                                            </div>
                                            <div class="margin-bottom margin-medium">
                                                <div class="home-header_text-wrapper">
                                                    <p class="margin-bottom margin-0">Convert Your Image into Text </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="mx-auto">
                <div class="jumbotron">
                <?php if (isset($fileRead)): ?>
                    <p class="lead" id="reset">
                        <pre>
                            <?= $fileRead ?>
                        </pre>
                        <a href="downloads/<?php echo $pdf_file_name ?>" class="btn button-1 me-3" download>Download PDF File</a>
                        <a href="downloads/<?php echo $text_file_name ?>" class="btn button-1 me-3" download>Download Text File</a>

                    <button type="button" class="btn btn-secondary me-3" onclick="resetText()">Reset</button>

                    </p>
                    <?php endif; ?>
              
                </div>
            </div>
        </div>
        <div class="row col-sm-8 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="container-small col-md-3">

                            <label for="filechoose">Choose File</label>

                            <input type="file" name="file" class="form-control-file" id="filechoose">

                            <button class="btn button-1 mt-3" type="submit" name="submit" id="upload-form">Upload</button>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <?php
    include 'inc/footer.php';
    ?>

<script>
function resetText() {
        window.location.href = "index.php";
    }

    

</script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>
</html>
<?php

?>