<?php
include('../../model/db_connection.php'); 


if (isset($_POST['btnDelete'])) {

	//$txtQty1=$_POST['txtQty'];

	if ($_POST['txtQty']!="0") 
	{
		runQuary("DELETE FROM `tb_books` WHERE `tb_books`.`books_id` = '$_POST[txtId]'","Book Delete Successfully !!!");
	}
	else 
	{
		echo "<script type='text/javascript'>alert('Error. Book Quentity is not qual to 0.')</script>";
	}

}

/*

*/
?>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/books/delete_books.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html>