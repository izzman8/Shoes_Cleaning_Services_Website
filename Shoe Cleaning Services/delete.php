<?php
require('database.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM booking WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: view.php"); 
?>
