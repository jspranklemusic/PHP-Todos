<?php

    session_start();
    require "functions.php";

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        die;
    }else{
        $con = create_connection();
        $user_id = $_SESSION["user_id"];


        // post request
        if($_SERVER['REQUEST_METHOD'] == "POST"){     
            $todo = $_POST["todo"];
            $query = "insert into todo (todo, user_id) values ('$todo','$user_id')";
            mysqli_query($con, $query);
        }

        $query2 = "select * from todo where user_id = '$user_id'";
        $result = mysqli_query($con, $query2);
        $todos = mysqli_fetch_all($result) ?? [];
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos | Home</title>
</head>
<body>
    <h1>My Todos</h1>
    <p>Welcome, <?php echo $_SESSION["username"]; ?>. Your user ID is <?php echo $_SESSION["user_id"]?>. | <a href="logout.php">Logout</a></p> 
    <hr>
    <?php
        echo "You have ".count($todos)." todos"; 
    ?>
    <div id="todos">

            

            <?php
                for($i = 0; $i < count($todos); $i++){
                    $id = $todos[$i][0];
                    $item = $todos[$i][2];
                    echo "
                    <form method='POST' action='delete-item.php'>
                        
                        <input type='hidden' value='$id' name='todo_id'>
                        <button>Delete</button> &nbsp;&nbsp;&nbsp; $item
                    </form><br>";
                }

            ?>
    </div>

    <form method="POST">
        <div class="form-control">
            <input name="todo" type="text" placeholder="Your todo here">
            <button type="submit">Add Todo</button>
           
        
        </div>
    </form>

   
</body>
</html>