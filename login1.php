<?php 






if(isset($_SESSION['email']) && isset($_SESSION['password'])){


    echo '<script type="text/javascript">alert("Sorry already logged in logout and then login");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
 //   echo "welcome ".$_SESSION['email'];
 //  echo "<a href='page4.php'> logout</a> ";
  // echo " <a href='page3.php'> page3 </a>";
}



?>
<?php 








	
		//echo $_POST['email'];

		
 	if(    !isset($_SESSION['email']) && !isset($_SESSION['password']) && isset($_POST['email']) && isset($_POST['password'])  &&
 		 !empty(trim($_POST['email'])) &&   !empty(trim($_POST['password'])))
 	{


 		$pemail= $_POST['email'];
$ppassword=$_POST['password'];

$pemail= preg_match("/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,6}$/", $pemail);
$ppassword=preg_match("/^[A-Za-z0-9_@$#!&*]{6,40}$/", $ppassword);


if(!$pemail || !$ppassword){
 echo '<script type="text/javascript">alert("Invalid Form Fill again");</script>';
        echo '<script type="text/javascript">window.location="login.php";</script>';
}


else{

 			$email=htmlentities(trim($_POST['email']));
			
			
			$connect=@mysqli_connect('localhost','root','') ;
			if($connect)
			{
				$db =@mysqli_select_db($connect,'testdb');
				if($db)
				{

					


						$query=mysqli_query($connect, "SELECT * FROM user WHERE email='$email'");
						$row=mysqli_fetch_assoc($query);
	
						$numrows=mysqli_num_rows($query);
						$dbpassword=$row['password'];
						$dbemail=$row['email'];
						
						$password= htmlentities(trim( $_POST['password']));
						$password=md5($password);
						 //$dbpassword=$dbpassword);
						if($numrows==1 && $password==$dbpassword){
							
							
							$_SESSION['email']=$row['email'];
							$_SESSION['password']=$row['password'];
							echo '<script type="text/javascript">alert("****Login Successful****");</script>';
							echo '<script type="text/javascript">window.location="page5.php";</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Login Unsuccessful");</script>';
							echo '<script type="text/javascript">window.location="home.php";</script>';
						}


				}else
				{

					/* die( '<script type="text/javascript">
					alert("----sorry cant connect--- ");
					window.location="home.php";</script>'); */
				}

			}else
			{
				die( '<script type="text/javascript">
				alert("---->>>sorry cant connect<<<--- ");
				window.location="home.php";</script>');	
			}

		
		}

	}
	else
	{

	echo '<script type="text/javascript">alert("Sorry already logged in or you tired to enter without entering credentials--UNAUTORIZED ACCESS");</script>';
		echo '<script type="text/javascript">window.location="home.php";</script>';

	}


?>