<?php include('../../controller/user/header.php'); 

$user = $_SESSION['UserId'];

?>

<br>
<h3>Change Password</h3>
<br>
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


<form action="../../controller/userUpdate/userPassChange.php" method="POST">
	<input type="hidden" name="txtid" value="<?php echo($user) ?>">
	<label>Enter Old Password</label><br>
	<input type="text" name="txtoldPass"><br>
	<label>Enter New Password</label><br>
	<input type="text" name="txtnewPass"><br>
	<label>Re-type Password</label><br>
	<input type="text" name="txtretypePass"><br>
	<div>
		<input type="submit" name="btnChange" value="Change Password">
	</div>
</form>



<br><br><br><br><br><br><br> <!-- $_SESSION['UserId'] -->
<?php include('../../controller/user/footer.php'); ?>