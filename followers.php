<div class="six ui blue buttons" style="margin-bottom:2%; margin-top:2%; ">
  <button class="ui button" style="width:12%; margin-left:4%"onClick="location.href='moreInfo.php'">
  <i class=" comment alternative icon"></i>My Blogs With Positive Comments</button>
  <button class="ui button"style="width:12%;margin-left:4%" onClick="location.href='mostBlogs.php'">
  <i class=" calendar alternative outline icon"></i>Most Blogs On a Specific Date</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='followers.php'">
  <i class=" user icon"></i>Users Followed by Specificed Users</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='tagblogs.php'">
  <i class=" tags icon"></i>Blogs that Contain a Certain Tag</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='moreInfo.php'">
  <i class=" user outline icon"></i>Display All Users that Have Not Posted Comments</button>
  <button class="ui button"style="width:12%;margin-left:4%" onClick="location.href='blogFromOther.php'">
  <i class=" home icon"></i>Main Menu</button>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
<link rel="stylesheet" href="style2.css">
<script src="blogShowFunctions.js"></script>
<h1 class ="head" id="displayTitle"style="font-family:Lobster Two; text-align: center;display:block;">Users Followed By Others</h1>
<hr size="8"  width="90%" color="white">  


<form action="" method="post">
    <?php $userX = NULL;
$userY = NULL; ?>
<div class="blurred-box" id="titleBlurredBox"style="height:30ex;margin-top:5%; margin-left:20%;margin-right:20%; vertical-align:top;">
<div class="ui error form " style="height:20ex; margin-bottom:2%;">
<div class="field error">
<div class="titleCont">
    <input name="userX" id="inputUserXBox" style="display:inline-block; margin-left:20%; width: 50% "placeholder="Please enter a user name..." value ="" required>
    <input name="userY" id="inputUserYBox" style="display:inline-block; margin-left:20%; width: 50% "placeholder="Please enter a user name..." value ="" required>
</div>
</div>
</div> 
</div> 
<button type="submit" style="width:15%; margin-left:45%; margin-top:3%;" id="submitButton" class="ui vertical animated blue button"  >
  <div class="hidden content">Submit</div>
  <div class="visible content">
    <i class="checkmark icon"></i>
  </div>
</button>
</form>
<?php 
include ("db.php");
@$userX = strval($_POST["userX"]); 
@$userY = strval($_POST["userY"]); 


?>
<div class="header" style="display:block;" id="header">
<hr size="8" width="90%" color="white">  
<div class="blurred-box" id="titleBlurredBox"style=" height:10ex;margin-left:20%;margin-right:20%; vertical-align:top;">
      <div class="titleCont">
<?php
$sql_followedbytwousers = $conn->prepare("SELECT a.username AS followed FROM follows
INNER JOIN Users AS a
ON a.userid = leaderid
INNER JOIN Users AS b
ON b.userid = followerid
WHERE b.username IN (?, ?) 
GROUP BY followed
HAVING COUNT(*) = 2");

$sql_followedbytwousers->bind_param('ss', $userX, $userY);

$sql_followedbytwousers->execute();
$followers_result = $sql_followedbytwousers->get_result(); 


$i = 0;
$val = 0;
while($row_followers = $followers_result->fetch_assoc()) {

?>
    <h4 class ="head" id="displayTitle"style="font-family:Lobster Two; display:block;"><?php 
    echo "Username: ", $row_followers["followed"], "  Users that follow: ", $userX, ", ", $userY, "."; $val = 1; ?></h4>

<?php
$i++;
}


if($val != 1){
    if($userX != NULL){?>
    <h4 class ="head" id="displayPHPERROR"style="font-family:Lobster Two;" onload="load1()"><?php 
        
    
        echo "Either one or both of these users do not exist or there are no users followed by ", $userX, " and ", $userY; ?></h4>
        
    <?php
    }
}

?>

</div>
</div>
</div>  
  </div>


  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
<script>
    
    function load1(){
        var blankInput =  document.getElementById("displayPHPERROR");
        var userX = document.getElementById("inputUserXBox");
        var userY = document.getElementById("inputUserYBox");
        var userXvalue = userX.value;
        var userYvalue = userY.value;
        blankInput.style.display = "none";
    }
    </script>