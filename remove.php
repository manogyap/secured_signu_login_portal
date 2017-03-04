<?php 
	
	
		$connect = mysqli_connect('localhost', 'root','') or die('error1111111111111111');
		$db =@mysqli_select_db($connect,'testdb') or die ('error2222222222222');

		$i=$_POST['id'];
		//$i = mysqli_escape_string($connect, $i);
		$q = "DELETE FROM user WHERE id = $i";
		$executequery=mysqli_query($connect,$q) or die(mysqli_errno($connect));
	
	
	
 ?>