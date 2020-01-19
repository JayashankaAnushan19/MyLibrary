<?php include('../../controller/admin/header.php'); ?>

<?php 

include('../../model/db_connection.php'); 

$Connection = setConnection();

//SELECT * FROM `tb_user`
$myUCommand = "SELECT * FROM `tb_user`";
$UResult=mysqli_query($Connection, $myUCommand);
$Users =  mysqli_num_rows($UResult);

//SELECT * FROM `tb_books`
$myBCommand = "SELECT * FROM `tb_books`";
$BResult=mysqli_query($Connection, $myBCommand);
$Books =  mysqli_num_rows($BResult);

//SELECT * FROM `tb_borrow_books` WHERE `borrow_books_issued`='0'
$myBoCommand = "SELECT * FROM `tb_borrow_books` WHERE `borrow_books_issued`='0'";
$BoResult=mysqli_query($Connection, $myBoCommand);
$BorrowBooks =  mysqli_num_rows($BoResult);

//SELECT * FROM `tb_issue_books` WHERE `issue_books_returned`='0'
$myIsCommand = "SELECT * FROM `tb_issue_books` WHERE `issue_books_returned`='0'";
$IsResult=mysqli_query($Connection, $myIsCommand);
$IssuedBooks =  mysqli_num_rows($IsResult);

//SELECT * FROM `tb_payment` WHERE `payment_id`='1'
$myPayCommand = "SELECT * FROM `tb_payment` WHERE `payment_id`='1'";
$PayResult=mysqli_query($Connection, $myPayCommand);
$Panalty =  mysqli_num_rows($PayResult);


?>

<style>
	td 
	{ 
		background-color: #9999cc; 
		padding-left: 50px; 
		padding-right: 50px; 
		padding-top: 10px; 
		padding-bottom: 10px; 
		font-size:20px; 
		border:6px solid #cccccc; 
	}
</style>

<!--form>
	<div>
	<label>User :||<?php echo "$Users"; ?></label>
	<label>Books :||<?php echo "$Books"; ?></label>
	</div><br><br><br><br><br><br><br>
	<div>
	<label>Borrow Books :||<?php echo "$BorrowBooks"; ?></label>	
	<label>Issued Books :||<?php echo "$IssuedBooks"; ?></label>
	<label>Panalty for a Day :||<?php echo "$Panalty"; ?></label>
	</div>
</form-->
<form>
<table cellspacing="30">
	<tr>
		<td>Number of Users :<br><br>|<?php echo "$Users"; ?></td>
		<td>Number of Books :<br><br>|<?php echo "$Books"; ?></td>
		<td>Borrow Books :<br><br>|<?php echo "$BorrowBooks"; ?></td>
	</tr>
	<tr>		
		<td>Issued Books :<br><br>|<?php echo "$IssuedBooks"; ?></td>
		<td>Panalty for a Day :<br><br>|<?php echo "$Panalty"; ?></td>
	</tr>
</table>
</form>


<br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>

