<?php include('../../controller/admin/header.php'); ?>

<?php
include('../../model/db_connection.php'); 

$txtId="0";
$txtUserId="";
$txtBorroId="";
$txtBookId="";
$txtIssuDate="";
$txtRetDate="";
$txtPanalty="$ "."";

if (isset($_POST['btnFind'])) {

	$Connection = setConnection();
	try
	{
		$myCommand = "SELECT * FROM `tb_issue_books` WHERE `tb_issue_books`.`issue_books_id` ='$_POST[txtId]'";
		$myCommandP = "SELECT * FROM `tb_payment` WHERE `payment_id`='1'";

		$RecoResult=mysqli_query($Connection, $myCommand);
		$RecoResultP=mysqli_query($Connection, $myCommandP);

		if ($RecoResult) {
			
			$record = mysqli_fetch_assoc($RecoResult);
			$txtId=$record['issue_books_id'];
			$txtUserId = $record['issue_books_user_id'];
			$txtBorroId=$record['issue_books_borrow_id'];
			$txtBookId=$record['issue_books_book_id'];
			$txtIssuDate=$record['issue_books_issued_date'];
			$txtRetDate=$record['issued_books_return_date'];
			$today=date('Y-m-d'); 


			if ($RecoResultP) {			
				
				$recordP = mysqli_fetch_assoc($RecoResultP);
				$PanaltyDay=$recordP['payment_panalty'];
				$ts1 = strtotime($today);
				$ts2 = strtotime($txtRetDate);

				if ($ts1 > $ts2) {
					$Dates_diff = ($ts1 - $ts2)/86400;
					$PanaltyTotal=$Dates_diff * $PanaltyDay;
					$txtPanalty ="$ ".$PanaltyTotal;
				}
				else{
					$txtPanalty="$ "."0";
				}

			}
			else {

			echo "<script type='text/javascript'>alert('Panalty Calculation Error')</script>";

			}

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
<h3>Issue Books Return</h3><br>	
<form action="#" method="POST" >
			<label >Book Issued ID :</label><br>		
			<input type="text" name="txtId" value="<?php echo($txtId) ?>" >
			<input type="submit" name="btnFind" value="Search Issuing Record">
</form>
<hr>
<form action="../../controller/issueReturn/return_books.php" method="POST" >
	<div>
		<div>
			<input type="hidden" name="txtId" disabled="disabled" value="<?php echo($txtId) ?>" ><br>
			<label >User ID :</label><br>		
			<input type="text" name="txtUserId" disabled="disabled" value="<?php echo($txtUserId) ?>" ><br><br>

			<label >Borrow ID :</label><br>
			<input type="text" name="txtBorroId" disabled="disabled" value="<?php echo($txtBorroId) ?>"><br><br>

			<label >Book ID :</label><br>		
			<input type="text" name="txtBookId" disabled="disabled" value="<?php echo($txtBookId) ?>"><br><br>

			<label >Issued Date :</label><br>
			<input type="Date" name="txtIssuDate" disabled="disabled" value="<?php echo($txtIssuDate) ?>">
			<br><br>

			<label >Return Date :</label><br>
			<input type="Date" name="txtRetDate" disabled="disabled" value="<?php echo($txtRetDate) ?>" ><br><br>

			<label >Panalty for expiration:</label><br>
			<input type="text" name="txtRetDate" disabled="disabled" value="<?php echo($txtPanalty) ?>" >
			<br><br>
		</div>
		<div>
				<input type="submit" name="btnReturn" value="Return Book">
				<input type="submit" name="btnClear" value="Clear">
				<br>
		</div>
	</div>
			

</form>

<br><br><br>
<?php include('../../controller/admin/footer.php'); ?>