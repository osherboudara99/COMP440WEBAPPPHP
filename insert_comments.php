<?php
include("db.php");

session_start();

$description = htmlspecialchars($_POST["comment_desc"]);
$description_sentiment = explode("*", $description);

$subject = htmlspecialchars($_POST["subject"]);
$desc = strval($_POST["description"]);
$pdate = strval($_POST["pdate"]);
$username = strval($_POST["usernames"]);

$query_insertcomments = $conn->prepare("INSERT INTO comments (`sentiment`, `description`, `cdate`, `blogid`, `authorid`) 
VALUES (?, ?, DATE(NOW()), 
(SELECT blogid FROM blogs INNER JOIN Users ON Users.userid = blogs.userid WHERE username = ? AND blogs.subject = ?), 
(SELECT userid FROM Users WHERE username = ?))");

$query_insertcomments->bind_param("sssss", $description_sentiment[1], $description_sentiment[0], $username, $subject, $_SESSION['username']);

$result = $query_insertcomments->execute();
if($result === TRUE){
    header("location: commentSuccess.php"); 
}
else{
    header("location: commentError.php");
}
?>