<?php
include("db.php");

session_start();

$query_viewownblogs = $conn->query("SELECT subject, description, pdate, GROUP_CONCAT(tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
WHERE username = '".$_SESSION['username']."'
GROUP BY blogstags.blogid
ORDER BY pdate DESC");




?>