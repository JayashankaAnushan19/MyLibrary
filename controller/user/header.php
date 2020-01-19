<!DOCTYPE html>
<html>
<head>
	<title>LMS: User</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/drop_down.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/studentSearch.css">
  <!--link rel="stylesheet" type="text/css" href="../../assets/css/form.css"-->
   
</head>



<!-- Get User ID -->
<?php 
  

  session_start();

  if (!empty($_SESSION)) {    

    $UserId=$_SESSION['UserId'];

    include('../../model/db_connection.php'); 

    $Connection = setConnection();

    $MmyCommand = "SELECT * FROM `tb_user` WHERE `user_id` ='$UserId'";

    $MRecoResult=mysqli_query($Connection, $MmyCommand);

    if ($MRecoResult) {

      $Mrecord = mysqli_fetch_assoc($MRecoResult);
      $UsersId=$Mrecord['user_id'];
      $UsersName=$Mrecord['user_f_name'];

      
    }
  } 
?>


<h1>Uni Library Management System</h1>
<h3 style="text-align: right;">
   
<b>
  Welcome<i><?php echo" ".($UsersName); ?>
  </i></b>
  <a href="../../index.php"><input style="margin-left: 10px; width: 100px; height: 30px; margin-bottom: 5px; border-radius: 8px; outline: none;" type="submit" name="btnLogOut" value="Log Out"></a>
  </h3>
<body>



<nav> 
		<ul>
			<li><a style="text-decoration: none;" href="../../view/user/user.php">Dashboard</a></li>
			<li><div class="dropdownM">
    				<span><a style="text-decoration: none;" href="../../view/books/search_Books.php">Search and Book Management</a></span>
       					<div class="dropdownM-content">
       					<ul>
         					<li><a style="text-decoration: none;" href="../../view/books/search_Books.php">Search Books</a></li>
         					<li><a style="text-decoration: none;" href="../../view/books/borrow_books.php">Borrow Books</a></li>
         				</ul>
       					</div>
    			</div>
    		</li>
			<li><div class="dropdownM">
    				<span><a style="text-decoration: none;" href="../../view/issueReturn/user_return_avaliable_books.php">Payments Management</a></span>
       					<div class="dropdownM-content">
       					<ul>
         					<li><a style="text-decoration: none;" href="../../view/issueReturn/user_return_avaliable_books.php">Books and Panalty</a></li>
         				</ul>
       					</div>
    			</div>
			</li>
			<li><div class="dropdownM">
    				<span><a style="text-decoration: none;" href="../../view/userUpdate/user_profile.php">Profile Settings / Security</a></span>
       					<div class="dropdownM-content">
       					<ul>
         					<li><a style="text-decoration: none;" href="../../view/userUpdate/user_profile.php">Profile Settings</a></li>
         					<li><a style="text-decoration: none;" href="../../view/userUpdate/userPassChange.php">Change Password</a></li>
         				</ul>
       					</div>
			</li>
		</ul>
</nav>
