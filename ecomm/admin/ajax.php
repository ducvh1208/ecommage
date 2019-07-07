<?php
include "connection.php";
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$query = "UPDATE users SET name = '".$_POST["name"]."', job = '".$_POST["job"]."'WHERE id = '".$_SESSION["id"]."'";
            $result = mysqli_query($conn,$query);
    
            if(isset($result))
            {
                echo '<div class="alert alert-success">Profile Edited</div>';
            }
?>