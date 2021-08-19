<div class="six ui blue buttons" style="margin-bottom:2%; margin-top:2%; ">
  <button class="ui button" style="width:12%; margin-left:4%"onClick="location.href='moreInfo.php'">
  <i class=" comment alternative icon"></i>My Blogs With Positive Comments</button>
  <button class="ui button"style="width:12%;margin-left:4%" onClick="location.href='mostBlogs.php'">
  <i class=" calendar alternative outline icon"></i>Most Blogs On a Specific Date</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='followers.php'">
  <i class=" user icon"></i>Users Followed by Specificed Users</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='tagblogs.php'">
  <i class=" tags icon"></i>Blogs that Contain a Certain Tag</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='noComments.php'">
  <i class=" user outline icon"></i>Display All Users that Have Not Posted Comments</button>
  <button class="ui button"style="width:12%;margin-left:4%" onClick="location.href='blogFromOther.php'">
  <i class=" home icon"></i>Main Menu</button>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
<link rel="stylesheet" href="style2.css">
<script src="blogShowFunctions.js"></script>

<div id="title">
<meta charset="UTF-8">
<h1 class ="head" id="displayTitle"style="font-family:Lobster Two; text-align: center;display:block;">My Blogs With Only Positive Comments</h1>
<?php
include("db.php");

session_start();
$sql_viewblogs_poscomments1 = $conn->query("SELECT subject, blogs.description, pdate, GROUP_CONCAT(DISTINCT tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
INNER JOIN comments ON comments.blogid = blogs.blogid
WHERE username = '".$_SESSION['username']."' AND sentiment LIKE '%positive%'
GROUP BY blogstags.blogid
ORDER BY pdate DESC");



?>
<?php
$i=0;
$val = 0;
while($row = mysqli_fetch_array($sql_viewblogs_poscomments1)) {
    $val =1;
    $sql_viewpositivecomments1 = $conn->query("SELECT username, sentiment, comments.description AS comment_desc, cdate FROM comments
    INNER JOIN Users
    ON comments.authorid = Users.userid
    INNER JOIN blogs
    ON blogs.blogid = comments.blogid
    WHERE blogs.subject = '".$row["subject"]."' AND sentiment LIKE '%positive%'");
  ?>
<hr size="8" width="90%" color="white"> 
<div class="header">
<div class="blurred-box" id="titleBlurredBox"style=" height:10ex;margin-left:20%;margin-right:20%; vertical-align:top;">
      <div class="titleCont">
    <h1 class ="head" id="displayTitle"style=" color:antiquewhite; font-family:Lobster Two; display:block;"><?php echo $row["subject"]; ?></h1>
    <h4 class = "head" id="displayUser"style=" color:antiquewhite;font-family:Lobster Two; display:block;"><?php echo $row["username"]; ?></h4>
    <h5 class = "head" id="displayDate"style="color:antiquewhite; font-family:Lobster Two; display:block;"><?php echo $row["pdate"]; ?></h5>
</div>
</div>
</div>  
  </div>

<div class="row">
  <div class="leftcolumn"style="width:65%;">
    <div class="card">
    <div class="blurred-box" style="height:90ex; margin-left:10%;">
    <div class="Description box">
<h2 class ="descr" id="displayDescr"style="font-family:Lobster Two; display:block; color:antiquewhite;"><?php echo $row["description"]; ?></h2>
</div>
</div>

</div>

    <div class="card">
    <div class="blurred-box"style="height:22ex; margin-left:10%;">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;"><?php echo $row["tags"]; ?></h2>



    </div>
  </div>
  </div>
 


  <div class="rightcolumn"style="width:35%;">
    <div class="card">
    <div class="blurred-box">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;">Comments</h2>
      <?php
$j=0;
while($row_comments = mysqli_fetch_array( $sql_viewpositivecomments1 )) {
  
  ?>    
<div class="ui error form " style="height:100ex;">

    <div id="SavedCommentBox" > 
    <div class="blurred-box">
    <h4 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;"><?php echo "Username: ", $row_comments["username"]; ?></h4>
    <br><p style="font-family:Lobster Two; display:inline-block; color:antiquewhite;"><?php echo "Date: ", $row_comments["cdate"]; ?></p>
    <br><p style="font-family:Lobster Two; display:inline-block; color:antiquewhite;"><?php echo "Sentiment: ", $row_comments["sentiment"]; ?></p>
    <br><p style="font-family:Lobster Two; display:inline-block; color:antiquewhite;"><?php echo $row_comments["comment_desc"], "\n"; ?></p>
</div>
<?php
$j++;
}
?>
</div>
    </div>
</div>
</div>
</div>
<?php
$i++;
}
if($val != 1){
  ?>
<hr size="8" width="90%" color="white"> 
<div class="header">
<div class="blurred-box" id="titleBlurredBox"style=" height:10ex;margin-left:20%;margin-right:20%; vertical-align:top;">
      <div class="titleCont">
      <h4 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;"><?php echo "Blogs with positive comments for user '" . $_SESSION["username"] . "' do not exist."; ?></h4>

      <?php
}

?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>

