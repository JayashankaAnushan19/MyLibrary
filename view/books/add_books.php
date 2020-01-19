<?php include('../../controller/admin/header.php'); ?>
<br>
<h3>Add New Book </h3>
<br>
<form action="../../controller/books/add_new_book.php" method="POST" >
	<div>	
		<label >Name :</label><br>
		<input type="text" name="txtName"><br>
		<label >Author :</label><br>
		<input type="text" name="txtAuthor"><br>
		<label >Category :</label><br>
		<input type="text" name="txtCategory"><br>
		<input type="submit" name="btnAdd" value="Add New Book">
	</div>
</form>
<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>