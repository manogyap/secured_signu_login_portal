




<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 1000px;
    height: 300px;
    border-radius: 20px;
    position: relative;
    left: 270px; top: -50px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
button{
position: relative;left: 30px;top: 10px;


}
</style>
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<a href='home.php'> Home</a> 

<b><p style="font-size: 50px; color: red; position: relative;left: 650px;"> U s e r s </p></b>
<br><br><br>



<?php



		
	$connect= mysqli_connect("localhost","root","") or die('error');
	
	$db =@mysqli_select_db($connect,'testdb') or die ('error');

	$checkquery= "SELECT * FROM user ";
	
	$executequery=mysqli_query($connect,$checkquery) or die(mysqli_errno($connect));
	$numrows=mysqli_num_rows($executequery);

	while($row =mysqli_fetch_assoc($executequery))
      $cartsolutions[] = $row;

  		echo" <table><tr><th>id</th><th>email</th><th>password</th><th>Remove</th></tr>";


	for($i=0;$i<$numrows;$i++){

		echo "<tr><td>".$cartsolutions[$i]['id']."</td><td>".$cartsolutions[$i]['email']."</td><td>".$cartsolutions[$i]['password']."</td><td><button  name='".$cartsolutions[$i]['id']."' id='remove' style='color:white; background-color:red;border-radius:10px;'>X</button></td></tr>";


		//echo "id = ".$cartsolutions[$i]['id']." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp email = ".$cartsolutions[$i]['email']."  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    password = ".$cartsolutions[$i]['password']."<br><br><br>";

	}


echo "</table>";




?>


<script>

$(document).on('click', '#remove', function(e){
      var id= parseInt(e.currentTarget.name);
      console.log(id);
      var urlString="id="+id;
      $.ajax
      ({
  url: "remove.php",

  type : "POST",
  cache : false,
  data : urlString,
  success: function(response)
  {
    window.location="user.php";
  //alert(response);
  //window.location="getjsondata.php";
  },
  complete: function(response)
  {
   // alert("Removed");
    response;
  },
  error: function(response)
  {
    alert(response+"ERROR IN AJAX");
  }

  });


  });


</script>

</body>
</html>
























