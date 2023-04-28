<?php 
session_start();
error_reporting(0);
include('inc/dbconnection.php');

if (strlen($_SESSION['m-encode']==0)) {
  header('location:logout.php');
} else {
    
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
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">
            <div>
                <div class="cont-details">
                   <div class="table-content table-responsive cart-table-content">
                    <h4 style="padding-bottom: 20px;text-align: center; margin-top:20px;">Uploaded History</h4>
                        <table class="table" border="1">
                            <thead >
                                <tr> 
                                <th>#</th> 
                                <th>File Path</th> 
                                <th>User Name</th>
                                <th>File Name</th>
                                <th>Posting Date</th> 
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <?php
                                   $userid= $_SESSION['m-encode'];
 $query=mysqli_query($con,"select distinct tbluser.ID as uid, tbluser.FirstName,tbluser.LastName,tbluser.Email,uploads.file_name,uploads.file_path,date(uploads.PostingDate) as PostingDate  from  tbluser   
join uploads on tbluser.ID=uploads.User_id where tbluser.ID='$userid'order by uploads.ID desc");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>
               <tr> 
                            <th scope="row"><?php echo $cnt;?></th> 
                            <td><?php  echo $row['file_path'];?></td>
                            <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                            <td><?php  echo $row['file_name'];?></td>
                            <td><?php  echo $row['PostingDate'];?></td> 
                                <td><a href="<?php  echo $row['file_path'];?>" class="btn btn-info">View</a></td> 

                          </tr><?php $cnt=$cnt+1; } ?>
                             
                            </tbody>
                        </table>
                    </div> </div>
                
    </div>
   
    </div></div>
</section>

</body>
</html>
<?php
include('inc/footer.php');
}
?>