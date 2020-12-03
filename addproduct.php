<?php 
session_start();
if(!isset($_SESSION['username']))

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
<body>
	<form action="formaction.php" method = "post" enctype="multipart/form-data">
		<table>
			
			<tr>
				<td>Product Name:</td>
				<td> <input type="text" name="p_name"></td>
			</tr>
			<tr>
				<td>Product Discription:</td>
				<td><input type="text" name="p_dis"></td>
			</tr>
			<tr>
				<td>Product Price:</td>
				<td> <input type="text" name="p_price"></td>
			</tr>
			<tr>
				<td>Product Image:</td>
				
					<td> <input type='file' name='p_image[]' multiple/>	</td>
			
			</tr>
			<tr>
				<td><input type="submit" name="add_p" value ="Add Product"></td>
			</tr>
		</table>
	</form>
</body>
</html>