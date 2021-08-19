<?php

include ("db.php");

session_start();

$sql_viewblogs_poscomments1 = "SELECT subject, blogs.description, pdate, GROUP_CONCAT(DISTINCT tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
INNER JOIN comments ON comments.authorid = blogs.userid
WHERE username = '".$_SESSION['username']."' AND sentiment LIKE '%positive%'
GROUP BY blogstags.blogid
ORDER BY pdate DESC"; //session username chnaged to user input

$sql_viewpositivecomments1 = "SELECT username, sentiment, comments.description AS comment_desc, cdate FROM comments
INNER JOIN Users
ON comments.authorid = Users.userid
INNER JOIN blogs
ON blogs.blogid = comments.blogid
WHERE blogs.subject = '".$row["subject"]."' AND sentiment LIKE '%positive%'"; //must retrieve subject from above query



$sql_mostblogsdate2 = "SELECT username, MAX(blog_amount) AS blog_amount FROM 
(SELECT COUNT(*) AS blog_amount, username FROM blogs 
INNER JOIN Users
ON blogs.userid = Users.userid
WHERE pdate = '2020-04-06'
GROUP BY username) AS blogs_amount_subquery"; //chnage date to user input

$sql_followedbytwousers3 = "SELECT a.username AS followed FROM follows
INNER JOIN Users AS a
ON a.userid = leaderid
INNER JOIN Users AS b
ON b.userid = followerid
WHERE b.username IN (?, ?) 
GROUP BY a.username 
HAVING COUNT(*) = 2"; //chnage catlover to variable and scooby


$sql_tagssearch4 = "SELECT subject, blogs.description, pdate, GROUP_CONCAT(DISTINCT tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
INNER JOIN comments ON comments.authorid = blogs.userid
WHERE tag LIKE '%dogs%'
GROUP BY blogstags.blogid
ORDER BY pdate DESC"; //change tag like parameter to variable

$sql_nocommentsblogs5 = "SELECT username FROM Users 
WHERE userid NOT IN (SELECT DISTINCT comments.authorid FROM comments)";



?>