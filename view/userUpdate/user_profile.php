<?php include('../../controller/user/header.php'); 
// $_SESSION['UserId'];?>
<?php 
  

  if (!empty($_SESSION)) {    

    $UserId=$_SESSION['UserId'];

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

    $MmyCommand = "SELECT * FROM `tb_user` WHERE `user_id` ='$UserId'";

    $MRecoResult=mysqli_query($Connection, $MmyCommand);

    if ($MRecoResult) {

      $Mrecord = mysqli_fetch_assoc($MRecoResult);
      $UID=$Mrecord['user_id'];
      $FName=$Mrecord['user_f_name'];
      $LName=$Mrecord['user_l_name'];
      $UniId=$Mrecord['user_uni_id'];
      $Tel=$Mrecord['user_tel'];
      $Add=$Mrecord['user_address'];
      $Mail=$Mrecord['user_mail'];

      
    }
  } 
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

<br>

<h3> <?php echo"(".($FName).")'s  " ?> Profile Details</h3>
<br>
<!-- Start profile settings -->

<form action="#" method="POST">
	<div style="float: left;">
	<input type="hidden" name="txtUID" value="<?php echo($UID) ?>">
	<label>First Name:</label><br>
	<input type="text" name="txtFName" value="<?php echo($FName) ?>"><br>

	<label>Last Name:</label><br>
	<input type="text" name="txtLName" value="<?php echo($LName) ?>"><br>

	<label>University ID:</label><br>
	<input type="text" name="txtUniId" value="<?php echo($UniId) ?>"><br>

	</div>
	<div>		
	
	<label>Tel:</label><br>
	<input type="text" name="txtTel" value="<?php echo($Tel) ?>"><br>

	<label>Address:</label><br>
	<input type="text" name="txtAdd" value="<?php echo($Add) ?>"><br>

	<label>E-Mail:</label><br>
	<input type="text" name="txtMail" value="<?php echo($Mail) ?>"><br>

	</div>
	<input type="submit" name="btnUpdate" value="Update">
</form>



<br><br><br><br><br><br><br> <!-- $_SESSION['UserId'] -->
<?php include('../../controller/user/footer.php'); ?>