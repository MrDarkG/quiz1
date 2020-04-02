<?php 
	require_once("functions.php");
	$var1=new Functions;
	if (isset($_GET["id"])) {
		if (is_numeric($_GET['id'])) {
			$ans=[];
			$data=["question"=>""];
			while($r=mysqli_fetch_assoc($var1->select_question($_GET['id']))){
				$data["question"]=$r["question"];
			}
			$data["ans"]=$ans;
			echo json_encode($data);
		}
	}
 ?>
