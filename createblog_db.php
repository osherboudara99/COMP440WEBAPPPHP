<?php
include("db.php");
session_start();

$subject = strval($_POST["subject"]);
$description = htmlspecialchars($_POST["description"]);
$tags_string = strval($_POST["tags"]);


$tags = explode(',', $tags_string);
$query_checkcount = $conn->query("SELECT * FROM `blogs` WHERE blogs.userid = (SELECT userID FROM Users WHERE username = '".$_SESSION['username']."') AND pdate = DATE(NOW())");
$returned_numrows = mysqli_num_rows($query_checkcount);

$query_blog_saved = $conn->prepare('CALL insert_blog(?, ?, NOW(), (SELECT userID FROM Users WHERE username = ? and password = ?))');

$query_blog_saved->bind_param("ssss", $subject, $description, $_SESSION['username'], $_SESSION['password']);
$result_blog = $query_blog_saved->execute();
$returned_blog = $query_blog_saved->fetch();

$query_tags = $conn->prepare("INSERT INTO blogstags (`blogid`,`tag`) 
    VALUES ((SELECT blogid FROM blogs WHERE userID = 
    (SELECT userID FROM Users WHERE username = ? AND password = ?) AND pdate = DATE(NOW()) AND subject = ? ), ?)");

foreach($tags as $substr){
    $substr = strval($substr);
    $query_tags->bind_param("ssss", $_SESSION['username'], $_SESSION['password'], $subject, $substr);
    $query_tags->execute();

}


$returned_count = $query_checkcount->fetch_assoc();

if ($result_blog === TRUE){
    if($returned_numrows < 2)
    {
        !$conn->commit();
        echo "\nInsert worked";
        header("location: createBlogSuccess.php"); 
    }
    else
    {
        echo "\nInsert did not work: " . $conn->error;
        header("location: createBlogError.php"); 
    }

}




?>