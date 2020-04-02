<?php 
	session_start();
	$_SESSION["grades"]=0;
	class Functions
	{
		private $user;
		private $host;
		private $pass;
		private $db;
		
		
		public function __construct(){
			$this->user="root";
			$this->host="127.0.0.1";
			$this->pass="";
			$this->db="quiz1";
		}
		public function connect()
		{
			$conn= new mysqli($this->host,$this->user,$this->pass,$this->db);
			return $conn;
		}

		public function select_question($id)
		{	
			if (!is_numeric($id) ) {
				die();
			}
			$conn=$this->connect();
			$idd=mysqli_real_escape_string($conn,$id);
			$_SESSION["test_id"]=$idd;
			$result=$conn->query("SELECT `question`,`ans_str` FROM `test` INNER JOIN `ans` ON `t_id`=`test_id` WHERE `t_id` = '$idd' ");
			return $result;
		}
		public function checkans($ansid)
		{	
			if (!is_numeric($ansid) ) {
				die();
			}

			$conn=$this->connect();
			$idd=mysqli_real_escape_string($conn,$ansid);
			$test_id=$_SESSION["test_id"];
			$result=$conn->query("SELECT * FROM `test` WHERE `test_id`='$test_id' AND WHERE `aid`='$idd' AND WHERE `is_correct`=1");
			$nums=mysqli_num_rows ($result);
			if ($nums==1) {
				$_SESSION["grades"]=$_SESSION["grades"]+1;
			}
			return $nums;
		}
	}
 ?>