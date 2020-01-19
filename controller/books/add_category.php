<?php
include('../../model/db_connection.php'); 

if (isset($_POST['btnAdd'])) {
	runQuary("INSERT INTO `tb_category`(`category_name`) VALUES ('$_POST[txtCatName]')","New Catogory Added Successfully !!!");
}
elseif (isset($_POST['btnUpdate'])) {
	runQuary("UPDATE `tb_category` SET `category_name`='$_POST[txtCatName]' WHERE `category_id`='$_POST[txtCatID]'","Catogory Update Successfully !!!");
}
elseif (isset($_POST['btnDelete'])) {
	runQuary("DELETE FROM `tb_category` WHERE `category_id`='$_POST[txtCatID]'","New Catogory Delete Successfully !!!");
}


?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/books/add_book_category.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html>