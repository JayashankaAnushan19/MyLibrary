<?php
include('../../model/db_connection.php'); 

runQuary("UPDATE `tb_librarian` SET `librarian_f_name`='$_POST[txtFName]',`librarian_l_name`='$_POST[txtLName]',`librarian_tel`='$_POST[txtTel]',`librarian_address`='$_POST[txtAddress]',`librarian_mail`='$_POST[txtMail]'WHERE `librarian_id`='$_POST[txtId]'","Update Successfully !!!");




?>

<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/adminUpdate/adminUpdate.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html>
