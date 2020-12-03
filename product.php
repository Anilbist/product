<?php 
class product{

		public function __construct($db)
		{
    		$this->conn=$db;
		}

		public function user($Username,$Password)
		{
			$query=$this->conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
			$query->execute([$Username,$Password]);
			return $query;
		}


		public function insert($Name,$Disp,$Price)
		{
			$add_product = $this->conn->prepare("INSERT INTO prod(pname,pdis,pprice) values(?,?,?)");
	        $add_product->execute([$Name,$Disp,$Price]);
	        $last_id = $this->conn->lastInsertId();
			for($i=0; $i< count($_FILES['p_image']['name']); $i++)
			{
		// $v1=rand(1,99999);
  //    	$v2=md5($v1);
		     	$fna = $_FILES['p_image']['name'][$i];
		     	$dst="producti/".$fna;
		     	move_uploaded_file($_FILES['p_image']['tmp_name'][$i],$dst);
		     	$query1 = $this->conn->prepare("INSERT INTO image(pi_id,pimage) values(?,?) ");
		      	$query1->execute([$last_id,$dst]);
      		}
	      	return $add_product;
		}


		public function image($last_id,$dst)
		{	
			$add_product1 = $this->conn->prepare("INSERT INTO image(pi_id,pimage) values(?,?) ");
	      	$add_product1->execute([$last_id,$dst]);

	      	return $add_product1;
		}


		public function view()
		{
			$query = $this->conn->prepare("SELECT * FROM prod 
			INNER JOIN image ON prod.sn=image.pi_id GROUP BY pi_id ");
      		$query->execute();
      		return $query;
		}

		public function edit($Pro_sn)
		{
			$query = $this->conn->prepare("SELECT * FROM prod WHERE sn=?");
	      	$query->execute([$Pro_sn]);
	      	return $query;
		}

		public function update($Pro_name,$Pro_dis,$Pro_price,$Pro_sn)
		{
			$query= $this->conn->prepare("UPDATE prod SET pname =?,pdis = ?,pprice=? WHERE sn =?");
			$query->execute([$Pro_name,$Pro_dis,$Pro_price,$Pro_sn]);
			
			for($i=0; $i< count($_FILES['p_image']['name']); $i++)
			{
		// $v1=rand(1,99999);
  //    	$v2=md5($v1);
		     	$fna = $_FILES['p_image']['name'][$i];
		     	$dst="producti/".$fna;
		     	move_uploaded_file($_FILES['p_image']['tmp_name'][$i],$dst);
		     	$query1 = $this->conn->prepare("INSERT INTO image(pi_id,pimage) values(?,?) ");
		      	$query1->execute([$Pro_sn,$dst]);
      		}
			return $query;
		}



		public function remove($Pro_sn)
		{
			$query =$this->conn->prepare("SELECT * FROM image where pi_id =?");
    		$query->execute([$Pro_sn]);
		}



		public function delet($Pro_sn)
		{	
			$query =$this->conn->prepare("SELECT * FROM image where pi_id =?");
   			$query->execute([$Pro_sn]);
		    while($row = $query->fetch(PDO::FETCH_OBJ)){
		    unlink($row->pimage);}
			$Query = $this->conn->prepare("DELETE FROM prod WHERE sn=?");
			$Query->execute([$Pro_sn]);
			return $Query;
		}
}
?>