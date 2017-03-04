<?php 

session_start();


 

if(isset($_SESSION['email']) && isset($_SESSION['password'])){

 
    echo '<script type="text/javascript">alert("Sorry already logged in logout and then login");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
 //   echo "welcome ".$_SESSION['email'];
 //  echo "<a href='page4.php'> logout</a> ";
  // echo " <a href='page3.php'> page3 </a>";
}else if(!isset($_COOKIE['email'])  ){

    echo '<script type="text/javascript">alert("*****UNAUTHORIZED ACCESS****");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';

}else if(!isset($_GET['email']) && !isset($_GET['hash'])){
     echo '<script type="text/javascript">alert("*-*-*-*-*UNAUTHORIZED ACCESS*-*-*-*");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
}else if(isset($_GET['email']) && isset($_GET['hash'])  && isset($_COOKIE['email']))
{









 $connect=@mysqli_connect('localhost','root','')or die('-----error----') ;
      
       $db =@mysqli_select_db($connect,'testdb')or die('---error-----');

       $email= $_GET['email'];
       $hash= $_GET['hash'];

       $query=mysqli_query($connect, "SELECT * FROM user WHERE email='$email'");
  $row=mysqli_fetch_assoc($query);
  
  $numrows=mysqli_num_rows($query);
if($numrows!=1){
    echo '<script type="text/javascript">alert("*-*-*-*-*UNAUTHORIZED ACCESS*-*-*-*");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';

      }else{

  $dbemail=$row['email'];
  $dbhash=$row['hash'];
if($dbemail==$email && $dbhash==$hash){

 

if(isset($_POST['password']) && isset($_POST['spassword'])   && !empty(trim(htmlentities($_POST['password']))) && !empty(trim(htmlentities($_POST['spassword']))) && trim(htmlentities($_POST['password'])) == trim(htmlentities($_POST['spassword']))  ){







$hash1= $_GET['hash'];
$email1=$_GET['email'];


$pemail= $_POST['password'];
$ppassword=$_POST['spassword'];

$pemail= preg_match("/[A-Za-z0-9@$#!&*]{6,40}$/", $pemail);
$ppassword=preg_match("/[A-Za-z0-9@$#!&*]{6,40}$/", $ppassword);


if(!$pemail || !$ppassword){
 echo '<script type="text/javascript">alert("Fill again");</script>';
        echo '<script type="text/javascript">window.location="forget1.php?email='.$email.'&hash='.$hash.'";</script>';
}


else{







$connect=@mysqli_connect('localhost','root','')or die('-----error----') ;
      
       $db =@mysqli_select_db($connect,'testdb')or die('---error-----');
$password= md5(trim(htmlentities($_POST['password'])));
$email=$_COOKIE['email'];
 
$checkquery="SELECT * FROM user WHERE email='$email'";
            $executequery=mysqli_query($connect,$checkquery) or die(mysqli_errno($connect));
            $numrows=mysqli_num_rows($executequery);
            //echo $numrows;
            if($numrows!=1){
                echo '<script type="text/javascript">alert("*-*-*-*-*UNAUTHORIZED ACCESS*-*-*-*");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
            }else{
                 $rand= md5(rand(20,90));
              $query="  UPDATE user set password='$password',hash='$rand' where email='$email'";
  //echo $query;
  $execute=mysqli_query($connect,$query) or die(mysqli_errno($connect));
 
        
       setcookie('email', '', time()-3600, '/');
 
  echo '<script type="text/javascript">alert(" GREAT your Password has been changed now login with the new password");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
            }



}


}



}else{
    echo '<script type="text/javascript">alert("*-*-*-*-*UNAUTHORIZED ACCESS*-*-*-*");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
 
}

 
}



}else{ 
  echo '<script type="text/javascript">alert("*^^^^*UNAUTHORIZED ACCESS****");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
}




  





 








     echo "<p style='font-size:24px;'>Welcome  <b style='font-size:30px;'>".$_COOKIE['email']."</b></p>";
    //  echo "<p style='font-size:24px;'>cookieeee  <b style='font-size:30px;'>".$_COOKIE['email11']."</b></p>";

?>




<!doctype html>

<html>


<head>


 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hardware: Forget Password</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">






<!-- All the files that are required -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />



<style>




