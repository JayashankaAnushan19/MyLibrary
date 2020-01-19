<?php include('../../controller/user/header.php'); ?>
 
<br>
<h3>Search books</h3>
<br>

<input type="text" id="myInput" onkeyup="myFunction(0)" placeholder="Search Books by ID /Name/ Category/ Author.." title="Type in a name">


<!--  Insert books table  -->

<?php 

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

$myBoCommand = "SELECT * FROM `tb_books`";
$BoResult=mysqli_query($Connection, $myBoCommand);

echo " <br><br>";
$table='<table id="myTable" >';
$table.='<tr><th>Book ID</th><th>Book Name</th><th>Author</th><th>Category</th><th>Quantity</th></tr>';

while ($record = mysqli_fetch_assoc($BoResult)) 
{
  $Id=$record['books_id'];
  $Name=$record['books_name'];
  $Author=$record['books_author'];
  $Category=$record['books_category'];
  $Qty=$record['books_qty'];

  $table.='<tr>';
  $table.='<td>'.$Id.'</td>';
  $table.='<td>'.$Name.'</td>';
  $table.='<td>'.$Author.'</td>';
  $table.='<td>'.$Category.'</td>';
  $table.='<td>'.$Qty.'</td>'; 
  $table.='</tr>';

}
$table.='</table>';
echo $table;
?>

<!--  End Inserted book table  -->

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<?php include('../../controller/user/footer.php'); ?>