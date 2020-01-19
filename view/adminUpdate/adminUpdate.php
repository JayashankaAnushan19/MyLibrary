<?php include('../../controller/admin/header.php'); ?>



<br>

<h3>Admin/Profile Update</h3>
<br>

<?php 

	include('../../model/db_connection.php'); 

		$Connection = setConnection();

		$myBoCommand = "SELECT * FROM `tb_librarian` WHERE `librarian_id`='1'";
		$BoResult=mysqli_query($Connection, $myBoCommand);

		$record = mysqli_fetch_assoc($BoResult);
		$ID=$record['librarian_id'];
		$FName=$record['librarian_f_name'];
		$LName=$record['librarian_l_name'];
		$Tel=$record['librarian_tel'];
		$Address=$record['librarian_address'];
		$Mail=$record['librarian_mail'];
		$LastLogin=$record['librarian_last_login'];

?>
<form action="../../controller/adminUpdate/adminupdate.php" method="POST">
	<div style="float: left;">
	<input type="hidden" name="txtId" value="<?php echo($ID) ?>">
	<label>First Name:</label><br>
	<input type="text" name="txtFName" value="<?php echo($FName) ?>"><br>

	<label>Last Name:</label><br>
	<input type="text" name="txtLName" value="<?php echo($LName) ?>"><br>

	<label>Tel:</label><br>
	<input type="text" name="txtTel" value="<?php echo($Tel) ?>"><br>

	</div>
	<div>		
	
	<label>Address:</label><br>
	<input type="text" name="txtAddress" value="<?php echo($Address) ?>"><br>

	<label>E-Mail:</label><br>
	<input type="text" name="txtMail" value="<?php echo($Mail) ?>"><br>

	<label>Last Login:</label><br>
	<input type="text" disabled="disabled" value="<?php echo($LastLogin) ?>"><br>
	</div>
	<input type="submit" name="btnUpdate" value="Update">
</form>
	
<br><br>
<?php include('../../controller/admin/footer.php'); ?>
