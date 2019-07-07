<?php
	include_once 'class.user.php';
	$user = new User();

	if (isset($_REQUEST['reg'])) {
		extract($_REQUEST);
	    $register = $user->reg_user($username,$password,$email,$name,$job);
	    if ($register) {
            // Registration Success
            header('location:login.php');
	    } else {
	        // Registration Failed
            echo 'Registration failed. Username already exits please try again';
	    }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <title> register </title>
        <script>
            function check_info(){

                if (register.username.value == "" || register.password.value == "" || eregister.email.value == ""
                || register.name.value == "" || register.job.value == "") {

                    document.getElementById("err").innerHTML="Bạn vui lòng điền đầy đủ thông tin!";
                    return false;
                } 

                // else if (register.password.value.length < '8'){
                //     document.getElementById("err").innerHTML="Mật khẩu phải có độ dài lớn hơn 6";
                // }

                else{
                    $username = register.username.value;
                    $password = register.password.value;
                    $email = eregister.email.value;
                    $name = register.name.value;
                    $job = register.job.value;
                }
            }
        </script>
    </head>
    <body>
        <form  method="POST" action="" class="mt-5" name="register">
            <div class="container" style="width: 400px">
                <h3> Register </h3><br>
                <span id="err" class="text-danger"></span>
                <div class="form-group">
                    <label> Username : </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter User name">
                </div>
                <div class="form-group">
                    <label> Password : </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label> Email : </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label> Name : </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label> Job :  </label>
                    <input type="text" class="form-control" id="job" name="job" placeholder="Enter Job">
                </div>         
                <input type="submit" name="reg" class="btn btn-primary" onclick="return(check_info());" value="Register">
            </div>
            
        </form>
        
    </body>
</html>