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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
<link rel="stylesheet" href="style2.css">
<script src="blogCreateFunctions.js"></script>

<div id="title">
<meta charset="UTF-8">
<div class="header">
<div class="blurred-box" style=" vertical-align:top;">
    <div class="ui action input error" id="titleGroupBox">
      <div class="titleCont">
    <h1 class ="head" id="displayTitle"style="font-family:Lobster Two; display:block;">Blog Name</h1>
</div>
<div class = "inputBoxTitle">
  <input type="text" value="" id="editTitleBox" placeholder="Blog Name...."style="display:none;width:400px;">
</div>
  <div class ="buttonGroupTitle" id="iconGroup">
  <div class="ui vertical animated blue button"style="display:none;"onclick="editTitle()" >
  <div class="hidden content">Edit</div>
  <div class="visible content">
    <i class="edit icon" ></i>
  </div>
</div>
<div class="ui vertical animated blue button" style="display:none;" onclick="saveTitle()" >
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
  <div class="leftcolumn">
    <div class="card">
    <div class="blurred-box">
        <div style="margin-left:120ex;" class ="descriptionButtonGroup">
  <div class="ui vertical animated blue button" style="display:none;"  onclick="editDescr()">
  <div class="hidden content">Edit</div>
  <div class="visible content">
    <i class="edit icon"></i>
  </div>
</div>

<div class="ui vertical animated blue button" style="display:none;"  onclick="saveDescr()" >
  <div class="hidden content">Save</div>
  <div class="visible content">
    <i class="save icon"></i>
  </div>
</div>
</div>
<div class="ui error form " style="height:60ex;">
<div class="field error">
    <textarea type="text" id="editDescrBox" value="" placeholder="Description..." style="height:60ex; display:none;"></textarea>
    </div>
    <div class="Description box">
<h2 class ="descr" id="displayDescr"style="font-family:Lobster Two; display:block; color:antiquewhite;">Description</h2>
</div>
</div>

</div>
</div>
</div>

  <div class="rightcolumn">

    <div class="card">
    <div class="blurred-box">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;">Comments</h2>
      <div class="mini ui vertical animated blue button" style="margin-left:16ex;" onclick="addComment()">
  <div class="hidden content">Add</div>
  <div class="visible content">
    <i class="plus icon" ></i>
  </div>
</div>
<div class="ui error form " style="height:60ex;">
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
<div class ="leftcolumn">
    <div class="card">
    <div class="blurred-box">
      <h2 style="font-family:Lobster Two; display:inline-block; color:antiquewhite;">Tags</h2>
      <div class="mini ui vertical animated blue button" style=" display: none;margin-left:175ex;" onclick="addTag()">
  <div class="hidden content">Add</div>
  <div class="visible content">
    <i class="plus icon" ></i>
  </div>
</div>
<div class="ui error form " >
<div class="field error">
    <input type="text" id="editTagBox" value="" placeholder="Add a Tag..." style="width:94%; display:none;">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
