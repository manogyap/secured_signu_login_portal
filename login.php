

<?php





session_start();

if(isset($_SESSION['email']) && isset($_SESSION['password'])){


    echo '<script type="text/javascript">alert("Sorry already logged in logout and then login");</script>';
        echo '<script type="text/javascript">window.location="home.php";</script>';
 //   echo "welcome ".$_SESSION['email'];
 //  echo "<a href='page4.php'> logout</a> ";
  // echo " <a href='page3.php'> page3 </a>";
}else{

    echo " <p style='color:yellow; font-size:20px;'><b>please Login bro </b><a href='home.php' style='color:white;font-size:30px;'> Home</a></p> ";
}









?>



















<html>
<style>

@import "compass/css3";


body{


padding: 0;
margin: 0;

         
    position:fixed;
    top:0px;
    bottom:0px;
    left:0px;
    right:0px;

    
}


form {position: relative; left:450px;top:-100px; border-radius: 10px;

    border: solid;
    border-color: white;
    border-width: 4px;
     height:500px;width: 600px;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    
    box-sizing: border-box;
     border-radius: 30px;
    border: solid;
    border-color: white;
    border-width: 4px;
}

button {
    border-radius: 10px;
    border: solid;
    border-color: white;
    border-width: 4px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;


 


   
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body  style="background-color:rgba(81, 48, 241, 0.84); ">

<h2 style="position: relative;left:570px;font-size: 70px;top:-50px;">Login Form</h2>

<form action="login1.php" method="POST" style="background-color:rgba(255, 255, 255, 0.54);">
  
  <div class="container">
    <label><b>Username</b></label>
    
    <input type="text" placeholder="email" id="email" onkeyup="validateemail();" name="email" >
    <label id= "email1"></label> 
    <br><br><br><br>
    <label><b>Password</b></label>
    <input type="password" placeholder="password" id="password"  onkeyup="validatepassword();"  name="password" >
     <label id="password1"></label>
         <br><a href="forget.php" style="position: relative;left:380px; font-size: 25px;">Forget Password <b>?</b></a><br><br><br>
    <button type="submit" onclick="validateform();">LOGIN</button>
     <label  id="form1"></label>
  
  </div>
<br><br>
<a href="signup.php" style="position: relative;left:440px; font-size: 25px;"><b>else SignUp?</b>
  
</form>
















<script type="text/javascript">
    





function validateemail(){

var email= document.getElementById("email").value;

if(email.length==0){
    print("<b>Email required</b>","red","email1");
    return false;
}
if(!email.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,6}$/)){

print("<b>Not a valid email</b>","red","email1");
return false;
}

print("<b>Valid Email</b>","green","email1");
return true;


}




function validatepassword(){

var password= document.getElementById('password').value;

if(password.length==0){
    print('<b>Password required</b>','red','password1');
    return false;
}
if(!password.match(/^[A-Za-z0-9@$#!&*]{6,40}$/)){

print('<b>Password should be minimum 6 characters</b>','red','password1');
return false;
}

print('<b>Valid Password</b>','green','password1');
return true;


}



function validateform(){

var email= document.getElementById("email").value;
var password= document.getElementById('password').value;

if(!validateemail()  || !validatepassword() ){
    console.log('nononono');
    print('<b>Invalid Form please Fill correctly</b>','red','form1');
      
//    return false;

}else{
    console.log('hiphiphip');
var submit= document.getElementById('form11').action;
submit = 'login1.php';
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

