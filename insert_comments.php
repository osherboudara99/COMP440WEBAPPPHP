<?php
include("db.php");

session_start();

$description = htmlspecialchars($_POST["comment_desc"]);
$description_sentiment = explode("*", $description);

$subject = strval($_POST["subject"]);
$desc = strval($_POST["description"]);
$pdate = strval($_POST["pdate"]);


$query_insertcomments = $conn->prepare("INSERT INTO comments (`sentiment`, `description`, `cdate`, `blogid`, `authorid`) 
VALUES (?, ?, DATE(NOW()), (SELECT blogid FROM blogs WHERE subject = ? AND description = ? AND pdate = ?), 
(SELECT userid FROM Users WHERE username = ?))");

$query_insertcomments->bind_param("ssssss", $description_sentiment[1], $description_sentiment[0], $subject, $desc, $pdate, $_SESSION['username']);

$query_insertcomments->execute();
header("refresh:5;url=blogFromOther.php"); 
?>