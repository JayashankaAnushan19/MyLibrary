<?php 


include('model/db_connection.php'); 

$txtAdminUserName="";
$txtAdminPass="";
$txtStudentUserName="";
$txtStudentPass="";
$txtProfessUserName="";
$txtProfessPass="";
$txtSignUpFName="";
$txtSignUpLName="";
$txtSignUpTel="";
$txtSignUpPass="";
$txtSignUpRePass="";

$Connection = setConnection();


if (isset($_POST['btnAdminLogin'])) {

  try
  {
    $uname=$_POST['txtAdminUserName'];
    $password=$_POST['txtAdminPass'];

    $myCommand = "SELECT * FROM `tb_librarian` WHERE `librarian_mail`='".$uname."'  AND `librarian_password`='".$password."' LIMIT 1"; //SQL Query
    $RecoResult=mysqli_query($Connection, $myCommand); //Run SQL Query

    if (mysqli_num_rows($RecoResult)==1) {

      header("location:view/admin/admin.php");
    }
    else {
      echo "<script type='text/javascript'>alert('Password and Username error !!')</script>";

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

elseif (isset($_POST['btnStudentLogin'])) {

  try
  {
    $suname=$_POST['txtStudentUserName'];
    $spassword=$_POST['txtStudentPass'];

    $myCommand = "SELECT * FROM `tb_user` WHERE `user_mail`='".$suname."'  AND `user_password`='".$spassword."' AND `user_type`='Student' LIMIT 1"; //SQL Query
    $RecoResult=mysqli_query($Connection, $myCommand); //Run SQL Query

    if (mysqli_num_rows($RecoResult)==1) {

      $record = mysqli_fetch_assoc($RecoResult);
      
      session_start();
      $IDuser=$record['user_id'];
      $_SESSION['UserId']=$IDuser;

      header("location:view/user/user.php");
    }
    else {
      echo "<script type='text/javascript'>alert('Student Password and Username error !!')</script>";

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
elseif (isset($_POST['btnProfeLogin'])) {

  try
  {
    $funame=$_POST['txtProfessUserName'];
    $fpassword=$_POST['txtProfessPass'];

    $myCommand = "SELECT * FROM `tb_user` WHERE `user_mail`='".$funame."'  AND `user_password`='".$fpassword."' AND `user_type`='Professor' LIMIT 1"; //SQL Query
    $RecoResult=mysqli_query($Connection, $myCommand); //Run SQL Query

    if (mysqli_num_rows($RecoResult)==1) {

      $record = mysqli_fetch_assoc($RecoResult);
      
      session_start();
      $_SESSION['UserId']=$record['user_id'];

      header("location:view/user/user.php");
    }
    else {
      echo "<script type='text/javascript'>alert('Professor Password and Username error !!')</script>";

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






<!DOCTYPE html>
<html>
<head>
	<title>LMS Uni</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/form.css">
	<!--
	
	<link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/drop_down.css">
  	<link rel="stylesheet" type="text/css" href="../../assets/css/form.css">
   
   -->

</head>
<h1>Uni Library Management System</h1>


<style>
	form { padding-top: 50px; padding-bottom: 50px; }

	input[type="submit"]{ margin-top: 50px; height: 40px; border-radius: 10px; outline: none; width: 150px; font-size: 15px; font-style: Segoe UI; }

	input[type="submit"]:hover { cursor: pointer; background-color: #9999cc; }

	label { font-size: 20px; }

	button{ margin-top: 50px; height: 40px; border-radius: 10px; outline: none; width: 300px; font-size: 15px; font-style: Segoe UI; }

	button:hover { cursor: pointer; background-color: #9999cc; }

	h1 { background-color: #cccccc; padding-top: 5px; padding-bottom: 5px; padding-left: 10px;}

  select 
  {
    padding-left: 10px;
    padding: 0.5px;
    font-size: 15px; 
    font-style:Segoe UI;
    width: 100%;
    height: 40px;
    outline: none;
    margin-top: 5px;
    margin-bottom: 10px;
    background-color: transparent;
    padding: 10px 20px;
  }

	.container {
	  	position: relative;
	  	width: 700px;
  	}

	.image {
	  display: block;
	  width: 700px;
	  height: 450px;
	}

	.overlay {
	  position: absolute;
	  bottom: 0;
	  left: 0;
	  right: 0;
	  background-color: #008CBA;
	  overflow: hidden;
	  width: 0;
	  height: 100%;
	  transition: .5s ease;
	}

	.container:hover .overlay {
	  width: 100%;
	}

	.text {
	  color: white;
	  font-size: 20px;
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  -webkit-transform: translate(-50%, -50%);
	  -ms-transform: translate(-50%, -50%);
	  transform: translate(-50%, -50%);
	  white-space: nowrap;
	}


 /*Copied from / Start*/
	.container1 {
  padding: 16px;
  }

  input[type=text], input[type=password] {
  width: 100%;
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  }

  span.psw {
  float: right;
  padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: scroll; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
  background-color: #fefefe;
  margin: auto;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button (x) */
  .close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
  }

  .close:hover,
  .close:focus {
  color: red;
  cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
  }
  
  @keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
</style>

<body>

<center>
<div class="container">
  <img src="assets/img/MainBG.jpg" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">
		<label>Welcome to University Library management System</label><br>

		<input onclick="document.getElementById('id01').style.display='block'" type="submit" name="txtAdmin" value="Admin Log">

		<input onclick="document.getElementById('id02').style.display='block'" type="submit" name="txtStudent" value="Student Log">

		<input onclick="document.getElementById('id03').style.display='block'" type="submit" name="txtProfessor" value="Professor Log"><br><br>

		Don't have an account? <a onclick="document.getElementById('id05').style.display='block'" style="text-decoration:none;" href="#">Sign Up</a>
    </div>
  </div>
</div>
</center>



<!-- Tempory button start -->
<?php
	echo '<center>';
	echo '<a style="text-decoration:none;" href="view/admin/admin.php"><button>Admin</button></a> ';
	echo '<a style="text-decoration:none;" href="view/user/user.php"><button>User</button></a><br><br><br>';
	

	echo '<a style="text-decoration:none;" href="view/admin/admin.php">Admin</a> ';
	echo '<a style="text-decoration:none;" href="view/user/user.php">User</a>';
	echo '</center>';
?>
<!-- Tempory button end -->




<!-- Admin -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" action="#" method="POST">
    <div class="container1">
      <h1 style="margin-top: -35px; margin-bottom: 50px;">Admin Loging</h1>
      <label>Username</label><br>
      <input type="text" placeholder="Enter Username" name="txtAdminUserName" required value="<?php echo($txtAdminUserName) ?>"><br>

      <label>Password</label><br>
      <input type="password" placeholder="Enter Password" name="txtAdminPass" required value="<?php echo($txtAdminPass) ?>"><br>
        

      <button style="background-color: red; width: 500px; margin-left: 10px; height: 50px;" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

      <button style="background-color: #4CAF50; width: 500px; margin-left: 10px; height: 50px;" type="submit" name="btnAdminLogin" value="Login">Login</button><br>
    </div>
  </form>
</div>

<!-- Student -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" action="#" method="POST">
    <div class="container1">
      <h1 style="margin-top: -35px; margin-bottom: 50px;">Student Loging</h1>
      <label>Username</label><br>
      <input type="text" placeholder="Enter Username" name="txtStudentUserName" required value="<?php echo($txtStudentUserName) ?>"><br>

      <label>Password</label><br>
      <input type="password" placeholder="Enter Password" name="txtStudentPass" required value="<?php echo($txtStudentPass) ?>"><br>
        

      <button style="background-color: red; width: 500px; margin-left: 10px; height: 50px;" type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      
      <button style="background-color: #4CAF50; width: 500px; margin-left: 10px; height: 50px;" type="submit" name="btnStudentLogin" value="Login">Login</button><br>
    </div>
  </form>
</div>

<!-- Professor -->
<div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" action="#" method="POST">
    <div class="container1" >
      <h1 style="margin-top: -35px; margin-bottom: 50px;">Professor Loging</h1>
      <label>Username</label><br>
      <input type="text" placeholder="Enter Username" name="txtProfessUserName" required value="<?php echo($txtProfessUserName) ?>"><br>

      <label>Password</label><br>
      <input type="password" placeholder="Enter Password" name="txtProfessPass" required value="<?php echo($txtProfessPass) ?>"><br>
        

      <button style="background-color: red; width: 500px; margin-left: 10px; height: 50px;" type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
      
      <button style="background-color: #4CAF50; width: 500px; margin-left: 10px; height: 50px;" type="submit" name="btnProfeLogin" value="Login">Login</button><br>
    </div>
  </form>
</div>

<!-- Signup -->
<div id="id04" class="modal">
  <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" action="#" style="padding: 1px; margin-top: -55px;" method="POST">
    <div class="container1" style=" margin-top: -25px;">
      <h1>Sign Up</h1>
      <h4 style="margin-top: -25px; margin-bottom: 5px; background-color: #c5c5c6; padding-top: 5px; padding-bottom: 5px; padding-left: 10px;">( Please fill in this form to create an account. )</h4>
      <hr>
      <label>First Name</label><br>
      <input type="text" placeholder="Enter First Name" name="txtSignUpFName" required value="<?php echo($txtSignUpFName) ?>"><br>

      <label>Last Name</label><br>
      <input type="text" placeholder="Enter Last Name" name="txtSignUpLName" required value="<?php echo($txtSignUpLName) ?>"><br>

      <label>Tel</label><br>
      <input type="text" placeholder="Enter Tel" name="txtSignUpTel" required value="<?php echo($txtSignUpTel) ?>"><br>

      <label >Type :</label><br>
      <select name="txtType">
      <option value="Student">Student</option>
      <option value="Professor">  Professor</option>
      </select><br>

      <label>Password</label><br>
      <input type="password" placeholder="Enter Password" name="txtSignUpPass" required value="<?php echo($txtSignUpPass) ?>"><br>
      
      <label>Re-Type Password</label><br>
      <input type="password" placeholder="Re-Type Password" name="txtSignUpRePass" required value="<?php echo($txtSignUpRePass) ?>"><br>

      <button style="margin-top: 10px; background-color: red; width: 500px; margin-left: 10px; height: 40px;" type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
      
      <button style="margin-top: 10px; background-color: #4CAF50; width: 500px; margin-left: 10px; height: 40px;" type="submit" name="btnSignUpSubmit" value="Submit"><a onclick="document.getElementById('id05').style.display='block'" style="text-decoration:none;" href="#">Create Account</a> Account</button><br>
    </div>
  </form>
</div>


<!-- Successful message -->
<div id="id05" class="modal">
  <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" action="#" style="padding: 1px; margin-top: -55px;" method="POST">
    <div class="container1" style=" margin-top: -25px;">
      <h1>Successfuly Account Created</h1>
      <h3 style="margin-top: -25px; margin-bottom: 5px; background-color: #c5c5c6; padding-top: 5px; padding-bottom: 5px; padding-left: 10px;">Welcome Akila Kariyawasam !!!</h3> <br>
      <h4 style="margin-top: -25px; margin-bottom: 5px; background-color: #c5c5c6; padding-top: 5px; padding-bottom: 5px; padding-left: 10px;">Successful account created and please log using entered password</h4>      
    </div>
  </form>
</div>


<!-- 

<a onclick="document.getElementById('id04').style.display='block'" style="text-decoration:none;" href="#">Create Account</a>

 -->




<!-- Test Code -->
<?php 

?>

















<script>
	// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

  // Get the modal
  var modal2 = document.getElementById('id02');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal2) {
          modal2.style.display = "none";
      }
  }

  // Get the modal
  var modal3 = document.getElementById('id03');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal3) {
          modal3.style.display = "none";
      }
  }
</script>

</body>
<hr width="100%" style="background-color: #666666; padding-top: 1px; margin-top: 15px;">
<footer>
	<center>
		Copyright © 2019 LMS cloud All rights reserved. <br>
		Facebook.com/LMS/home <br>
		More info. unilms.com/help<br>
		Tel: 555 555 5555
	</center>	
</footer>
</html>