<?php
    session_start(); 
    require "functions.php";   
    
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        login($username, $password);
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