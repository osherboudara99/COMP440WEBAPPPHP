
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
<h1 style="font-family:Lobster Two; text-align: center;display:block;">Blogs Containing Tag</h1>
<hr size="8" width="90%" color="white">  
<form action="" method="post">
<?php @$tagX = NULL;
        @$new_tagX = NULL;?>
<div class="blurred-box" id="titleBlurredBox"style="height:30ex;margin-top:5%; margin-left:20%;margin-right:20%; vertical-align:top;">
<div class="ui error form " style="height:20ex; margin-bottom:2%;">
<div class="field error">
<div class="titleCont">
    <input name="tagX" id="inputTagXBox" style="display:inline-block; margin-left:20%; width: 50% "placeholder="Please enter a tag..." value ="" required>
</div>
</div>
</div> 
</div> 
<button type="submit" style="width:15%; margin-left:43%; margin-top:3%;" id="submitButton" class="ui vertical animated blue button"  >
  <div class="hidden content">Submit</div>
  <div class="visible content">
    <i class="checkmark icon"></i>
  </div>
</button>
</form>
<?php
include("db.php");
@$tagX = strval($_POST["tagX"]);


session_start();

if($tagX != NULL){
?>
<div class="header" style="display:block;" id="header">

<hr size="8" width="90%" color="white">  
<div class="blurred-box" id="titleBlurredBox"style="width:40%; height:6ex;margin-left:30%;margin-right:20%; margin-top:4%; vertical-align:top;">
      <div class="titleCont">
        <h1 style="font-family:Lobster Two; display:block;">Tag Given: <?php echo $tagX;?></h1>
      </div>
</div>
</div>

<?php
}


$sql_tagsearch= $conn->prepare("SELECT id, subject, descr, pdate, tags, username FROM (SELECT blogs.blogid AS id, subject, blogs.description AS descr, pdate, GROUP_CONCAT(DISTINCT tag SEPARATOR ',') AS tags, username FROM Users 
INNER JOIN blogs ON Users.userid = blogs.userid 
INNER JOIN blogstags ON blogs.blogid = blogstags.blogid 
GROUP BY blogstags.blogid
ORDER BY pdate DESC) AS all_blogs
INNER JOIN blogstags 
ON id = blogstags.blogid
WHERE tag = ?");

$sql_tagsearch->bind_param("s", $tagX);

$sql_tagsearch->execute();
$tags_result = $sql_tagsearch->get_result(); 

$val = 0;
$i = 0;
if($tagX != NULL){
while($row_tags = $tags_result->fetch_assoc())
{ $val=1;
  $query_viewcomments = $conn->query("SELECT username, sentiment, comments.description AS comment_desc, cdate FROM comments
INNER JOIN Users
ON comments.authorid = Users.userid
INNER JOIN blogs
ON blogs.blogid = comments.blogid
WHERE blogs.subject = '".$row_tags["subject"]."'");
  ?>
 
<div class="header">
<div class="blurred-box" id="titleBlurredBox" style=" height:10ex;margin-left:20%;margin-right:20%; vertical-align:top;">
      <div class="titleCont">
    <h1 class ="head" id="displayTitle"style="font-family:Lobster Two; display:block;"><?php echo $row_tags["subject"]; ?></h1>
    <h4 class = "head" id="displayUser"style="font-family:Lobster Two; display:block;"><?php echo $row_tags["username"]; ?></h4>
    <h5 class = "head" id="displayDate"style="font-family:Lobster Two; display:block;"><?php echo $row_tags["pdate"]; ?></h5>
</div>
</div>
</div>  

<div class="row">
  <div class="leftcolumn"style="width:65%;">
    <div class="card">
    <div class="blurred-box" style="height:90ex; margin-left:10%;">
    <div class="Description box">
<h2 class ="descr" id="displayDescr"style="font-family:Lobster Two; display:block; color:antiquewhite;"><?php echo $row_tags["descr"]; ?></h2>
</div>
</div>

</div>

    <div class="card">
    <div class="blurred-box"style="height:22ex; margin-left:10%;">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;"><?php echo $row_tags["tags"]; ?></h2>



    </div>
  </div>
  </div>

 


  <div class="rightcolumn"style="width:35%;">
    <div class="card">
    <div class="blurred-box">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;">Comments</h2>
      <?php
$j=0;
while($row_comments = mysqli_fetch_array($query_viewcomments)) {
  
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
</div>
</div>
</div>
</div>
<?php
$i++;
}
}
if($val != 1){
    if($tagX != NULL){
    ?><h4 id = "displayPHPERROR" style="font-family:Lobster Two; text-align: center;" onload="load1()">Tag does not exist.</h4>
    <?php
    }
}
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
<script>
    
    function load1(){
        var blankInput =  document.getElementById("displayPHPERROR");
        blankInput.style.display = "none";
    }
    </script>