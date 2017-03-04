


<?php
session_start();
//https://www.youtube.com/watch?v=2IxiJVslK54&list=PL-lbf_8bVpgzc3DBIoAAKJj8GGUeTjwsQ
if(isset($_SESSION['email']) && isset($_SESSION['password'])){



    echo "welcome <b>".$_SESSION['email']." </b><br> <label>&nbsp<a href='user.php' > All Users</a></label> ";
   echo "<a href='page4.php'> logout</a> ";
   echo "<a href='page5.php'>page5</a>";
 //  echo " <a href='page3.php'> page3 </a>";
}else{

    echo "<h3 style='color:red;'><b> please SIGNUP bro or Login <br>   <label>&nbsp<a href='user.php' > All Users</a></label></b></h3>";
   
}


?>



<!DOCTYPE html>
<html>
<style >




	 button {

	 	border-radius: 40px;
	 	position: relative;
	 	left: 450px; top:-490px;
    background: #428BCA;
    color: #fff;
    font-family: Sans-serif;
    font-size: 50px;
    height: 90px;
    width: 250px;
    line-height: 60px;
    margin: 25px 25px;
    text-align: center;
    border: 0;
    transition: all 0.3s ease 0s;
}

body{

padding: 0;
margin: 0;

         
    position:fixed;
    top:0px;
    bottom:0px;
    left:0px;
    right:0px;


	background-color: rgba(251, 247, 18, 0.58);
}

button:hover {
  background: #CF4647;
}

</style>


<head>
	<title></title>
</head>
<body  >

<p style="position: relative;left: 400px; font-size: 150px;top:-110px;" >Home Page</p>




<div    style=" padding:20px; border-radius: 20px;  background-color: rgb(245, 121, 144);  border-color:white; height: 280px; width: 300px;position: relative;left: 1100px;top:-200px;">
<b>
<p style="font-size: 20px; color: white;"> Secured signup/Login portal</p>
<hr>
<p> -> Cross-Site scripting (XSS)</p>
<p> -> SQL Injection</p>
<p> -> mendling with links </p>
<p> -> Modern Reset password </p>
<p> -> All forms strictly<b><span style="color: red;">*</span> </b>validated</p>
<p> -> Google captcha (yet to be added)</p>
</b>
</div>


<?php
	if(isset($_SESSION['email']) && isset($_SESSION['password']))
	{

  			echo '<button style="position:relative; left:550px;"><a href="page4.php" style="text-decoration: none;color: white;">Logout</a></button>';
  			

	}else
	{

			echo '<button><a href="signup.php" style="text-decoration: none;color: white;">SignUp</a></button>';
  			echo'<button><a href="login.php" style="text-decoration: none;color: white;">Login</a></button>';


	}

  ?>
</body>



</html>