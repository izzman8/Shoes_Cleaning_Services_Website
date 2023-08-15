<?php 
require('database.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from service where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
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
  h1 {font-family: "Amatic SC", sans-serif}
  body {
  background-image: url("admin10.jpg");
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
<body>
<ul>
  <li><a class="active" href="admin.php">Home</a></li>
</ul>
<div class="background-image"></div>
<div class="container vh-50"></div>
<div class="row justify-content-center h-100">
<div class="card w-50 my-auto shadow">
<div class="class-header text-center">
<h1>Update Selected Service</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$type_cl =$_REQUEST['type_cl'];
$price =$_REQUEST['price'];
$descrip =$_REQUEST['descrip'];
$update="update service set type_cl='".$type_cl."', price='".$price."', descrip='".$descrip."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));
$status = "Service Updated Successfully. </br></br><a href='admin.php'>View Updated Service</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p>Service : <input type="text" name="type_cl" placeholder="Enter Service" required value="<?php echo $row['type_cl'];?>" /></p>
<p>Price : <input type="text" name="price" placeholder="Enter Price" required value="<?php echo $row['price'];?>" /></p>
<p>Description : <input type="text" name="descrip" placeholder="Enter description" required value="<?php echo $row['descrip'];?>" /></p>
<br>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>