<?php include('../../controller/admin/header.php'); ?>

<?php
include('../../model/db_connection.php'); 

$txtId="1";

$Connection = setConnection();

	try
	{
		$myCommand = "SELECT * FROM `tb_payment` WHERE `payment_id`='$txtId'";

		$RecoResult=mysqli_query($Connection, $myCommand);

		if ($RecoResult) {

			$record = mysqli_fetch_assoc($RecoResult);
			$txtId=$record['payment_id'];
			$txtPanalty=$record['payment_panalty'];
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

?>

<br>
<h3>Panalty for a day</h3>
<br>
<form action="../../controller/payments/add_panalty.php" method="POST" >			
			<div >
			<label >Panalty value for a day ($):</label><br>		
			<input type="text" name="txtPanalty" value="<?php echo($txtPanalty) ?>">*If you have added before this time will be update the value!<br>
			<input type="submit" value="Update Panalty Value">
		</div>
	</form>

<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>