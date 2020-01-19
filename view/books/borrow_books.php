<?php include('../../controller/user/header.php'); 

$txtBookID="";
$txtUserID=$_SESSION['UserId'];
$txtBookName="";
$txtBookAuthor="";
$txtBookCat="";
$txtBookQty="";

if (isset($_POST['btnSearchID'])) 
{

	$Connection = setConnection();
	try
	{
		$myCommand = "SELECT * FROM `tb_books` WHERE `books_id`='$_POST[txtSearchID]'";

		$RecoResult=mysqli_query($Connection, $myCommand);

		if ($RecoResult) {

			$record = mysqli_fetch_assoc($RecoResult);
			$txtBookID=$record['books_id'];
			$txtBookName=$record['books_name'];
			$txtBookAuthor=$record['books_author'];
			$txtBookCat=$record['books_category'];
			$txtBookQty=$record['books_qty'];

		}
		else {
			echo "<script type='text/javascript'>alert('SQL Error')</script>";

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
else
{}
?>
<style>
	form
	{ 
		margin-left: 25%;

	}

	input[type="text"]
	{ 
	margin-top: 5px;
	margin-bottom: 10px;
	padding: 0.5px;
	padding-left: 8px;
	font-size: 15px; 
	font-style:Segoe UI;
	border-radius: 30px;
	outline: none;
	height: 30px;
	background-color: transparent;
	width: 290px;

	}

	input[type="text"]:focus
	{
	background-color: #cccccc;
	}

	input[type="Date"]
	{ 
	padding-left: 30px;
	font-size: 15px; 
	font-style:Segoe UI;
	border-radius: 30px;
	outline: none;
	height: 30px;
	background-color: transparent;
	width: 270px;

	}

	input[type="submit"]
	{
	height: 40px;
	border-radius: 10px;
	outline: none;
	width: 300px;
	font-size: 15px;
	font-style: Segoe UI;
	}

	input[type="submit"]:hover
	{
	cursor: pointer;
	background-color: #9999cc;
	}

	select 
	{
	padding-left: 10px;
	padding: 0.5px;
	font-size: 15px; 
	font-style:Segoe UI;
	width: 98%;
	height: 30px;
	border-radius: 30px;
	outline: none;
	margin-top: 5px;
	margin-bottom: 10px;
	background-color: transparent;
	}
	label
	{
	padding-left: 15px;
	margin-top: 50px;
	}

	input:focus
	{
	  box-shadow: 0 0 0 5px white,
	  inset 0 2px 5px -1px rgba(0,0,0,0.25);
	}	
</style>




<!-- User borrow books -->
<br>
<h3>Borrow Books</h3>
<form action="#" method="POST">
	<div>
		Enter book ID:<br>
		<input type="text" name="txtSearchID" placeholder="***** Enter Book ID *****" required >
		<input type="submit" name="btnSearchID" value="Search">
	</div>
</form>
<hr>


<form action="../../controller/books/borrow_books.php" method="POST">
	<div>
		Book ID:<br>
		<input type="text" disabled="disabled" value="<?php echo($txtBookID) ?>"><br>
		<input type="hidden" name="txtBookID" required value="<?php echo($txtBookID) ?>">
		<input type="hidden" name="txtUserID" value="<?php echo($txtUserID) ?>">

		Book Name:<br>
		<input type="text" disabled="disabled" name="txtBookName" required value="<?php echo($txtBookName) ?>"><br>

		Book Author:<br>
		<input type="text" disabled="disabled" name="txtBookAuthor" required value="<?php echo($txtBookAuthor) ?>"><br>

		Book Category:<br>
		<input type="text" disabled="disabled" name="txtBookCat" required value="<?php echo($txtBookCat) ?>"><br>

		Current Book Quantity:<br>
		<input type="text" disabled="disabled" name="txtBookQty" required value="<?php echo($txtBookQty) ?>"><br>

		<input type="submit" name="btnBorrow" value="Borrow Books">
	</div>
</form>

<br><br><br><br><br><br><br>
<?php include('../../controller/user/footer.php'); ?>