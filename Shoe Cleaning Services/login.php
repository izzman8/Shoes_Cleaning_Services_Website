<?php 
session_start(); 
include "database.php";

if (isset($_POST['user']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['user']);
	$pass = validate($_POST['pass']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();

	}else{
		$pass = md5($pass);

		$sql = "SELECT * FROM loginform WHERE user='$uname' AND pass='$pass'";

		$result = mysqli_query($conn, $sql) or die(mysqli_error());
		$success = false;
		if (mysqli_num_rows($result) === 1) {
            $success = true;
		}
		else if(mysqli_num_rows($result) === 0){
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}else{
				header("Location: index.php?error=Incorect User name or password");
				exit();
			}
		}
	}else{
		header("Location: home.php?error=Incorect User name or password");
		exit();
}
if($success){
	echo "<center><font color='green'><b>You have login successfully</b></font></center>";
	$row = mysqli_fetch_assoc($result);
	$_SESSION['user'] = $row['user'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['ID'] = $row['ID'];
	$_SESSION['address'] = $row['address'];
	$_SESSION['phone_num'] = $row['phone_num'];
	$_SESSION['status'] = $row['status'];
	if($row["status"] == 1)
	{
		header("Location: admin.php");
	}else{
		header("Location: home.php?error=Incorect User name or password");
	}
}else{
	header("Location: home.php?error=Incorect User name or password");
	exit();
}