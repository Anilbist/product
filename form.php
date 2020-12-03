<?php include'db.php';
	  include 'product.php';
session_start();
$database= new Datab;
$db = $database->connect();
$add= new product($db);
if(isset($_POST["submit"]))
{
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	$query =$add->user($Username,$Password);
	$count=$query->rowCount();
	
	if($count==1)
	
	{
		
		$_SESSION['username']= $Username;
		header("location:login.php");
	}
	else
	{
		echo "wrong username or password";
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action= "form.php" method="post">
		<input type="text" name = "username" placeholder="Username" required><br>
		<input type="password" name = "password" placeholder="Password" required><br>
		<input type="submit" name ="submit" value ="Login">
	</form>	
</body>
</html>