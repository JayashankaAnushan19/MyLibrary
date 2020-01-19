<?php
include('../../model/db_connection.php'); 

$Connection = setConnection();

$myBoCommand = "SELECT * FROM `tb_librarian` WHERE `librarian_id`='1'";
$BoResult=mysqli_query($Connection, $myBoCommand);

	$record = mysqli_fetch_assoc($BoResult);
	$ID=$record['librarian_id'];
	$Password=$record['librarian_password'];


if ($_POST['txtnewPass']==$_POST['txtretypePass']) {


	if ($_POST['txtoldPass']==$Password) {

	runQuary("UPDATE `tb_librarian` SET `librarian_password`='$_POST[txtnewPass]' WHERE `librarian_id`='$ID'","Password Update Successfully !!!");
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
		<meta http-equiv="Refresh" content="0;url=../../view/admin/admin.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html> 

