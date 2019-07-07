<?php
    include_once "class.user.php";

    $user = new User();

    $id = $_SESSION['id'];

    if (!$user->get_session()){
        header("location:login.php");
    }

    if (isset($_POST['logout'])){
        $user->user_logout();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <title> Home </title>
    </head>

    <body onload="myFunction()">
        <div class="container" style="width:500px">
            <form action="" method="POST" class="mt-5">
                <div>
                    <h3>"Hello <span class="text-info"><?= $user->get_name($id)?></span><br>
                    you are the <span class="text-info"><?= $user->get_id($id)?></span>-st users in this system<br> 
                    your job is <span class="text-info"><?= $user->get_job($id)?></span><br> 
                    you will be logout after {countdown 10seconds}".
                    </h3>
                </div>
                <div class="text-center">
                    <input type="submit" name="logout" id="logout" class="btn btn-danger" value="Logout">
                    <a href="reset_pass.php">
                        <input type="button" class="btn btn-info" name="reset" value="Reset Password">
                    </a>
                </div>
            </form>
        </div>
        <script>
           
        </script>   
        <?php
        // $id = $_SESSION['id'];
        //     $user = new User();
        //     $user->user_logout();
        //     echo "<script>";
        //         echo 'function myFunction() {
        //             setTimeout(function(){ $user->user_logout();}, 3000);
        //           }';
                  
        //     echo "</script>";
        $starttime = microtime(true);
        
        if ($starttime+=10000)
        {
            $user->user_logout();
        }
        ?>
    </body>

</html>
