<?php 
require('database.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$trn_date = date("Y-m-d H:i:s");
$name =$_SESSION['user'];
$phone_num = $_SESSION['phone_num'];
$message = $_POST['message'];

$ins_query="insert into feedback (`id`,`trn_date`,`name`,`phone_num`,`message`) values (null,'$trn_date','$name','$phone_num','$message')";
mysqli_query($conn,$ins_query) or die(mysqli_error($conn));
$status = "Thank you for your feedback,go back to Home page?.</br></br><a href='home.php'>Home</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Feedback</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<ul>
  <li><a class="active" href="home.php">Home</a></li>
</ul>

<style>
  h1 {font-family: "Amatic SC", sans-serif}
  body {
  background-image: url("background.jpg");
  background-position: auto;
  background-size: 1375px 800px;
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
<div class="center">

<div class="form">
</thead>
<div class="form">
<div class="background-image"></div>
<div class="container vh-50"></div>
<div class="row justify-content-center h-100">
<div class="card w-50 my-auto shadow">
<div class="class-header text-center">
<style>
    
</style>
<div>
<div class="class-container">
<h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Feedback</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p>Feedback : <input type="text" name="message"  placeholder="Enter Your Feedback" required value="" /></p>
</p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>



<br /><br /><br /><br />
</div>
</div>
</body>
</html>