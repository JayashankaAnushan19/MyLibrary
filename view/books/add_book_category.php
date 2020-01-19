<?php include('../../controller/admin/header.php'); ?>
<br>
<h3>Add New Book Category</h3>
<br>
<form action="../../controller/books/add_category.php" method="POST" >
	<div>
		<label >Book ID :</label><br>
		<input type="text" name="txtCatID"><br>	
		<label >Name :</label><br>
		<input type="text" name="txtCatName"><br>
		<input type="submit" name="btnAdd" value="Add"><br>
		<input type="submit" name="btnUpdate" value="Update"><br>
		<input type="submit" name="btnDelete" value="Delete">
	</div>
</form>
<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>