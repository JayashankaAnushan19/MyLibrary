<?php
include('../../model/db_connection.php'); 

runQuary("INSERT INTO `tb_books`(`books_name`, `books_author`, `books_category`, `books_qty`) VALUES ('$_POST[txtName]','$_POST[txtAuthor]','$_POST[txtCategory]','0')","New Book Added Successfully !!!");
?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/books/add_books.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html>