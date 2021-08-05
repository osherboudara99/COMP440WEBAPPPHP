<style>
    @import url("https://fonts.googleapis.com/css2?family=Lobster+Two&family=Raleway:ital,wght@0,400;1,300&family=Staatliches&display=swap");
    .head{
    color:antiquewhite;
    font-family: cursive;
    font-size: 3em;
    text-align:center;
    margin-left:25ex;
    
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
<script src="blogCreateFunctions.js"></script>
<form action="createblog_db.php" method="post">
<div id="title">
<meta charset="UTF-8">
<div class="header">
<div class="blurred-box" style=" vertical-align:top;">
    <div class="ui action input error" id="titleGroupBox">
      <div class="titleCont">
    <h1 class ="head" id="displayTitle"style="font-family:Lobster Two; display:block;">Blog Name</h1>
</div>
<div class = "inputBoxTitle">
  <input type="text" value="" id="editTitleBox" name= "subject" placeholder="Blog Name...."style="display:none;width:400px;" required>
</div>
  <div class ="buttonGroupTitle" id="iconGroup">
  <div class="ui vertical animated blue button"onclick="editTitle()" >
  <div class="hidden content">Edit</div>
  <div class="visible content">
    <i class="edit icon" ></i>
  </div>
</div>
<div class="ui vertical animated blue button" onclick="saveTitle()" >
  <div class="hidden content">Save</div>
  <div class="visible content">
    <i class="save icon"></i>
  </div>
</div>
</div>
</div>  
  </div>
</div>

<div class="row">
  <div class="leftcolumn" style="margin-left:10%;">
    <div class="card">
    <div class="blurred-box">
        <div style="margin-left:124ex;" class ="descriptionButtonGroup">
  <div class="ui vertical animated blue button"   onclick="editDescr()">
  <div class="hidden content">Edit</div>
  <div class="visible content">
    <i class="edit icon"></i>
  </div>
</div>

<div class="ui vertical animated blue button"  onclick="saveDescr()" >
  <div class="hidden content">Save</div>
  <div class="visible content">
    <i class="save icon"></i>
  </div>
</div>
</div>
<div class="ui error form " style="height:60ex;">
<div class="field error">
    <textarea type="text" id="editDescrBox" name="description" value="" placeholder="Description..." style="height:60ex; display:none;" required></textarea>
    </div>
    <div class="Description box">
<h2 class ="descr" id="displayDescr"style="font-family:Lobster Two; display:block; color:antiquewhite;">Description</h2>
</div>
</div>
</div>
</div>
</div>

  
<div class ="leftcolumn"style="margin-left:10%;" >
    <div class="card">
    <div class="blurred-box" >
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;">Tags</h2>
      <div class="mini ui vertical animated blue button" style="margin-left:175ex;" onclick="addTag()">
  <div class="hidden content">Add</div>
  <div class="visible content">
    <i class="plus icon" ></i>
  </div>
</div>
<div class="ui error form " >
<div class="field error">
    <input type="text" name="tags" id="editTagBox" value="" placeholder="Add Tags Separated By Commas..." style="width:94%; display:none;">
    <div style="width:5%; display:none" id="saveTagButton" class="small ui vertical animated blue button"  onclick="saveTag()" >
  <div class="hidden content">Save</div>
  <div class="visible content">
    <i class="save icon"></i>
</div>
</div>
<div id="savedTagBox">


    </div>
  </div>
</div>
</div>
<div class="submit-blog-button">
            <button class="ui blue button" id="blog_submit_Button" type="submit" style="opacity: 0.6;
            cursor: not-allowed;" >Submit Blog</button>
        </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>

