<?php

$host = "127.0.0.1";
$port = 3306;
$socket = "";
$user = "comp440";
$password = "pass1234";
$dbname = "webapp";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    
}

$sql = "CREATE DATABASE IF NOT EXISTS webapp";
if ($conn->query($sql) === TRUE) {

}
else {
    echo $conn->error;
}

$sql2 = "CREATE TABLE IF NOT EXISTS Users (UserID INT(6) AUTO_INCREMENT, firstName varchar(25), 
lastName varchar(25) NOT NULL, email varchar(35) NOT NULL UNIQUE, 
password varchar(20) NOT NULL, username varchar(20) UNIQUE, 
PRIMARY KEY (UserID, username, email) )";
if ($conn->query($sql2) === TRUE) {
}
else {
    echo  $conn->error;
}




//$con->close();

//$con->close();



?>

