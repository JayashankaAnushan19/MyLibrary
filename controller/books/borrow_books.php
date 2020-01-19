<?php
include('../../model/db_connection.php'); 

$BDate=date('Y-m-d'); 
if (!($_POST['txtBookID']=="")) {
	runQuary("INSERT INTO `tb_borrow_books`(`borrow_books_user_id`, `borrow_books_book_id`, `borrow_books_date`, `borrow_books_issued`) VALUES ('$_POST[txtUserID]','$_POST[txtBookID]','$BDate','0')","New Book Borrowed Success!!");
	runQuary("UPDATE `tb_books` SET `books_qty`= (books_qty-1)  WHERE books_id =  $_POST[txtBookID]","");
}
else {
	echo "<script type='text/javascript'>alert('Find a book before borrow !!!')</script>";
}



/*
*/
?>

<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/books/borrow_books.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html>