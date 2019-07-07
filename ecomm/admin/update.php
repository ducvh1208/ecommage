<?php
    $conn = mysqli_connect('localhost', 'root', '', 'ecommage_test') or die ('Không thể kết nối tới database');

    $name = $_POST['name'];
    $job = $_POST['job'];

    $strSql = "UPDATE users SET name = '$name', job = '$job' WHERE id = '1'";
    $result = mysqli_query($conn,$strSql);
    if($result){
        echo "thanh cong";
    }
    else{
        echo "loi";
    }
?>