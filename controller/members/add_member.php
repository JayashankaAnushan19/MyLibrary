<?php
include('../../model/db_connection.php'); 

if ($_POST['btnClear']) 
{
	
}

elseif ($_POST['txtPassword']==$_POST['txtRePassword']) {
	date_default_timezone_set("Asia/Kolkata");
	$DateTime = date("Y/m/d")." ".date("H:i:s");

	runQuary("INSERT INTO `tb_user`(`user_f_name`, `user_l_name`, `user_type`, `user_uni_id`, `user_tel`, `user_address`, `user_mail`, `user_last_login`, `user_password`) VALUES ('$_POST[txtFName]','$_POST[txtLName]','$_POST[txtType]','$_POST[txtUniId]','$_POST[txtTel]','$_POST[txtAddress]','$_POST[txtMail]','{$DateTime}','$_POST[txtPassword]')","New Member Added Successfully !!!");
}
else{
	echo "<script type='text/javascript'>alert('Error !. Passwords not matching Please enter passwords again.')</script>";
}


?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/members/add_member.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html> 