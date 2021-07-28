<?php
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$Username = $_POST['Username'];


$host = "127.0.0.1";
$port = 3306;
$socket = "";
$user = "root";
$password = "";
$dbname = "webapp";

$conn = new mysqli($host, $user, $password, "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "worked";
}

$sql = "CREATE DATABASE IF NOT EXISTS test";
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


$query = "INSERT INTO Users (firstName, lastName, email, password, username) 
    VALUES ('$fName', '$lName', '$mail', '$pass', '$Username')";


if ($conn->query($query) === TRUE){
    echo "Insert worked";
}
else{
    echo "error insert";
}


//$con->close();

//$con->close();



?>

