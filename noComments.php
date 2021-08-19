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
<h1 class ="head" id="displayTitle"style="font-family:Lobster Two; text-align: center;display:block;">Users Who Have Not Made Comments</h1>
<hr size="8"  width="90%" color="white">  

<div class="header" style="display:block;" id="header">

<div class="blurred-box" id="titleBlurredBox"style=" height:20ex;margin-left:20%;margin-right:20%; vertical-align:top;">
      <div class="titleCont">
      <h3 class ="head" id="displayTitle"style="font-family:Lobster Two; display:block;">Usernames</h3>
      <hr size="6" width="30%" color="snow">  
      <?php
      include("db.php");
      
      

$sql_nocommentsblogs5 = $conn->query("SELECT username FROM Users 
WHERE userid NOT IN (SELECT DISTINCT comments.authorid FROM comments)");

$i =0;
while($row_nocomments = mysqli_fetch_array($sql_nocommentsblogs5)) {

?>
    <h4 class ="head" id="displayTitle"style="font-family:Lobster Two; display:block;"><?php echo $row_nocomments["username"]; ?></h4>

<?php
$i++;
}

?>

</div>
</div>
</div>
<hr size="8" width="90%" color="white">  