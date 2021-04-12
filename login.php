<?php
    

    session_start(); 
    require "functions.php";   
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $con = create_connection();
        $username = $_POST['username'];
        $password = $_POST['password'];
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos | Login</title>
</head>
<body>
    <h1>Todos</h1>
    <hr>
    <h3>Login</h3>
<form method="POST">
    <div class="form-control">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" >
    </div>
    <div class="form-control">
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" >
    </div>
    <br>
    <button type="submit">Submit</button>
    <a href="register.php">Or Register</a>
</form>

</body>
</html>