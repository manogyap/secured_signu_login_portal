
<?php

session_start();

if(isset($_SESSION['email']) && isset($_SESSION['password'])){



    echo "welcome <b>".$_SESSION['email']."</b>";
   echo "<a href='page4.php'> logout</a> ";
 //  echo " <a href='page3.php'> page3 </a>";
}else{

   echo '<script type="text/javascript">alert("login first or signup first");</script>';
							echo '<script type="text/javascript">window.location="home.php";</script>';
}



?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<p> all connected brooooooooo</p>
<br>

<a href="home.php">home</a>


	<button name= "red" id="red">Red</button>
	<button name= "green" id="green">Green</button>
	<button name= "blue" id="blue">Blue</button>
	<button name= "yellow" id="yellow">Yellow</button>







<script>



	$(document).ready(function(){
		$("#red").click(function(){
			$("body").css({"background-color":"red"   });
		});

		$("#green").click(function(){
			$("body").css({"background-color":"green"   });
		});


		$("#yellow").click(function(){
			$("body").css({"background-color":"yellow"   });
		});


		$("#blue").click(function(){
			$("body").css({"background-color":"blue"   });
		});




	});


	


	








</script>




















</body>
</html>