<?php include('../../controller/admin/header.php'); ?>
<br>
<h3>Add New Member</h3>
<form action="../../controller/members/add_member.php" method="POST" >
	<div><br>
		<div style="float: left;">
		<label >First Name :</label><br>		
		<input type="text" name="txtFName"><br>

		<label >Last Name :</label><br>
		<input type="text" name="txtLName"><br>

		<label >Type :</label><br>
		<select name="txtType">
			<option value="Student">Student</option>
			<option value="Professor">	Professor</option>
		</select><br>

		<label >Uni ID :</label><br>
		<input type="text" name="txtUniId"><br>

		<label >Tel :</label><br>
		<input type="text" name="txtTel"><br>
		</div>
		<div>
		<label >Address :</label><br>
		<input type="text" name="txtAddress"><br>

		<label >E-mail :</label><br>
		<input type="text" name="txtMail"><br>

		<label >Password :</label><br>
		<input type="text" name="txtPassword"><br>

		<label >Re-type Password :</label><br>
		<input type="text" name="txtRePassword"><br>
		</div>
		<div><br><br><br><br>
			<input type="submit" name="btnClear" value="Clear">
			<input type="submit" name="btnAdd" value="Add Member">
		</div>
	</div>
</form>


<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>