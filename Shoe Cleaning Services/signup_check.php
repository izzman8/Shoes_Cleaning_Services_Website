<?php 
session_start(); 
include "database.php";

if (isset($_POST['user']) && isset($_POST['pass'])
    && isset($_POST['email']) && isset($_POST['re_pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['user']);
	$pass = validate($_POST['pass']);

	$re_pass = validate($_POST['re_pass']);
	$email = validate($_POST['email']);

	$phone_num = validate($_POST['phone_num']);
	$address = validate($_POST['address']);


	$user_data = 'user='. $uname. '&email='. $email;


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();

	}else if(empty($phone_num)){
        header("Location: signup.php?error=Phone Number is required&$user_data");
	    exit();

	}else if(empty($address)){
        header("Location: signup.php?error=Address is required&$user_data");
	    exit();

	}else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM loginform WHERE user='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO loginform(user, pass, email, address, phone_num) VALUES('$uname', '$pass', '$email', '$address', '$phone_num')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}