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
<title>Edit Order</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
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
<body>
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a class="#news" href="view.php">View Orders</a></li>
  <li><a class="#news" href="insert.php">Insert New Order</a></li>
</ul>
<div class="background-image"></div>
<div class="container vh-50"></div>
<div class="row justify-content-center h-100">
<div class="card w-50 my-auto shadow">
<div class="class-header text-center">
<h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Edit Your Order</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$service = mysqli_real_escape_string($conn,$_POST['service']);
$rslt = explode('|',$service);
$type_cl = $rslt[0];
$price = $rslt[1];

$update="update booking set trn_date='".$trn_date."', price='".$price."', service='".$type_cl."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));
$status = "Order Updated Successfully. </br></br><a href='view.php'>View Updated Order</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<label>Select a Service</label>
        <select name="service">
            <?php
            $sql = "SELECT * FROM service";
            $all_categories = mysqli_query($conn,$sql);
                while ($service = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $service["type_cl"]?>|<?php echo $service["price"]?>" required value = "<?php echo $service["type_cl"];?>">
                
                
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
<?php } ?>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>