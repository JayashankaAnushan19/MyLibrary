<?php include('../../controller/user/header.php'); ?>

<?php 


//Books in the library
$myBCommand = "SELECT * FROM `tb_books`";
$BResult=mysqli_query($Connection, $myBCommand);
$Books =  mysqli_num_rows($BResult);

//Borrowed books
$myBoCommand = "SELECT * FROM `tb_borrow_books` WHERE `borrow_books_issued`='0' AND `borrow_books_user_id`='$UserId'";
$BoResult=mysqli_query($Connection, $myBoCommand);
$BorrowBooks =  mysqli_num_rows($BoResult);

//Issued books
$myIsCommand = "SELECT * FROM `tb_issue_books` WHERE `issue_books_user_id`='$UserId'";
$IsResult=mysqli_query($Connection, $myIsCommand);
$IssuedBooks =  mysqli_num_rows($IsResult);

//Return available books
$myIsCommand = "SELECT * FROM `tb_issue_books` WHERE `issue_books_returned`='0' AND `issue_books_user_id`='$UserId'";
$IsResult=mysqli_query($Connection, $myIsCommand);
$ReturnIssuedBooks =  mysqli_num_rows($IsResult);


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
		<td>Number of Books :<br><br>|<?php echo "$Books"; ?></td>
		<td>Borrow Books :<br><br>|<?php echo "$BorrowBooks"; ?></td>		
		<td>Issued Books :<br><br>|<?php echo "$IssuedBooks"; ?></td>
		<td>Return Available Books :<br><br>|<?php echo "$ReturnIssuedBooks"; ?></td>
	</tr>
</table>
</form>






<?php include('../../controller/user/footer.php'); ?>