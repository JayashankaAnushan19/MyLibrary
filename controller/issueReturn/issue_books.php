<?php
include('../../model/db_connection.php'); 

$IDate=date('Y-m-d'); 
$RDate=date('Y-m-d',strtotime($IDate.'+ 14 days'));


if (isset($_POST['btnClear'])) {
	
}

elseif (isset($_POST['btnAdd'])) {

	runQuary("INSERT INTO `tb_issue_books` ( `issue_books_user_id`, `issue_books_borrow_id`, `issue_books_book_id`, `issue_books_issued_date`, `issued_books_return_date`, `issue_books_returned`) VALUES ('$_POST[txtUserId]', '$_POST[txtBorroId]', '$_POST[txtBookId]', '$IDate', '$RDate', '0')","New Book Issued Successfully !!!");
				}


elseif (isset($_POST['btnUpdate'])) {
	runQuary("UPDATE `tb_issue_books` SET `issue_books_user_id` = '$_POST[txtUserId]', `issue_books_borrow_id` = '$_POST[txtBorroId]', `issue_books_book_id` = '$_POST[txtBookId]',`issue_books_issued_date` = '$IDate', `issued_books_return_date` = '$_POST[txtRetDate]' WHERE `tb_issue_books`.`issue_books_id` ='$_POST[txtIdN]'","Book Issuing update Successfully !!!");

}
elseif (isset($_POST['btnDelete'])) {
	runQuary("DELETE FROM `tb_issue_books` WHERE `issue_books_id` ='$_POST[txtIdN]'","Book Issuing record deleted Successfully !!!");
}

/*



*/

?>

<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/issueReturn/issue_books.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html> 




