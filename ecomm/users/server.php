<?php
    if(isset($_GET['getUser'])){
        $format = strtolower($_GET['fomat']) == 'json' ? 'json' : 'xml';
        $users = array();
        require_once ("connection.php");
            $sql = "select * from users";
        $query = mysqli_query($conn,$sql);

        while($user == mysqli_fetch_assoc($query)){
            $users[] = array('user' => $user);
        }

        if($format == 'json'){
            header('Content-type: application/json');
            echo json_encode(array('users'=>$users));
        }
        else{
            header('Conten-type: text/xml');
            echo '<users>';
                foreach( $users as $index => $user ){
                    if(is_array($user)){
                        foreach($user as $key => $value ){
                            echo '<',key,'>';
                            if(is_array($value)){
                                foreach($value as $tag => $val){
                                    echo '<',tag,'>',htmlentities,'</',tag,'>';
                                }
                            }
                            echo '</',key,'>';
                        }
                    }
                }
            echo '</users>';
        }
        mysqli_close();
    }

    else{
        echo "không có dữ liệu trả về";
    }
    
?>