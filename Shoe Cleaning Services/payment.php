<?php 
require('database.php');
include("auth.php");
$name =$_SESSION['user'];

$msg = "";
$status = "";
$uploadOk = 1; 

if (isset($_POST['upload'])) {
 
    $trn_date = date("Y-m-d H:i:s");
    $resit = $_FILES["resit"]["name"];
    $rname = $_FILES["resit"]["tmp_name"];
    $fresit = "./payment/" . $resit;
    $imageFileType = strtolower(pathinfo($fresit,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $status = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
}
      else{
    
       $sql = "insert into payment values (null,'$trn_date','$name','$resit')";
       mysqli_query($conn, $sql) or die(mysqli_error($conn));
       $msg =  "payment completed";
 
     if (move_uploaded_file($rname, $fresit)) {
       $status =  "Resit uploaded successfully!";
       define('TIMEZONE', 'Asia/Kuala_Lumpur');
        date_default_timezone_set(TIMEZONE);
       $trn_date = date("Y-m-d H:i:s");
       $update="update booking set trn_date='".$trn_date."', status='paid' where name = '".$name."' and status='unpaid'";
       mysqli_query($conn, $update) or die(mysqli_error($conn));
    }   else {
         $status =  "Failed to upload Resit!";
         echo '<p style="color:#dc3545;">'.$status.'</p>';
    }
  }  
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="style.css">
<title>Payment Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
  
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a class="#news" href="view.php">View Orders</a></li>
  <li><a class="#news" href="paid.php">View Paid Orders</a></li>
  <li><a class="#news" href="complete.php">Cleaned Shoe</a></li>
  <li><a class="#news" href="insert.php">Insert New Order</a></li>
</ul>

<div class="w3-container w3-black w3-padding-64 w3-xxlarge">
<div class="form">
<h2>Checkout</h2><br>
<h3>156244171338 (Abdul Fawwaz Ilman)</h3>
<img src="img/maybank.png" width = 300 title="maybank"></td>
<br>
<br>
<style>
  h1 {font-family: "Amatic SC", sans-serif}
  body {
  background-image: url("background.jpg");
  background-position: auto;
  background-size: 1363px 800px;
}
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #6c757d;
}  
</style>
<div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="resit" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
  <?php 
    if($uploadOk=1){ ?>
    <p style="color:#28a745;"><?php echo $msg; ?></p>
    <p style="color:#28a745;"><?php echo $status; ?></p>
    <?php }
    else{ ?>
      <p style="color:#dc3545;"><?php echo $status; ?></p>  

     <?php } ?>


<br /><br /><br /><br />
</div>
<div class="w3-container w3-black w3-padding-64 w3-xxlarge">
</body>
</html>