<?php

include ("db.php");

session_start();

$sql_viewblogs_poscomments1 = "SELECT subject, blogs.description, pdate, GROUP_CONCAT(tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
INNER JOIN comments ON comments.authorid = blogs.userid
WHERE username = '".$_SESSION['username']."' AND sentiment LIKE '%positive%'
GROUP BY blogstags.blogid
ORDER BY pdate DESC";

$sql_viewpositivecomments1 = "SELECT username, sentiment, comments.description AS comment_desc, cdate FROM comments
INNER JOIN Users
ON comments.authorid = Users.userid
INNER JOIN blogs
ON blogs.blogid = comments.blogid
WHERE blogs.subject = '".$row["subject"]."' AND sentiment LIKE '%positive%'";


$sql_mostblogsdate2 = "SELECT username, COUNT(blogid) AS blog_amount FROM Users
INNER JOIN blogs
ON blogs.userid = Users.userid
WHERE pdate = '2020-10-10'";




?>