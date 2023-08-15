<?php 
require('database.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$type_cl =$_REQUEST['type_cl'];
$price =$_REQUEST['price'];
$descrip =$_REQUEST['descrip'];
$type = $_REQUEST['type'];
$ins_query="insert into service (`id`,`type_cl`,`price`,`descrip`,`type`) values (null,'$type_cl','$price','$descrip','$type')";
mysqli_query($conn,$ins_query) or die(mysqli_error($conn));
$status = "New Service Inserted Successfully.</br></br><a href='admin.php'>View Inserted Service</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Service</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
      body {
  background-image: url("shoes2.webp");
  background-position: center;
  background-size: 700px 500px;
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
<body>
<ul>
  <li><a class="active" href="admin.php">Home</a></li>
</ul>
<div class="background-image"></div>
<div class="container vh-50"></div>
<div class="row justify-content-center h-100">
<div class="card w-50 my-auto shadow">
<div class="class-header text-center">
<div>
<div class="class-container">
<h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Insert New Service</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p>Service name : <input type="text" name="type_cl" placeholder="Enter Service Name" required /></p>
<p>Price : <input type="text" name="price" placeholder="Enter Price(Number Only)" required /></p>
<p>Description : <input type="text" name="descrip"  placeholder="Enter Description" required /></p>
<label>Type of Service</label>
<select name="type">
  <option value="clean">clean</option>
  <option value="repaint">repaint</option>
  <option value="restore">restore</option>
</select>
        <br>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>


<br /><br /><br /><br />
</div>
</div>
</body>
</html>