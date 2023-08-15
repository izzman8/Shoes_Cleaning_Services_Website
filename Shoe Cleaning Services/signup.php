<!DOCTYPE html>
<html>
<head>
	<title>signup page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<style>
  body {
  background-image: url("login.jpg");
  background-position: auto;
  background-size: 1350px 850px;
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
	<div class="background-image"></div>
		<div class="container vh-50"></div>
			<div class="row justify-content-center h-100">
				<div class="card w-50 my-auto shadow">
					<div class="class-header text-center">
						<h2>SIGNUP FORM</h2>
						<h3>Shoe Cleaning Services</h3>
					</div>
					<div class="class-body">
						<form action="signup_check.php" method="post">
						<?php if (isset($_GET['error'])) { ?>
     						<p class="error"><?php echo $_GET['error']; ?></p>
     					<?php } ?>

          				<?php if (isset($_GET['success'])) { ?>
              				 <p class="success"><?php echo $_GET['success']; ?></p>
         			 	<?php } ?>
						<div class="form-group">
							<label for="email">Email</label>
							<?php if (isset($_GET['email'])) { ?>	
								<input type="email" id="email" class="form-control" name="email" value="<?php echo $_GET['email']; ?>"/>
							<?php }
							else{ ?>
								<input type="email" id="email" class="form-control" name="email"
							<?php }?>>
						<div class="form-group">
							<label for="username">Username</label>
							<?php if (isset($_GET['user'])) { ?>
								<input type="user" id="user" class="form-control" name="user" value="<?php echo $_GET['user']; ?>"/>
								<?php }
							else{ ?>
								<input type="user" id="user" class="form-control" name="user"
							<?php }?>>
						</div>
						<div class="form-group">
							<label for="pass">Password</label>	
							<?php if (isset($_GET['pass'])) { ?>
								<input type="password" id="pass" class="form-control" name="pass" value="<?php echo $_GET['pass']; ?>"/>
							<?php }
							else{ ?>
								<input type="password" id="pass" class="form-control" name="pass"
							<?php }?>>

							<div class="form-group">
								<label for="re_pass">confrm Password</label>	
								<?php if (isset($_GET['re_pass'])) { ?>
									<input type="password" id="re_pass" class="form-control" name="re_pass" <?php echo $_GET['pass']; ?>/>
								<?php }
							else{ ?>
								<input type="password" id="re_pass" class="form-control" name="re_pass"
							<?php }?>>

							<div class="form-group">
								<label for="address">Address</label>	
								<?php if (isset($_GET['re_pass'])) { ?>
									<input type="text" id="re_pass" class="form-control" name="address" <?php echo $_GET['address']; ?>/>
								<?php }
							else{ ?>
								<input type="text" id="address" class="form-control" name="address"
							<?php }?>>

							<div class="form-group">
								<label for="address">Phone Number</label>	
								<?php if (isset($_GET['phone_num'])) { ?>
									<input type="text" id="phone_num" class="form-control" name="phone_num" <?php echo $_GET['phone_num']; ?>/>
								<?php }
							else{ ?>
								<input type="text" id="phone_num" class="form-control" name="phone_num"
							<?php }?>>
							</div>
								<input type="submit" class="btn btn-primary w-100" value="register" name="">
							</div>
								already have an account ?
								</b>
								<a href="login.php">login</a>
		
						<div class="card-footer text-right">
						<small>@Shoe Cleaning Services</small>
						</div>
					</div>
				</div>