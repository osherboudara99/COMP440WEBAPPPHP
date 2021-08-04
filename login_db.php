<?php 

include("db.php");
session_start();
$password = strval($_POST["password_login"]);
$username = strval($_POST["Username_login"]);
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

$query = $conn->prepare("SELECT username, password FROM Users WHERE username = ? and password = ?");

$query->bind_param("ss", $username, $password);
$result = $query->execute();
$returned = $query->fetch();
if ($result === TRUE){
    if($returned > 0){
        header("Location: welcome.php");
        exit();
        
    }
    else{
        echo "\n You are not logged in.";
        echo "\n Redirecting back to login page........";
        header("Location: signInError.php");
        exit();

    }
}
else{
    echo "\n Username not found or password does not exist or is incorrect";
}









?>