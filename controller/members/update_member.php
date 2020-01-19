<?php
include('../../model/db_connection.php'); 

if (isset($_POST['btnClear'])) {
}
elseif ($_POST['txtPassword']==$_POST['txtRePassword']) {


	runQuary("UPDATE `tb_user` SET `user_f_name`='$_POST[txtFName]',`user_l_name`='$_POST[txtLName]',`user_type`='$_POST[txtType]',`user_uni_id`='$_POST[txtUniId]',`user_tel`='$_POST[txtTel]',`user_address`='$_POST[txtAddress]',`user_mail`='$_POST[txtMail]',`user_password`='$_POST[txtPassword]' WHERE `user_id`='$_POST[txtId]'","Member Details Update Successfully !!!");
}
else{
	echo "<script type='text/javascript'>alert('Error !. Passwords not matching Please enter passwords again.')</script>";
}


?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/members/update_member.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html> 