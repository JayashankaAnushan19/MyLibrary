<style>
	table { border-collapse: collapse; }
	td, th { border:1px solid black; padding:5px; padding-left: 10px; padding-right: 50px; }
	td { background-color: #cccccc; }
	th { background-color: #66ccff; }
</style>


<?php include('../../controller/admin/header.php'); 
$txtMemberId="";
?>
<br>
<h3>View Members Panalty</h3>
<br>
<form action="#" method="POST" >
	<div><br>
		<label >Enter Member ID :</label><br>		
		<input type="text" name="txtMemberId" value="<?php echo($txtMemberId) ?>">
		<input type="submit" name="btnSearch" value="Search Details">
		<br>
	</div>
</form>

<form>
<?php 

include('../../model/db_connection.php'); 

if (isset($_POST['btnSearch'])) {

	$Connection = setConnection();
	try
	{
		//Get panalty value from the database
		$myPCommand = "SELECT * FROM `tb_payment` WHERE `payment_id`='1'";

		$RecoPResult=mysqli_query($Connection, $myPCommand);

		if ($RecoPResult) {

			$Precord = mysqli_fetch_assoc($RecoPResult);
			$txtPanalty=$Precord['payment_panalty'];


			//Get issued books for the users from the database
			$myCommand = "SELECT * FROM `tb_issue_books` WHERE `issue_books_user_id` ='$_POST[txtMemberId]'";

			$RecoResult=mysqli_query($Connection, $myCommand);


			if ($RecoResult) {
				echo "<br>";
				echo "Member's  (".mysqli_num_rows($RecoResult). ")  Records found <br><br>";
				//create table code
				$table='<table>';
				$table.='<tr><th>Book ID</th><th>Issued ID</th><th>Issued Date</th><th>Return Date</th><th>Panalty total </th>';
				
				echo "Member ID :- (". $_POST['txtMemberId'].")";
				echo "<br><br>";

				//enter while loop -start
				while ($record = mysqli_fetch_assoc($RecoResult)) {
				//$record = mysqli_fetch_assoc($RecoResult);
				$txtMemberId=$record['issue_books_user_id'];
				$txtBookId=$record['issue_books_book_id'];
				$txtIssueId=$record['issue_books_id'];
				$txtIssueDate=$record['issue_books_issued_date'];
				$txtReturnDate=$record['issued_books_return_date'];
				$today=date('Y-m-d'); 

				$ts1 = strtotime($today);
				$ts2 = strtotime($txtReturnDate);

				$PanaltyTotal="0";

				if ($ts1 > $ts2) {
					$Dates_diff = ($ts1 - $ts2)/86400;
					$PanaltyTotal=$Dates_diff * $txtPanalty;
					$PanaltyTotal ="$ ".$PanaltyTotal;

					//create table
					//echo "$txtBookId". " ". "$txtIssueId". " ". "$txtIssueDate". " ". "$txtReturnDate". " ". "$PanaltyTotal";

					$table.='<tr border="2" cellspacing="5">';
					$table.='<td>'.$txtBookId.'</td>';
					$table.='<td>'.$txtIssueId.'</td>';
					$table.='<td>'.$txtIssueDate.'</td>';
					$table.='<td>'.$txtReturnDate.'</td>';
					$table.='<td>'.$PanaltyTotal.'</td>';
					$table.='</tr>';
				}
				else
				{
					$txtPanalty="$ "."0";

					//create table
					//echo "$txtBookId". " ". "$txtIssueId". " ". "$txtIssueDate". " ". "$txtReturnDate". " ". "$PanaltyTotal";

					$table.='<tr>';
					$table.='<td>'.$txtBookId.'</td>';
					$table.='<td>'.$txtIssueId.'</td>';
					$table.='<td>'.$txtIssueDate.'</td>';
					$table.='<td>'.$txtReturnDate.'</td>';
					$table.='<td>'.$PanaltyTotal.'</td>';
					$table.='</tr>';
				}
				//end while loop
				}
				$table.='</table>';

				echo $table;
			}
			else 
			{
				echo "<script type='text/javascript'>alert('Error')</script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Panalty value retrieving Error')</script>";
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
</form>

<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>