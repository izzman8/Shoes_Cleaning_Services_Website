<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>

<style>
  body {
  background-image: url("login.jpg");
  background-position: auto;
  background-size: 1365px 800px;
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
	<div class="container vh-50"></div>
	<div class="row justify-content-center h-100">
		<div class="card w-50 my-auto shadow">
		<div class="class-header text-center">
			<h2>LOGIN FORM</h2>
			<h3>Shoe Cleaning Services</h3>
		</div>
    <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<div class="class-body">
			<form action="login.php" method="post">
				<div class="form-group">
					<label for="user">Username</label>	
					<input type="user" id="user" class="form-control" name="user"/>
				</div>
				<div class="form-group">
					<label for="pass">Password</label>	
					<input type="password" id="pass" class="form-control" name="pass"/>
				</div>
				<input type="submit" class="btn btn-primary w-100">
			</form>
		</div>
		new to this?<a href="signup.php">signup</a>
		
		<div class="card-footer text-right">
			<small>@Shoe Cleaning Services</small>
		</div>
	</div>
</div>


</body>
</html>
