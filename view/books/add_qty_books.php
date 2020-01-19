<?php include('../../controller/admin/header.php'); ?>
<br>
<h3>Add Books to Stock</h3>
<br>
<form action="../../controller/books/add_book_qty.php" method="POST" >
	<div>
		<label >Book ID :</label><br>
		<input type="text" name="txtId"><br>
		<label >Qty :</label><br>
		<input type="text" name="txtQty" value="0"><br>
		<input type="submit" name="btnAdd" value="Add Count">
	</div>
</form>
<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>