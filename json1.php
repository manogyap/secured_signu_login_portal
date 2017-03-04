<?php 


$name = $_GET['sap_id'];

		//echo" sap id is = ".$name;


$connect=@mysqli_connect('localhost','root','') ;
$db =@mysqli_select_db($connect,'otpdb');

$query="INSERT INTO hello (name) VALUES ('$name')";
							//echo $query;
							$execute=mysqli_query($connect,$query) or die(mysqli_errno($connect));

		


?>