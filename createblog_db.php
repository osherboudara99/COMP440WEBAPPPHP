<?php
include("db.php");
session_start();

$subject = strval($_POST["subject"]);
$description = htmlspecialchars($_POST["description"]);

$query_blog_saved = $conn->prepare("INSERT INTO blogs (`subject`, `description`, `pdate`, `userID`) VALUES (?, ?, NOW(), (SELECT userID FROM Users WHERE username = ? and password = ?))");

$query_blog_saved->bind_param("ssss", $subject, $description, $_SESSION['username'], $_SESSION['password']);
$result = $query_blog_saved->execute();
$returned = $query_blog_saved->fetch();

if ($result === TRUE){
    !$conn->commit();
    echo "\nInsert worked";

}
else{
    echo "\nInsert did not work: " . $conn->error;
    echo "\nRedirecting......";
}




?>