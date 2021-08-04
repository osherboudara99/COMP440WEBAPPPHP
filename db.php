<?php

$host = "localhost";
$port = 3306;
$socket = "";
$user = "comp440";
$password = "pass1234";
$dbname = "webapp";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS webapp";
if ($conn->query($sql) === TRUE) {

}
else {
    echo $conn->error;
}

$sql2 = "CREATE TABLE IF NOT EXISTS `Users` (
    `userid` int(10) NOT NULL AUTO_INCREMENT,
    `firstName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    `lastName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `username` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    PRIMARY KEY (`userid`),
    UNIQUE KEY `username_UNIQUE` (`username`),
    UNIQUE KEY `email_UNIQUE` (`email`))
    ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
if ($conn->query($sql2) === TRUE) {
}
else {
    echo  $conn->error;
}




//$con->close();

//$con->close();



?>

