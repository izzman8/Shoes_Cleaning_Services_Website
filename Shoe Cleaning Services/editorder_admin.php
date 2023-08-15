<?php 
require('database.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from booking where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Status Customer</title>
<meta charset="utf-8">
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
  <li><a class="#news" href="view_admin.php">View Records</a></li>
</ul>
<div class="background-image"></div>
<div class="container vh-50"></div>
<div class="row justify-content-center h-100">
<div class="card w-50 my-auto shadow">
<div class="class-header text-center">
<h1>Edit Status Customer</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$status =$_REQUEST['status'];
$update="update booking set trn_date='".$trn_date."', status='".$status."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));
$status = "Order Updated Successfully. </br></br><a href='view_admin.php'>View Updated Order</a>";
echo '<p style="color:#28a745;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<label>Status : </label>
        <select name="status">
                <option value="unpaid">unpaid</option>
                <option value="paid">paid</option>
                <option value="completed">completed</option>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>