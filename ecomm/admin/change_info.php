<?php

    // include_once "class.admin.php";

    // $user = new Admin();

    // $id = $_SESSION['id'];
    
    // if(isset($_REQUEST['edit'])){
    //     $edit = $user->update();
    // }
        include "update.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <title> Change infomation </title>
    
    </head>
    <body>
        <div class="container mt-5" style="width: 500px">
            <h3> Change information user </h3><br>
            <strong><span id="message"></span></strong>
            <form id="form_edit" action="" method="POST">
                <div class="form-group">
                    <label> Name : </label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>
                <div class="form-group">
                    <label> Job :  </label>
                    <input type="text" class="form-control" id="job" name="job" value="">
                </div>
                <input type="submit" class="btn btn-primary" id="edit" name="edit" value="Edit">
            </form>
        </div>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#form_edit").on('submit',function(e){                    
                    e.preventDefault();
                    var form_data = $(this).serialize();
		
                        $.ajax({
                            url:"update.php",
                            method:"POST",
                            data:form_data,
                            success:function(data)
                            {
                                $('#user_new_password').val('');
                                $('#user_re_enter_password').val('');
                                $('#message').html(data);
                            }
                        })
                        
                });
            });
        </script>
    </body>
</html>