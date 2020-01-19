<?php include('../../controller/admin/header.php'); ?>

<style>
	table {border:2px solid black; font-size: 18px;}
	th { background-color: #999999; padding-top: 8px; padding-left: 20px; padding-right: 20px;}
	td { background-color: #ccccff; padding-top: 8px; padding-left: 20px; padding-right: 20px;}
</style>

<br>
<h3>Borrowed Books</h3><br>
<form>
<?php 

include('../../model/db_connection.php'); 

$Connection = setConnection();

$myBoCommand = "SELECT * FROM `tb_borrow_books` WHERE `borrow_books_issued`='0'";
$BoResult=mysqli_query($Connection, $myBoCommand);

echo "Borrowed Books : (". mysqli_num_rows($BoResult). ") Records found. <br><br>";
$table='<table>';
$table.='<tr><th>Borrow ID</th><th>User ID</th><th>Book Date</th><th>Borrowed Date</th>';

while ($record = mysqli_fetch_assoc($BoResult)) 
{
	$Id=$record['borrow_books_id'];
	$UserId=$record['borrow_books_user_id'];
	$BookId=$record['borrow_books_book_id'];
	$Date=$record['borrow_books_date'];

	$table.='<tr>';
	$table.='<td>'.$Id.'</td>';
	$table.='<td>'.$UserId.'</td>';
	$table.='<td>'.$BookId.'</td>';
	$table.='<td>'.$Date.'</td>';
	$table.='</tr>';

}
$table.='</table>';

echo $table;

?>
</form>
<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>