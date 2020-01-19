<?php include('../../controller/admin/header.php'); ?>
<br>
<h3>Change Password</h3>
<br>
<style>
	input[type="submit"]
	{
	height: 40px;
	border-radius: 10px;
	outline: none;
	width: 150px;
	font-size: 15px;
	font-style: Segoe UI;
}
</style>


<form action="../../controller/adminUpdate/changePass.php" method="POST">
	<input type="hidden" name="txtid">
	<label>Enter Old Password</label><br>
	<input type="text" name="txtoldPass"><br>
	<label>Enter New Password</label><br>
	<input type="text" name="txtnewPass"><br>
	<label>Re-type Password</label><br>
	<input type="text" name="txtretypePass"><br>
	<div>
		<input type="submit" name="btnCancel" value="Cancel">
		<input type="submit" name="btnChange" value="Change Password">
	</div>
</form>
<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>