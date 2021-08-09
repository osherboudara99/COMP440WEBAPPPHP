<?php
include("db.php");
session_start();

$subject = strval($_POST["subject"]);
$description = htmlspecialchars($_POST["description"]);
$tags_string = strval($_POST["tags"]);

$tags = explode(',', $tags_string);



$query_blog_saved = $conn->prepare("CALL insert_blog(?, ?, NOW(), (SELECT userID FROM Users WHERE username = ? and password = ?))");

$query_blog_saved->bind_param("ssss", $subject, $description, $_SESSION['username'], $_SESSION['password']);
$result_blog = $query_blog_saved->execute();
$returned_blog = $query_blog_saved->fetch();

$query_tags = $conn->prepare("INSERT INTO blogstags (`blogid`,`tag`) 
    VALUES ((SELECT blogid FROM blogs WHERE userID = 
    (SELECT userID FROM Users WHERE username = ? AND password = ?) AND pdate = DATE(NOW()) ), ?)");

foreach($tags as $substr){
    $substr = strval($substr);
    $query_tags->bind_param("sss", $_SESSION['username'], $_SESSION['password'], $substr);
    $query_tags->execute();

}

if ($result_blog === TRUE){
    !$conn->commit();
    echo "\nInsert worked";
    header("location: createBlogSuccess.php"); 

}
else{
    echo "\nInsert did not work: " . $conn->error;
    header("location: createBlogError.php"); 
}




?>