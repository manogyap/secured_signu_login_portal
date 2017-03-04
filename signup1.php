<?php 

session_start();





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
        echo '<script type="text/javascript">window.location="signup.php";</script>';
}


else{


			$email=htmlentities(trim( $_POST['email']));
			$password= htmlentities(trim( $_POST['password']));
			$password=md5($password);
			
			$connect=@mysqli_connect('localhost','root','') ;
			if($connect)
			{
				$db =@mysqli_select_db($connect,'testdb');
				if($db)
				{

					


						$checkquery="SELECT * FROM user WHERE email='$email'";
						$executequery=mysqli_query($connect,$checkquery) or die(mysqli_errno($connect));
						$numrows=mysqli_num_rows($executequery);
						//echo $numrows;
						if($numrows>0)
						{
							echo '<script type="text/javascript">alert("User already exists");</script>';
							echo '<script type="text/javascript">window.location="home.php";</script>';
						}
						else
						{

							$query="INSERT INTO user (email,password) VALUES ('$email','$password')";
							//echo $query;
							$execute=mysqli_query($connect,$query) or die(mysqli_errno($connect));
							
							$_SESSION['email']= $email;
							$_SESSION['password']=$password;
	
							echo '<script type="text/javascript">window.location="page5.php";</script>';
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