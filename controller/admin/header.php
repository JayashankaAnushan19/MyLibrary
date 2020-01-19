<!DOCTYPE html>
<html>
<head>
	<title>LMS: Admin/Librarian</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/drop_down.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/form.css">
</head>
<h1>Uni Library Management System</h1>

<h3 style="text-align: right;">
  <b>
  Welcome Admin </b>
  <a href="../../index.php"><input style="width: 100px; height: 30px; margin-bottom: 5px; border-radius: 8px;" type="submit" name="btnLogOut" value="Log Out"></a>
</h3>
<body>

	<nav>
    
		<ul>
			<li><a style="text-decoration: none;" href="../../view/admin/admin.php">Dashboard</a></li>
			<li><div class="dropdownM">
    				<span><a style="text-decoration: none;" href="../../view/books/add_books.php">Library Book Management</a></span>
       					<div class="dropdownM-content">
       					<ul>
         					<li><a style="text-decoration: none;" href="../../view/books/add_books.php">Add New Books</a></li>
         					<li><a style="text-decoration: none;" href="../../view/books/add_qty_books.php">Add Books to Stock</a></li>
                  <li><a style="text-decoration: none;" href="../../view/books/add_book_category.php">Add Book Category</a></li>
         					<li><a style="text-decoration: none;" href="../../view/books/update_books.php">Update Books Deteils</a></li>
         					<li><a style="text-decoration: none;" href="../../view/books/delete_books.php">Delete Books Deteils</a></li>
         				</ul>
       					</div>
    			</div>
    		</li>
			<li><div class="dropdownM">
    				<span><a style="text-decoration: none;" href="../../view/members/add_member.php">Member Management</a></span>
       					<div class="dropdownM-content">
       					<ul>
         					<li><a style="text-decoration: none;" href="../../view/members/add_member.php">Add Member</a></li>
         					<li><a style="text-decoration: none;" href="../../view/members/update_member.php">Update Member</a></li>
         					<li><a style="text-decoration: none;" href="../../view/members/delete_member.php">Delete Member</a></li>
         				</ul>
       					</div>
    			</div>
			</li>
			<li><div class="dropdownM">
    				<span><a style="text-decoration: none;" href="../../view/payments/view_members_panalty.php">Members Panalty Payment Management</a></span>
       					<div class="dropdownM-content">
       					<ul>
         					<li><a style="text-decoration: none;" href="../../view/payments/panaly.php">Panalty for a day</a></li>
         					<li><a style="text-decoration: none;" href="../../view/payments/view_members_panalty.php">View Members Panalty</a></li>
         				</ul>
       					</div>
			</li>
			<li><div class="dropdownM">
    				<span><a style="text-decoration: none;" href="../../view/issueReturn/view_issue_books.php">Issue/Return Management</a></span>
       					<div class="dropdownM-content">
       					<ul>
         					<li><a style="text-decoration: none;" href="../../view/issueReturn/borrowed_books.php">Borrowed Books</a></li>
         					<li><a style="text-decoration: none;" href="../../view/issueReturn/issue_books.php">Issue Books</a></li>
                  <li><a style="text-decoration: none;" href="../../view/issueReturn/view_issue_books.php">View Issued Books</a></li>
         					<li><a style="text-decoration: none;" href="../../view/issueReturn/return_books.php">Return Books</a></li>
         				</ul>
       					</div>
			</li>
			<li><div class="dropdownM">
    				<span><a style="text-decoration: none;" href="../../view/adminUpdate/adminUpdate.php">Profile Settings / Security</a></span>
       					<div class="dropdownM-content">
       					<ul>
         					<li><a style="text-decoration: none;" href="../../view/adminUpdate/adminUpdate.php">Profile Settings</a></li>
         					<li><a style="text-decoration: none;" href="../../view/adminUpdate/change_pass.php">Change Password</a></li>
         				</ul>
       					</div>
			</li>
		</ul>
	</nav>