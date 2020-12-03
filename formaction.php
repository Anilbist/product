<?php
		include 'db.php';
	  	include 'product.php';
		$database= new Datab;
		$db = $database->connect();
		$add= new product($db);
//addproduct
 		if (isset($_POST['add_p']))
     	 {
	      	$Name = $_POST['p_name'];
	      	$Disp = $_POST['p_dis'];
	      	$Price = $_POST['p_price'];
	      	$query=$add->insert($Name,$Disp,$Price);
      	if($query )
 	  		{
         	
         		header('location:login.php'); 
        	}
         else
         	{
         		echo "failed";
         	}
 		}



//update
	                                                                                                                                                                                             
	if (isset($_POST["update"]))
	{	 
		$Pro_sn=$_POST['Id'];
		$Pro_name=$_POST['p_name'];
		$Pro_dis=$_POST['p_dis'];
		$Pro_price=$_POST['p_price'];
		$Query = $add->update($Pro_name,$Pro_dis,$Pro_price,$Pro_sn);
		if($Query  )
	 	  	{
	         	
	         	header('location:list.php'); 
	        }
        else
	        {
	        	echo "failed";
	        }
    }

//delete


if (isset($_GET['del']))
{
	$Pro_sn = $_GET['del'];
	$Query = $add->delet($Pro_sn);
	if($Query)
		{	
			header("location:list.php");
		}
	else
		{
			echo "connection failed";
		}
}

?>