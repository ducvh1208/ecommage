<?php
    include_once "connection.php";
    
    class Admin{

        public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Không thể kểt nối tới database";
			        exit;
			}
		}

        public function login($username, $password){

        	// $password = md5($password);
			$sql="SELECT id from users WHERE username='$username' and password='$password'";

			//checking if the username is available in the table
            $result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_assoc($result);
            $count_row = $result->num_rows;
            echo $user_data['name'];

	        if ($count_row) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true;
				$_SESSION['id'] = $user_data['id'];
	            return true;
	        }
	        else{
				header("location:login.php");
			}
        }
        
        public function get_name($id){
    		$sql3="SELECT name FROM users WHERE id = '$id'";
	        $result = mysqli_query($this->db,$sql3);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['name'];
		}

		public function get_job($id){
    		$sql3="SELECT job FROM users WHERE id = '$id'";
	        $result = mysqli_query($this->db,$sql3);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['job'];
		}

        public function update(){
			$name = $_POST['name'];
			$job = $_POST['job'];
			$strSql = "UPDATE users SET name = '$name', job = '$job' WHERE id = '$id'";
			$result = mysqli_query($this->db,$strSql);
			if($result){
				echo "record successfully updated";
			}
			else{
				echo "record unsuccessfully updated";
			}
		}
    }

?>