<?php
include('../../model/db_connection.php'); 

$Connection = setConnection();

$myBoCommand = "SELECT * FROM `tb_user` WHERE `user_id`='$_POST[txtid]'";
$BoResult=mysqli_query($Connection, $myBoCommand);

	$record = mysqli_fetch_assoc($BoResult);
	$ID=$record['user_id'];
	$Password=$record['user_password'];


if ($_POST['txtnewPass']==$_POST['txtretypePass']) {


	if ($_POST['txtoldPass']==$Password) {

	runQuary("UPDATE `tb_user` SET `user_password`='$_POST[txtnewPass]' WHERE `user_id`='$ID'","Password Update Successfully !!!");
	}
	else{

	echo "<script type='text/javascript'>alert('Error !. Current Password is not match. Please enter right current password.')</script>";
	}

}
else{
	echo "<script type='text/javascript'>alert('Error !. New Passwords not matching Please enter passwords again.')</script>";
}
?>

<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/userUpdate/userPassChange.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html> 
