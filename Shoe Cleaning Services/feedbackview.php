<?php 
require('database.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<title>View Orders</title>
</head>
<body>
  
<ul>
  <li><a class="active" href="admin.php">Home</a></li>
</ul>

<div class="w3-container w3-black w3-padding-64 w3-xxlarge">
<div class="form">
<span class="w3-text-white w3-hide-small" style="font-size:100px"><h1>Feedback</h1></span>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Date</strong></th><th><strong>Name</strong></th><th><strong>Phone Number</strong></th><th><strong>Feedback</strong></th></tr>
</thead>
<tbody>
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
<?php
$count=1;
$sql="Select * from feedback";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["trn_date"]; ?></td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["phone_num"]; ?></td><td align="center"><?php echo $row["message"]; ?></td></tr>
<?php $count++; } ?>
</tbody>
</table>
<br /><br /><br /><br />
</div>
<div class="w3-container w3-black w3-padding-64 w3-xxlarge">
</body>
</html>