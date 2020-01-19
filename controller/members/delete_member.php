<?php
include('../../model/db_connection.php'); 

if (isset($_POST['btnClear'])) {
}
elseif (isset($_POST['btnDelete'])) {
	runQuary("DELETE FROM `tb_user` WHERE `user_id`='$_POST[txtId]'","Member Delete Successfully !!!");
}
?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/members/delete_member.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html> 