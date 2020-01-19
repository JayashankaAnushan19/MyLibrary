<?php
include('../../model/db_connection.php'); 

runQuary("UPDATE `tb_books` SET `books_qty`='$_POST[txtQty]' WHERE `books_id`='$_POST[txtId]'","Book Count Added Successfully !!!");
?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/books/add_qty_books.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html>