<?php include('../../controller/admin/header.php'); ?>

<?php
include('../../model/db_connection.php'); 

$txtId="";
$txtFName=" ";
$txtLName=" ";
$txtType=" ";
$txtUniId1=" ";
$txtTel=" ";
$txtAddress=" ";
$txtMail=" ";
$txtPassword=" ";


if (isset($_POST['btnFind'])) {

	$Connection = setConnection();
	try
	{
		$myCommand = "SELECT * FROM `tb_user` WHERE `user_id` ='$_POST[txtId]'";

		$RecoResult=mysqli_query($Connection, $myCommand);

		if ($RecoResult) {

			$record = mysqli_fetch_assoc($RecoResult);
			$txtId=$record['user_id'];
			$txtFName=$record['user_f_name'];
			$txtLName=$record['user_l_name'];
			$txtType=$record['user_type'];
			$txtUniId1=$record['user_uni_id'];
			$txtTel=$record['user_tel'];
			$txtAddress=$record['user_address'];
			$txtMail=$record['user_mail'];
			$txtPassword=$record['user_password'];

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
<h3>Update Member</h3>
<br>
<form action="#" method="POST">
	<label >ID :</label><br>
	<input type="text" name="txtId" value="<?php echo($txtId) ?>">
	<input type="submit" name="btnFind" value="Find Member Details">
</form>
<hr>

<form action="../../controller/members/update_member.php" method="POST" >
			<div>
			<div style="float: left;">			
			<input type="hidden" name="txtId" value="<?php echo($txtId) ?>">
			<label >First Name :</label><br>		
			<input type="text" name="txtFName" value="<?php echo($txtFName) ?>"><br>

			<label >Last Name :</label><br>
			<input type="text" name="txtLName" value="<?php echo($txtLName) ?>"><br>

			<label >Type :</label><br>
			<select name="txtType" value="<?php echo($txtType) ?>">
			<option value="Student">Student</option>
			<option value="Professor">Professor</option>
			</select><br>

			<label >Uni ID :</label><br>
			<input type="text" name="txtUniId" value="<?php echo($txtUniId1) ?>"><br>

			<label >Tel :</label><br>
			<input type="text" name="txtTel" value="<?php echo($txtTel) ?>"><br>

			</div>
			<div>

			<label >Address :</label><br>
			<input type="text" name="txtAddress" value="<?php echo($txtAddress) ?>"><br>

			<label >E-mail :</label><br>
			<input type="text" name="txtMail" value="<?php echo($txtMail) ?>"><br>

			<label >Password :</label><br>
			<input type="text" name="txtPassword" value="<?php echo($txtPassword) ?>"><br>

			<label >Re-type Password :</label><br>
			<input type="text" name="txtRePassword"><br><br><br>

			</div>
			</div><br><br>
			<div style="float: left;">
			<input type="submit" name="btnAdd" value="Update Member Details">
			<input type="submit" name="btnClear" value="Clear">
			</div>
			
</form>

<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>