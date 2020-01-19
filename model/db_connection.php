<?php 

function setConnection()
{
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

	return $conn;
}

function runQuary($myCommand="",$msg="")
{
	$Connection = setConnection();

	try
	{
		if (mysqli_query($Connection, $myCommand)) {
			echo "<script type='text/javascript'>alert('{$msg}')</script>";
		}
		else {
			echo "Error ". mysqli_error($Connection);

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

function runSearchQuary($myCommand="")
{
	$Connection = setConnection();

	try
	{

		if (mysqli_query($Connection, $myCommand)) {
			$record = mysqli_fetch_assoc(mysqli_query($Connection, $myCommand));
			
		}
		else {
			echo "Error ". mysqli_error($Connection);

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

	return print_r($record);
}

?>