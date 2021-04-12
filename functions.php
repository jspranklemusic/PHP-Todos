<?php


function create_connection(){
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "todos";

    if(!$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name))
    {
        die("Failed to connect!");
    }else{
        return $con;
    }
    return $con;
}



function delete_item($id)
{   
    $con = create_connection();
    $query = "delete from todo where id = '$id'";
    mysqli_query($con, $query);
    header("Location: index.php");
}




function login($username, $password){
    
        $con = create_connection();
        $query = "select * from users where username =  '$username' limit 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);

            if($user_data["password"] === $password){
                $_SESSION["username"] = $user_data["username"];
                $_SESSION["user_id"] = $user_data["id"];
                header("Location: index.php");
                die;
            }else{
                echo "Error!";
                die;
            }
        }else{
            echo "Invalid login credentials.";
        }
    
}