/*------------------------------------------------------------------
[Master Stylesheet]

Project    	: Aether
Version		: 1.0
Last change	: 2015/03/27
-------------------------------------------------------------------*/
/*------------------------------------------------------------------
[Table of contents]

1. General Structure
2. Anchor Link
3. Text Outside the Box
4. Main Form
5. Login Button
6. Form Invalid
7. Form - Main Message
8. Custom Checkbox & Radio
9. Misc
-------------------------------------------------------------------*/
/*=== 1. General Structure ===*/
html,
body {
  background: #efefef;
  padding: 10px;
  font-family: 'Varela Round';
}
/*=== 2. Anchor Link ===*/
a {
  color: #aaaaaa;
  transition: all ease-in-out 200ms;
}
a:hover {
  color: #333333;
  text-decoration: none;
}
/*=== 3. Text Outside the Box ===*/
.etc-login-form {
  color: #919191;
  padding: 10px 20px;
}
.etc-login-form p {
  margin-bottom: 5px;
}
/*=== 4. Main Form ===*/
.login-form-1 {
  max-width: 300px;
  border-radius: 5px;
  display: inline-block;
}
.main-login-form {
  position: relative;
}
.login-form-1 .form-control {
  border: 0;
  box-shadow: 0 0 0;
  border-radius: 0;
  background: transparent;
  color: #555555;
  padding: 7px 0;
  font-weight: bold;
  height:auto;
}
.login-form-1 .form-control::-webkit-input-placeholder {
  color: #999999;
}
.login-form-1 .form-control:-moz-placeholder,
.login-form-1 .form-control::-moz-placeholder,
.login-form-1 .form-control:-ms-input-placeholder {
  color: #999999;
}
.login-form-1 .form-group {
  margin-bottom: 0;
  border-bottom: 2px solid #efefef;
  padding-right: 20px;
  position: relative;
}
.login-form-1 .form-group:last-child {
  border-bottom: 0;
}
.login-group {
  background: #ffffff;
  color: #999999;
  border-radius: 8px;
  padding: 10px 20px;
}
.login-group-checkbox {
  padding: 5px 0;
}
/*=== 5. Login Button ===*/
.login-form-1 .login-button {
  position: absolute;
  right: -25px;
  top: 50%;
  background: #ffffff;
  color: #999999;
  padding: 11px 0;
  width: 50px;
  height: 50px;
  margin-top: -25px;
  border: 5px solid #efefef;
  border-radius: 50%;
  transition: all ease-in-out 500ms;
}
.login-form-1 .login-button:hover {
  color: #555555;
  transform: rotate(450deg);
}
.login-form-1 .login-button.clicked {
  color: #555555;
}
.login-form-1 .login-button.clicked:hover {
  transform: none;
}
.login-form-1 .login-button.clicked.success {
  color: #2ecc71;
}
.login-form-1 .login-button.clicked.error {
  color: #e74c3c;
}
/*=== 6. Form Invalid ===*/
label.form-invalid {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 5;
  display: block;
  margin-top: -25px;
  padding: 7px 9px;
  background: #777777;
  color: #ffffff;
  border-radius: 5px;
  font-weight: bold;
  font-size: 11px;
}
label.form-invalid:after {
  top: 100%;
  right: 10px;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: transparent;
  border-top-color: #777777;
  border-width: 6px;
}
/*=== 7. Form - Main Message ===*/
.login-form-main-message {
  background: #ffffff;
  color: #999999;
  border-left: 3px solid transparent;
  border-radius: 3px;
  margin-bottom: 8px;
  font-weight: bold;
  height: 0;
  padding: 0 20px 0 17px;
  opacity: 0;
  transition: all ease-in-out 200ms;
}
.login-form-main-message.show {
  height: auto;
  opacity: 1;
  padding: 10px 20px 10px 17px;
}
.login-form-main-message.success {
  border-left-color: #2ecc71;
}
.login-form-main-message.error {
  border-left-color: #e74c3c;
}
/*=== 8. Custom Checkbox & Radio ===*/
/* Base for label styling */
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked,
[type="radio"]:not(:checked),
[type="radio"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label,
[type="radio"]:not(:checked) + label,
[type="radio"]:checked + label {
  position: relative;
  padding-left: 25px;
  padding-top: 1px;
  cursor: pointer;
}
/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before,
[type="radio"]:not(:checked) + label:before,
[type="radio"]:checked + label:before {
  content: '';
  position: absolute;
  left: 0;
  top: 2px;
  width: 17px;
  height: 17px;
  border: 0px solid #aaa;
  background: #f0f0f0;
  border-radius: 3px;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3);
}
/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after,
[type="radio"]:not(:checked) + label:after,
[type="radio"]:checked + label:after {
  position: absolute;
  color: #555555;
  transition: all .2s;
}
/* checked mark aspect changes */
[type="checkbox"]:not(:checked) + label:after,
[type="radio"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
[type="checkbox"]:checked + label:after,
[type="radio"]:checked + label:after {
  opacity: 1;
  transform: scale(1);
}
/* disabled checkbox */
[type="checkbox"]:disabled:not(:checked) + label:before,
[type="checkbox"]:disabled:checked + label:before,
[type="radio"]:disabled:not(:checked) + label:before,
[type="radio"]:disabled:checked + label:before {
  box-shadow: none;
  border-color: #8c8c8c;
  background-color: #878787;
}
[type="checkbox"]:disabled:checked + label:after,
[type="radio"]:disabled:checked + label:after {
  color: #555555;
}
[type="checkbox"]:disabled + label,
[type="radio"]:disabled + label {
  color: #8c8c8c;
}
/* accessibility */
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before,
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before {
  border: 1px dotted #f6f6f6;
}
/* hover style just for information */
label:hover:before {
  border: 1px solid #f6f6f6 !important;
}
/*=== Customization ===*/
/* radio aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  border-radius: 3px;
}
[type="radio"]:not(:checked) + label:before,
[type="radio"]:checked + label:before {
  border-radius: 35px;
}
/* selected mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '✔';
  top: 0;
  left: 2px;
  font-size: 14px;
}
[type="radio"]:not(:checked) + label:after,
[type="radio"]:checked + label:after {
  content: '\2022';
  top: 0;
  left: 3px;
  font-size: 30px;
  line-height: 25px;
}
/*=== 9. Misc ===*/
.logo {
  padding: 15px 0;
  font-size: 25px;
  color: #aaaaaa;
  font-weight: bold;
}




</style>
</head>
<body>








<!-- FORGOT PASSWORD FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">Reset Password</div>
  
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="forgot-password-form" class="text-left"  action="<?php echo'forget1.php?email='.$email.'&hash='.$hash;?>" method="POST">
			<div class="etc-login-form">
				<p style="position: relative;left:30px;">Enter your New Password</p>
			</div>
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="fp_email" class="sr-only" >New Password</label>
						<input type="password" class="form-control" id="password"  onkeyup="validatepassword();" name="password" placeholder="Password">
            <hr>
            <label for="fp_email" class="sr-only">Re-Type Password</label>
            <input type="password" class="form-control" id="spassword" onkeyup="validatespassword();" name="spassword" placeholder="re-type password">
            <label id="password1"></label>
					</div>
				</div>
				<button type="submit" class="login-button" onclick="validateform();"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>Back to home-page? <a href="home.php">Redirect to Home</a></p>
				
			</div>
		</form>
	</div>





<script type="text/javascript">
    







function validatepassword(){

var password= document.getElementById('password').value;
var spassword= document.getElementById('spassword').value;
if(password.length==0){
    print('<b>Password required</b>','red','password1');
    return false;
}
if(!password.match(/[A-Za-z0-9@$#!&*]{6,40}$/)){

print('<b>Password should be minimum 6 characters</b>','red','password1');
return false;
}
else if(password==spassword && password.match(/[A-Za-z0-9@$#!&*]{6,40}$/) ){
print('<b>Password Match</b>','green','password1');
return true;
}else if( password!=spassword && password.match(/[A-Za-z0-9@$#!&*]{6,40}$/)){
print('<b>Valid Password But not matching</b>','red','password1');


}else{
  print('<b>Invalid Password</b>','red','password1');


}

}



function validatespassword(){


var password= document.getElementById('password').value;
var spassword= document.getElementById('spassword').value;
if(password.length==0){
    print('<b>Password required</b>','red','password1');
    return false;
}
if( !(password==spassword) &&  !password.match(/[A-Za-z0-9@$#!&*]{6,40}$/)){

print('<b>Both password do no match !</b>','red','password1');
return false;
}else if( password==spassword &&  !password.match(/[A-Za-z0-9@$#!&*]{6,40}$/)){


print('<b>Password Match but Invalid !</b>','red','password1');
return false;
}else if( password==spassword &&  password.match(/[A-Za-z0-9@$#!&*]{6,40}$/)){

print('<b>Password Match</b>','green','password1');
return true;

}else{
  print('<b>Invalid Password</b>','red','password1');


}


}



function validateform(){

var email= document.getElementById("email").value;
var password= document.getElementById('password').value;

if(!validateemail()  ){
    console.log('nononono');
    print('<b>Invalid Form please Fill correctly</b>','red','form1');
      
//    return false;

}else{
    console.log('hiphiphip');
var submit= document.getElementById('form11').action;
submit = 'forget1.php';
print('<b>Valid Form</b>','green','form1');
return true;
}
}


function print(msg,color,id){
console.log('dammmmmm');

document.getElementById(id).innerHTML= msg;
document.getElementById(id).style.color= color;


}



</script>


















</body>

</html>