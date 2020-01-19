<?php
include('../../model/db_connection.php'); 


runQuary("UPDATE `tb_payment` SET `payment_panalty`='$_POST[txtPanalty]' WHERE`payment_id`='1'","Panalty Value Update Successfully !!!");


?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/payments/panaly.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html> 