<?php 

session_start();
if(isset($_SESSION['username']))
{
	echo "welcome".' '.$_SESSION['username'];
}
else
{
	header('location:form.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<h1>PRODUCTS</h1>
<body>
	<a href="addproduct.php">Add Product</a><br>
	<a href="list.php">List</a><br>
	<a href="logout.php">Logout</a>
	
</body>
</html>