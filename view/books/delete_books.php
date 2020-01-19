<?php include('../../controller/admin/header.php'); ?>
<?php
include('../../model/db_connection.php'); 

$txtId="";
$txtName=" ";
$txtAuthor=" ";
$txtCategory=" ";
$txtQty=" ";

if (isset($_POST['btnFind'])) {

	$Connection = setConnection();
	try
	{
		$myCommand = "SELECT * FROM `tb_books` WHERE `books_id`='$_POST[txtId]'";

		$RecoResult=mysqli_query($Connection, $myCommand);

		if ($RecoResult) {

			$record = mysqli_fetch_assoc($RecoResult);
			$txtId=$record['books_id'];
			$txtName=$record['books_name'];
			$txtAuthor=$record['books_author'];
			$txtCategory=$record['books_category'];
			$txtQty=$record['books_qty'];

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
<h3>Delete Book </h3>
<br>
<form action="#" method="POST">
	<label >Book ID :</label><br>
	<input type="text" name="txtId" value="<?php echo($txtId) ?>">
	<input type="submit" name="btnFind" value="Search book">
</form>
<hr>
<form action="../../controller/books/delete_book.php" method="POST" >
	<div >
		<input type="hidden" name="txtId" value="<?php echo($txtId) ?>">
		<label >Name :</label><br>
		<input type="text" disabled="disabled" name="txtName" value="<?php echo($txtName) ?>"><br>
		<label >Author :</label><br>
		<input type="text" disabled="disabled" name="txtAuthor" value="<?php echo($txtAuthor) ?>"><br>
		<label >Category :</label><br>
		<input type="text" disabled="disabled" name="txtCategory" value="<?php echo($txtCategory) ?>">
		<br>
		<label >Qty :</label><br>
		<input type="text" disabled="disabled" name="txtQty" value="<?php echo($txtQty) ?>">
		<br>
		<input type="submit" name="btnDelete" value="Delete Book">
	</div>
</form>
<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>