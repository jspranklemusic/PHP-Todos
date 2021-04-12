<?php
    session_start();
    require "functions.php";
    

    if($_SERVER['REQUEST_METHOD'] === "POST"){

        $con = create_connection();
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username && $password){
            $query = "insert into users (username, password) values ('$username', '$password')";
            $result = mysqli_query($con, $query);

            $_SESSION["username"] = $username;
            header("Location: index.php");
        }else{
            echo "You must submit a valid username and password.";
        }
        

    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos | Register</title>
</head>
<body>
    <h1>Todos</h1>
    <hr>
    <h3>Register</h3>
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
    <a href="login.php">Or Login</a>
</form>

</body>
</html>