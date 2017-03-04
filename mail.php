<?php
session_start();

ob_start();

if(isset($_SESSION['email']) && isset($_SESSION['password'])){

    echo '<script type="text/javascript">alert("Sorry already logged in logout and then login");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
 //   echo "welcome ".$_SESSION['email'];
 //  echo "<a href='page4.php'> logout</a> ";
  // echo " <a href='page3.php'> page3 </a>";
}


?>
<?php




$pemail= $_POST['email'];
//$ppassword=$_POST['password'];

$pemail= preg_match("/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,6}$/", $pemail);
//$ppassword=preg_match("/[A-Za-z0-9@$#!&*]{6,40}$/", $ppassword);


if(!$pemail  ){
 echo '<script type="text/javascript">alert("Invalid Form Fill again");</script>';
        echo '<script type="text/javascript">window.location="forget.php";</script>';
}


else{






$email=trim(htmlentities($_POST['email']));
$connect=@mysqli_connect('localhost','root','') or die("Connection Error");
$db =@mysqli_select_db($connect,'testdb');
$qry1="SELECT * from user where email='$email'";
$executequery=mysqli_query($connect,$qry1) or die(mysqli_errno($connect));
  $row = mysqli_fetch_assoc($executequery);
  $password=$row['password'];
  if($email==$row['email']){
  //	$db =@mysqli_select_db($connect,'testdb');
 
//	$checkquery="SELECT * FROM user WHERE email='$email'";
	
	

echo "1-";

//composer require phpmailer;
require './PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
//echo "MG";
//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password  
echo "1---";   
$mail->Username = "manomukul@gmail.com"; 
echo "1--------";                
$mail->Password = "manomukul1234"; 

echo "1--------------------";                          
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   
echo "1------------------------------------";
$mail->From = $_POST['email'];
$mail->FromName = "manoooo";
echo "1------------------------------------------------------------";
$mail->addAddress($email, "manooo");

$mail->isHTML(true);
$hash= rand(1000,2000);
$hash= md5($hash);
echo "1";



			$connect=@mysqli_connect('localhost','root','') ;
			
				$db =@mysqli_select_db($connect,'testdb');
				


$checkquery="UPDATE user SET hash= '$hash' where email='$email'";
//$checkquery="SELECT * FROM user WHERE email='$email'";
						$executequery=mysqli_query($connect,$checkquery) or die(mysqli_errno($connect));
						//$numrows=mysqli_num_rows($executequery);
						//echo $numrows;
						


$mail->Subject = " 	email to reset your Password";
$mail->Body = "You Forgot Your Password to reset your Password click on the below given link <br>  http://localhost:8080/practise1/forget1.php?email=".$email."&hash=".$hash;
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
	
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{ setcookie('email',$_POST['email'],time()+3600,'/');

   echo '<script type="text/javascript">alert("mail has been sent to your mail");</script>';
							echo '<script type="text/javascript">window.location="home.php";</script>';
}



}


	
}	

 

?>