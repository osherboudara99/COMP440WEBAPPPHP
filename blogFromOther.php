<style>
    @import url("https://fonts.googleapis.com/css2?family=Lobster+Two&family=Raleway:ital,wght@0,400;1,300&family=Staatliches&display=swap");
    .head{
    color:antiquewhite;
    font-family: cursive;
   
    text-align:center;
  
    
  }
  #titleGroupBox{
      flex-direction:row;
      width:200ex;
  }
  .titleCont{
  flex-grow: 3; /* default 0 */
  
  
}
  .buttonGroupTitle{
    margin-left: 35%;
    display: inline-block;
  }
</style>
<div class="four ui blue buttons" style="margin-bottom:2%; margin-top:2%; ">
  <button class="ui button" style="width:10%; margin-left:12%"onClick="location.href='blogCreate.php'">
  <i class=" edit icon"></i>Create Blog</button>
  <button class="ui button"style="width:10%;margin-left:12%" onClick="location.href='blogFromOther.php'">
  <i class=" book icon"></i>Blogs</button>
  <button class="ui button" style="width:10%; margin-left:12%"onclick="location.href='blogFromMe.php'">
  <i class=" file alternate icon"></i>My Blogs</button>
  <button class="ui button" style="width:10%; margin-left:12%"onclick="location.href='moreInfo.php'">
  <i class=" bars icon"></i>More Info</button>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
<link rel="stylesheet" href="style2.css">
<script src="blogShowFunctions.js"></script>


<div id="title">
<meta charset="UTF-8">
<script type="text/javascript">
        
        window.onload = load;
        </script>
        <h1 style="font-family:Lobster Two; text-align: center;display:block;">Blogs</h1>
<?php
include("db.php");

session_start();

$query_viewblogs = $conn->query("SELECT subject, description, pdate, GROUP_CONCAT(tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
WHERE username != '".$_SESSION['username']."'
GROUP BY blogstags.blogid 
ORDER BY pdate DESC");







?>
<?php
$i=0;
while($row = mysqli_fetch_array($query_viewblogs)) {
  $query_viewcomments = $conn->query("SELECT username, sentiment, comments.description AS comment_desc, cdate FROM comments
INNER JOIN Users
ON comments.authorid = Users.userid
INNER JOIN blogs
ON blogs.blogid = comments.blogid
WHERE blogs.subject = '".$row["subject"]."'");
  
  ?>
<hr size="8"  width="90%" color="white">  
<form action="insert_comments.php" method="post">
<div class="header">
<div class="blurred-box" id="titleBlurredBox"style="height:10ex;margin-left:20%;margin-right:20%; vertical-align:top;">
      <div class="titleCont">
    <h1 class ="head" id="displayTitle"style="font-family:Lobster Two; display:block;"><?php echo $row["subject"]; ?></h1>
    <input name="subject" style="display:none; " value ="<?php echo $row["subject"]; ?>">
    <h4 class = "head" id="displayUser"style="font-family:Lobster Two; display:block;"><?php echo $row["username"]; ?></h4>
    <input name="usernames" style="display:none; " value ="<?php echo $row["username"]; ?>">
    <h5 class = "head"  id="displayDate"style="font-family:Lobster Two; display:block;"><?php echo $row["pdate"]; ?></h5>
    <input name="pdate" style="display:none; " value ="<?php echo $row["pdate"]; ?>">
</div>
</div>
</div>  
  </div>

<div class="row">
  <div class="leftcolumn"style="width:60%;">
    <div class="card">
    <div class="blurred-box" style="height: 120ex; margin-left:15%;">
    <div class="Description box">
<h2 class ="descr" id="displayDescr"style="font-family:Lobster Two; display:block; color:antiquewhite;"><?php echo $row["description"]; ?></h2>
<input name="description" style="display:none; " value ="<?php echo $row["description"]; ?>">
</div>
</div>

</div>

    <div class="card">
    <div class="blurred-box"style="height:24ex; margin-left:15%;">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;"><?php echo $row["tags"]; ?></h2>



    </div>
  </div>
  </div>



  <div class="rightcolumn"style="width:35%;">
    <div class="card">
    <div class="blurred-box">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;">Comments</h2>
      <div class="mini ui vertical animated blue button 2" id="saveButton2"style="margin-left:44ex;" >
  <div class="hidden content">Add</div>
  <div class="visible content">
    <i class="plus icon" ></i>
  </div>
</div>

<div class="ui error form " style="height:130ex;">
<div class="field error">
    <input type="text" name="comment_desc" class="makeComments" id="editCommentsBox" value="" placeholder="Comments..." style="height:15ex; display:none;" required>
    <div class = "positiveButtons">
    <button type="submit" style="width:32%; display:none" id="saveCommentButton" class="mini ui vertical animated blue button" >
  <div class="hidden content">Save</div>
  <div class="visible content">
    <i class="save icon"></i>
  </div>
</button>
<div style="width:32%; display:none" id="likeCommentButton" class="mini ui vertical animated blue button" >
  <div class="hidden content">Like</div>
  <div class="visible content">
    <i class="thumbs up icon"></i>
  </div>
</div>
<div style="width:30%; display:none" id="dislikeCommentButton" class="mini ui vertical animated blue button" >
  <div class="hidden content">Dislike</div>
  <div class="visible content">
    <i class="thumbs down icon"></i>
  </div>
</div>


</div>

</div>
<?php
$j=0;
while($row_comments = mysqli_fetch_array($query_viewcomments)) {
  
  ?> 
<div class="ui error form " style="height:40ex;">
    <div id="SavedCommentBox" > 
    <div class="blurred-box" >
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
</div>
</div>
</div>
</div>
</div>
</form>

<?php
$i++;
}
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>

