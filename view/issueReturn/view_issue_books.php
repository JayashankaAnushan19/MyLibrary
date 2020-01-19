<?php include('../../controller/admin/header.php'); ?>

<style>
	table {border:2px solid black; font-size: 18px;}
	th { background-color: #999999; padding-top: 8px; padding-left: 20px; padding-right: 20px;}
	td { background-color: #ccccff; padding-top: 8px; padding-left: 20px; padding-right: 20px;}
</style>
 
<br>
<h3>Issued Books</h3><br>
<form>
<?php 

include('../../model/db_connection.php'); 

$Connection = setConnection();

$myBoCommand = "SELECT * FROM `tb_order`";
$BoResult=mysqli_query($Connection, $myBoCommand);

$table='<table>';
$table.='<tr><th>Order ID</th><th>Customer ID</th><th>Customer Name</th></tr>';

while ($record = mysqli_fetch_assoc($BoResult)) 
{

$OrderId=$record['order_id'];
$CustomerId=$record['order_cus_id'];

$myBoCommand = "SELECT * FROM `tb_customer` WHERE `customer_id`='$CustomerId'";
$CusResult=mysqli_query($Connection, $myBoCommand);

$Cusrecord = mysqli_fetch_assoc($CusResult)

	$OrderId=$record['order_id'];
	$CustomerId=$record['order_cus_id'];
	$CustomerName=$Cusrecord['customer_name'];

	$table.='<tr>';
	$table.='<td>'.$OrderId.'</td>';
	$table.='<td>'.$CustomerId.'</td>';
	$table.='<td>'.$CustomerName.'</td>';
	$table.='</tr>';

}
$table.='</table>';

echo $table;

?>
</form>
<br><br><br><br><br><br><br>
<?php include('../../controller/admin/footer.php'); ?>