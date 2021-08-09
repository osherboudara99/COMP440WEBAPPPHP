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
<div class="three ui blue buttons" style="margin-bottom:2%; margin-top:2%;">
  <button class="ui button" style="width:13%; margin-left:15%"onClick="location.href='blogCreate.php'">
  <i class=" edit icon"></i>Create Blog</button>
  <button class="ui button"style="width:13%;margin-left:15%" onClick="location.href='blogFromOther.php'">
  <i class=" book icon"></i>Blogs</button>
  <button class="ui button" style="width:13%; margin-left:15%"onclick="openCity(event, 'London')">
  <i class=" file alternate icon"></i>My Blogs</button>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
<link rel="stylesheet" href="style2.css">
<script src="blogShowFunctions.js"></script>


<div id="title">
<meta charset="UTF-8">
<?php
include("db.php");

session_start();

$query_viewblogs = $conn->query("SELECT subject, description, pdate, GROUP_CONCAT(tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
WHERE username != '".$_SESSION['username']."'
GROUP BY blogstags.blogid");

$result = $query_viewblogs->execute();

?>
<?php
$i=0;
$stmt_result = $result->get_result();
while($row = $stmt_result->fetch_assoc()){
?>
<div class="header">
<div class="blurred-box" id="titleBlurredBox"style=" height:8ex;margin-left:20%;margin-right:20%; vertical-align:top;">
      <div class="titleCont">
    <h1 class ="head" id="displayTitle"style="font-family:Lobster Two; display:block;"><?php echo $row["subject"]; ?></h1>
    <h4 class = "head" id="displayUser"style="font-family:Lobster Two; display:block;"><?php echo $row["username"]; ?></h4>
</div>
</div>
</div>  
  </div>

<div class="row">
  <div class="leftcolumn"style="width:65%;">
    <div class="card">
    <div class="blurred-box" style="height:50ex; margin-left:10%;">
    <div class="Description box">
<h2 class ="descr" id="displayDescr"style="font-family:Lobster Two; display:block; color:antiquewhite;"><?php echo $row["description"]; ?></h2>
</div>
</div>

</div>

    <div class="card">
    <div class="blurred-box"style="height:20ex; margin-left:10%;">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;">Tags</h2>



    </div>
  </div>
  </div>



  <div class="rightcolumn"style="width:35%;">
    <div class="card">
    <div class="blurred-box">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;">Comments</h2>
      <div class="mini ui vertical animated blue button" style="margin-left:44ex;" onclick="addComment()">
  <div class="hidden content">Add</div>
  <div class="visible content">
    <i class="plus icon" ></i>
  </div>
</div>
<div class="ui error form " style="height:56ex;">
<div class="field error">
    <textarea type="text" id="editCommentsBox" value="" placeholder="Comments..." style="height:15ex; display:none;">
    </textarea>
    <div class = "positiveButtons">
    <div style="width:32%; display:none" id="saveCommentButton" class="mini ui vertical animated blue button"  onclick="saveComment()" >
  <div class="hidden content">Save</div>
  <div class="visible content">
    <i class="save icon"></i>
  </div>
</div>
<div style="width:32%; display:none" id="likeCommentButton" class="mini ui vertical animated blue button"  onclick="likeComment()" >
  <div class="hidden content">Like</div>
  <div class="visible content">
    <i class="thumbs up icon"></i>
  </div>
</div>
<div style="width:30%; display:none" id="dislikeCommentButton" class="mini ui vertical animated blue button"  onclick="dislikeComment()" >
  <div class="hidden content">Dislike</div>
  <div class="visible content">
    <i class="thumbs down icon"></i>
  </div>
</div>


</div>

</div>
    <div id="SavedCommentBox"> 
</div>
</div>
    </div>
</div>
</div>
<?php
$i++;
}
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>

