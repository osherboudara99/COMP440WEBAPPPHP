<?php
include("db.php");

session_start();

$query_viewownblogs = $conn->prepare("SELECT subject, description, pdate, GROUP_CONCAT(tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
WHERE username = ?
GROUP BY blogstags.blogid");

$query_viewownblogs->bind_param("s", $_SESSION['username']);
$result = $query_viewownblogs->execute();



?>