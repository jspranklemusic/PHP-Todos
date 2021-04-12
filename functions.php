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






