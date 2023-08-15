<?php 
require('database.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$trn_date = date("Y-m-d H:i:s");
$name =$_SESSION['user'];
$phone_num = $_SESSION['phone_num'];
$address = $_SESSION['address'];

$result = mysqli_real_escape_string($conn,$_POST['service']);
$rslt = explode('|',$result);
$type_cl = $rslt[0];
$price = $rslt[1];

$ins_query="insert into booking (`id`,`trn_date`,`name`,`phone_num`,`address`,`status`,`service`,`price`) values (null,'$trn_date','$name','$phone_num','$address','unpaid','$type_cl','$price')";
mysqli_query($conn,$ins_query) or die(mysqli_error($conn));
$status = "New Order Inserted Successfully.</br></br><a href='view.php'>View Inserted Order</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Insert Order</title>
<title>Insert New Order</title>
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

<style>
  h1 {font-family: "Amatic SC", sans-serif}
  body {
  background-image: url("bg10.jpg");
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
<h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Insert New Order</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<label>Select a Service</label>
        <select name="service">
            <?php
            $sql = "SELECT * FROM service";
            $all_categories = mysqli_query($conn,$sql);
                while ($service = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $service["type_cl"]?>|<?php echo $service["price"]?>">
                
                
                    <?php echo $service["type_cl"] , ' RM ', $service['price'];
                    ?>
                </option>
            <?php
                endwhile;
                
            ?>
            
        </select>
        <br>
</p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#28a745;"><?php echo $status; ?></p>



<br /><br /><br /><br />
</div>
</div>
</body>
</html>