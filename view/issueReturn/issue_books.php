<?php include('../../controller/admin/header.php'); ?>

<style>
	input[type="submit"]
	{
	height: 40px;
	border-radius: 10px;
	outline: none;
	width: 150px;
	font-size: 15px;
	font-style: Segoe UI;
}
</style>

<?php
include('../../model/db_connection.php'); 

$txtId="";
$txtUserId="";
$txtBorroId="";
$txtBookId="";
$txtIssuDate=date('Y-m-d'); 
$txtRetDate=date('Y-m-d',strtotime($txtIssuDate.'+ 14 days'));

if (isset($_POST['btnFind'])) {

	$Connection = setConnection();
	try
	{
		$myCommand = "SELECT * FROM `tb_issue_books` WHERE `tb_issue_books`.`issue_books_id` ='$_POST[txtId]'";

		$RecoResult=mysqli_query($Connection, $myCommand);

		if ($RecoResult) {

			$record = mysqli_fetch_assoc($RecoResult);
			$txtId=$record['issue_books_id'];
			$txtUserId = $record['issue_books_user_id'];
			$txtBorroId=$record['issue_books_borrow_id'];
			$txtBookId=$record['issue_books_book_id'];
			$txtIssuDate=$record['issue_books_issued_date'];
			$txtRetDate=$record['issued_books_return_date'];

		}
		else {
			echo "<script type='text/javascript'>alert('Error')</script>";

		}
	}
	catch (exception $ex)
	{
		echo 'Caught exception: ', $ex -> getMessage(), "\n";
	}
	finally
	{
		mysqli_close($Connection);
	}
}
?>

<br>
<h3>Issue Books</h3><br>	
<form action="#" method="POST" >
			<label >Issued ID :</label><br>		
			<input type="text" name="txtId" value="<?php echo($txtId) ?>" >
			<input style="width: 300px;" type="submit" name="btnFind" value="Search Record">
</form>
<hr>
<form action="../../controller/issueReturn/issue_books.php" method="POST" >
	<div>
		<div>
			<input type="hidden" name="txtIdN" value="<?php echo($txtId) ?>" ><br>
			<label >User ID :</label><br>		
			<input type="text" name="txtUserId" value="<?php echo($txtUserId) ?>" ><br><br>

			<label >Borrow ID :</label><br>
			<input type="text" name="txtBorroId" value="<?php echo($txtBorroId) ?>"><br><br>

			<label >Book ID :</label><br>		
			<input type="text" name="txtBookId" value="<?php echo($txtBookId) ?>"><br><br>

			<label >Issued Date :</label><br>
			<input type="Date" name="txtIssuDate" value="<?php echo($txtIssuDate) ?>">*Default is today.
			<br><br>

			<label >Return Date :</label><br>
			<input type="Date" name="txtRetDate" value="<?php echo($txtRetDate) ?>" >
			*Default return date 14 today days from issued date.
			<br><br>
		</div>
		</div>
		<div>
			<input type="submit" name="btnClear" value="Clear">
			<input type="submit" name="btnAdd" value="Add">
			<input type="submit" name="btnUpdate" value="Update">
			<input type="submit" name="btnDelete" value="Delete">
			<br>
		</div>
	
			

</form>


<br><br><br>
<?php include('../../controller/admin/footer.php'); ?>