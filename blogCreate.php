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
  <div class="leftcolumn">
    <div class="card">
    <div class="blurred-box">
    <div class="ui action input error">
  <input type="text" value="$52.03" style="display:none">
  <div class="ui vertical animated blue button" >
  <div class="hidden content">Edit</div>
  <div class="visible content">
    <i class="edit icon"></i>
  </div>
</div>

<div class="ui vertical animated blue button" >
  <div class="hidden content">Save</div>
  <div class="visible content">
    <i class="save icon"></i>
  </div>
</div>
</div>
<div class="ui input error">
      <h5>Title description, Dec 7, 2017</h5>
      <p>Some text..</p>
</div>
    </div>
</div>
    <div class="blurred-box">
    <div class="card">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>
    </div>
</div>
  </div>

  <div class="rightcolumn">

    <div class="card">
    <div class="blurred-box">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
</div>

    <div class="card">
    <div class="blurred-box">
      <h3>Follow Me</h3>
      <p>Some text..</p>
</div>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>

