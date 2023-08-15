<?php
require('database.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <title>View Resit</title>
  </head>
  <body>
     <ul>
        <li><a class="active" href="admin.php">Home</a></li>
        <li><a class="#news" href="view_admin.php">View Order</a></li>
    </ul>
    <div class="w3-container w3-black w3-padding-64 w3-xxlarge">
    <div class="form">
    <span class="w3-text-white w3-hide-small" style="font-size:100px"><h1>View Resit</h1></span>
    <table width="100%" border="1" style="border-collapse:collapse;">
    <table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Date</strong></th><th><strong>Name</strong></th><th><strong>Resit</strong></th></tr>
</thead>
<tbody>
<style>
  h1 {font-family: "Amatic SC", sans-serif}
  body {
  background-image: url("adminbg.jpg");
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
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM payment ORDER BY id DESC")
      ?>

      <?php foreach ($rows as $row) : ?>
        <tr><td align="center"><?php echo $i++; ?></td><td align="center"><?php echo $row["trn_date"]; ?></td><td align="center"><?php echo $row["name"]; ?></td><td><img src="payment/<?php echo $row["resit"]; ?>" width = 300 title="<?php echo $row['resit']; ?>"></td></tr>
        <?php
     endforeach; ?>
    </table>
    <br>
  </body>
</html>