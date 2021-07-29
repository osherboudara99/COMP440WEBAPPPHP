<?php

$host = "127.0.0.1";
$port = 3306;
$socket = "";
$user = "root";
$password = "";
$dbname = "webapp";

$conn = new mysqli($host, $user, $password, "webapp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "worked";
}

$sql = "CREATE DATABASE IF NOT EXISTS webapp";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
}
else {
    echo "Error creating database: " . $conn->error;
}

$sql2 = "CREATE TABLE IF NOT EXISTS Users (UserID INT(6) AUTO_INCREMENT, firstName varchar(25), 
lastName varchar(25) NOT NULL, email varchar(35) NOT NULL, 
password varchar(20) NOT NULL, username varchar(20), UNIQUE(email, username), 
PRIMARY KEY (UserID, username, email) )";
if ($conn->query($sql2) === TRUE) {
    echo "Database created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}




//$con->close();

//$con->close();



?>

