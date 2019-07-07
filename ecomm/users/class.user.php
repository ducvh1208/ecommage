<?php
    include "../admin/connection.php"; 

	class User{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Không thể kểt nối tới database";
			        exit;
			}
		}

		/*** for registration process ***/
		public function reg_user($username,$password,$email,$name,$job){

		    // $password = md5($password);
			$sql="SELECT * FROM users WHERE username='$username'";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql);
			$count_row = $check->num_rows;
		
			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO users(username, password, email, name, job) 
				VALUES('$username', '$password', '$email', '$name', '$job')";
				$result = mysqli_query($this->db,$sql1);
				return $result;
			}
			else {	
				return false;
			}
		}

		/*** for login process ***/
		public function check_login($username, $password){

        	// $password = md5($password);
			$sql2="SELECT id from users WHERE username='$username' and password='$password'";

			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;

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

		/*** for showing the name and job ***/	
    	public function get_id($id){
    		$sql3="SELECT id FROM users WHERE id = '$id'";
	        $result = mysqli_query($this->db,$sql3);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['id'];
		}

		// public function get_name($id){
    	// 	$sql3="SELECT name FROM users WHERE id = '$id'";
	    //     $result = mysqli_query($this->db,$sql3);
		// 	$user_data = mysqli_fetch_array($result);
		// 	echo $user_data['name'];
		// }

		// public function get_job($id){
    	// 	$sql3="SELECT job FROM users WHERE id = '$id'";
	    //     $result = mysqli_query($this->db,$sql3);
		// 	$user_data = mysqli_fetch_array($result);
		// 	echo $user_data['job'];
		// }
		

    	/*** starting the session ***/
	    public function get_session(){
			return $_SESSION['login'];
	    }

	    public function user_logout() {
	    	$_SESSION['login'] = FALSE;
			session_destroy();
			
		}

		// public function update_info($id){
		// 	$sql4="UPDATE users SET name='".$_POST['name']."',job='".$_POST['job']."' WHERE id='".$_SESSION['id']."'";
		// 	$result = mysqli_query($this->db,$sql4);
		// 	$user_data = mysqli_fetch_array($result);
		// 	echo $sql4;
		// 	if(isset($user_data)){
		// 		echo '<div class="alert alert-success"> Update information successfully! </div>';
		// 	}
		// }
	}
?>
