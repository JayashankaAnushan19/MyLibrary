<?php
include('../../model/db_connection.php'); 

$IssueId="";


if (isset($_POST['btnClear'])) 
{
	
}
elseif (isset($_POST['btnReturn'])) {
	
	//First isue book return (Return column =1)

	$Connection = setConnection();

	$IssueId=$_POST['txtId'];

	$myCommandUpIssuBok ="UPDATE `tb_issue_books` SET `issue_books_returned` = '1' WHERE `tb_issue_books`.`issue_books_id` = '$IssueId'";

	$RecoResultUpIssuBok=mysqli_query($Connection, $myCommandUpIssuBok);

	if ($RecoResultUpIssuBok) {


		//Next Add book to stock

		$myCommand = "SELECT * FROM `tb_books` WHERE `books_id` ='$_POST[txtBookId]'";

		$RecoResult=mysqli_query($Connection, $myCommand);

		if ($RecoResult) {

			$record = mysqli_fetch_assoc($RecoResult);
			$txtBookID=$record['books_id'];
			$txtBookQty=$record['books_qty'];
			$txtBookQty+=1;

			runQuary("UPDATE `tb_books` SET `books_qty`='$txtBookQty' WHERE `books_id`='$txtBookID';","Again Book Return Successfully !!!");
			}
			else
			{
				echo "<script type='text/javascript'>alert('Book Adding to stock Error')</script>";
			}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Book Returning Error')</script>";
	}

}

?>

<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=../../view/issueReturn/return_books.php">
		<title>Loading ...</title>
	</head>
	<body>
	</body>
</html> 