<?php include('../../controller/user/header.php'); 

$user = $_SESSION['UserId'];

$txtPanalty="$ "."";

?>


<style>
	table {border:2px solid black; font-size: 18px;}
	th { background-color: #999999; padding-top: 8px; padding-left: 20px; padding-right: 20px;}
	td { background-color: #ccccff; padding-top: 8px; padding-left: 20px; padding-right: 20px;}
</style>
 
<br>
<h3>Issued Books and Panalty Details</h3><br>
<form>
<?php 


	$servername="localhost";
	$username="root";
	$password="";
	$database="db_Mylibrary";

	//Create connection
	$conn = new mysqli($servername,$username,$password,$database);

	//Check Connection
	if ($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
	}

$Connection = $conn;

$myCommandP = "SELECT * FROM `tb_payment` WHERE `payment_id`='1'";

mysqli_query($Connection, $myCommandP);
$recordP = mysqli_fetch_assoc(mysqli_query($Connection, $myCommandP));
$PanaltyDay=$recordP['payment_panalty'];

$myBoCommand = "SELECT * FROM `tb_issue_books` WHERE `issue_books_returned`='0' AND `issue_books_user_id`='$user'";
$BoResult=mysqli_query($Connection, $myBoCommand);

echo"( ". mysqli_num_rows($BoResult). " ) Records found. <br>";
echo"Panalty: ( $". $PanaltyDay. " ) For a day. <br><br>";

$table='<table>';
$table.='<tr><th>Issue ID</th><th>Borrow ID</th><th>Book ID</th><th>Issue Date</th><th>Return Date</th><th>Panalty</th></tr>';

while ($record = mysqli_fetch_assoc($BoResult)) 
{
	$IssueId=$record['issue_books_id'];
	$BorrowId=$record['issue_books_borrow_id'];
	$BookId=$record['issue_books_book_id'];
	$IssueDate=$record['issue_books_issued_date'];
	$ReturnDate=$record['issued_books_return_date'];

	$today=date('Y-m-d');
	
	$ts1 = strtotime($today);
	$ts2 = strtotime($ReturnDate);
	
	if ($ts1 > $ts2) {
		$Dates_diff = ($ts1 - $ts2)/86400;
		$PanaltyTotal=$Dates_diff * $PanaltyDay;
		$txtPanalty ="$ ".$PanaltyTotal;
	}
	else {
		$txtPanalty ="$ 0";
	}

	$table.='<tr>';
	$table.='<td>'.$IssueId.'</td>';
	$table.='<td>'.$BorrowId.'</td>';
	$table.='<td>'.$BookId.'</td>';
	$table.='<td>'.$IssueDate.'</td>';
	$table.='<td>'.$ReturnDate.'</td>';
	$table.='<td>'.$txtPanalty.'</td>';
	$table.='</tr>';

}
$table.='</table>';

echo $table;

?>
</form>
<br><br><br><br><br><br><br>



<!-- $_SESSION['UserId'] -->
<?php include('../../controller/user/footer.php'); ?>
