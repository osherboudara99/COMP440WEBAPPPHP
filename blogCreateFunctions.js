function editTitle() {
    var title =document.getElementById("editTitleBox");
    title.style.display = "block";
    var textBox = document.getElementById("displayTitle");
    textBox.style.display="none";
    var box = document.getElementById("titleGroupBox");
    var marginIcon= document.getElementById("iconGroup");
    marginIcon.style.marginLeft="25%";
    
}
function saveTitle(){
    var title =document.getElementById("editTitleBox");
    var written =title.value;
    title.style.display = "none";
    var textBox = document.getElementById("displayTitle");
    textBox.innerHTML=written;
    textBox.style.display="block";
    textBox.style.textAlign="center";
   
    
    var box = document.getElementById("titleGroupBox");
   
    box.style.width="200ex";
    box.style.flexDirection="row";
    
    var marginIcon= document.getElementById("iconGroup");
    marginIcon.style.marginLeft="25%";

    marginIcon.style.display="block";
}
function editDescr(){
    var title =document.getElementById("editDescrBox");
    title.style.display = "block";
    var textBox = document.getElementById("displayDescr");
    textBox.style.display="none";
}
function saveDescr(){
    var title =document.getElementById("editDescrBox");
    var written =title.value;
    title.style.display = "none";
    var textBox = document.getElementById("displayDescr");
    textBox.innerHTML=written;
    textBox.style.display="block";
}
function addComment(){
    var title =document.getElementById("editCommentsBox");
    title.style.display = "block";
    var textBox = document.getElementById("saveCommentButton");
    textBox.style.display="inline-block";
    var textBox2 = document.getElementById("likeCommentButton");
    textBox2.style.display="inline-block";
    var textBox3 = document.getElementById("dislikeCommentButton");
    textBox3.style.display="inline-block";
}
function saveComment(){
    var title =document.getElementById("editCommentsBox");
    var written =title.value;
    title.style.display = "none";
    var textBox = document.getElementById("saveCommentButton");
    textBox.style.display="none";
    var textBox2 = document.getElementById("likeCommentButton");
    textBox2.style.display="none";
    var textBox3 = document.getElementById("dislikeCommentButton");
    textBox3.style.display="none";
    if(title.value !== ''){
        title.value=" ";
    var divOne = document.getElementById('SavedCommentBox');
// create a new element
var divThree= document.createElement('div');
// add a class 'three' to a newly created element
divThree.classList.add('blurred-box');
// and add a newly created element to divOne
divOne.appendChild(divThree);

// now create a div for text, set its class to 'text' and append it to divThree
var txt = document.createElement('h3');
txt.classList.add('comment');
txt.innerHTML = written;
txt.setAttribute('style','font-family:Lobster Two; display:block; color:antiquewhite');
divThree.appendChild(txt);
}
}
function likeComment(){
    var title =document.getElementById("editCommentsBox");
    var written =title.value;
   if(written.endsWith("-Negative")|| written.endsWith("-Positive")){
      
    var array = written.split("-",1);
    var a= array.toString();
    title.value=a.trim()+"\n -Positive"

   }else{
    var posWritten=title.value+"\n -Positive";
    title.value=posWritten;
}
}
function dislikeComment(){
    var title =document.getElementById("editCommentsBox");
    var written =title.value;
    if(written.endsWith("-Negative")|| written.endsWith("-Positive")){
        var array = written.split("-",1);
        var a= array.toString();
        title.value=a.trim()+"\n -Negative"
       }else{
        var posWritten=title.value+"\n -Negative";
        title.value=posWritten;
    }
   
}
function editTag(){
    var title =document.getElementById("editTagBox");
    title.style.display = "inline-block";
    var textBox = document.getElementById("saveTagButton");
    textBox.style.display="none";
   
}
function saveTag(){
    var title =document.getElementById("editTagBox");
    var written =title.value;
    title.style.display = "none";
      
var divOne = document.getElementById('displayTags');
divOne.innerHTML=written;
divOne.style.display="block";
}