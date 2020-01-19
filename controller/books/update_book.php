<?php
include('../../model/db_connection.php'); 

runQuary("UPDATE `tb_books` SET `books_name`='$_POST[txtName]',`books_author`='$_POST[txtAuthor]',`books_category`='$_POST[txtCategory]' WHERE `books_id`='$_POST[txtId]'","Book Update Successfully !!!");

/*



*/


?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/books/update_books.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html>