
for(var j =0;j<10;j++){
    var divOne = document.getElementById('displayTitle');
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
   if(written.endsWith("*Negative")|| written.endsWith("*Positive")){
      
    var array = written.split("-",1);
    var a= array.toString();
    title.value=a.trim()+"\n *Positive"

   }else{
    var posWritten=title.value+"\n *Positive";
    title.value=posWritten;
}
}
function dislikeComment(){
    var title =document.getElementById("editCommentsBox");
    var written =title.value;
    if(written.endsWith("*Negative")|| written.endsWith("*Positive")){
        var array = written.split("-",1);
        var a= array.toString();
        title.value=a.trim()+"\n *Negative"
       }else{
        var posWritten=title.value+"\n *Negative";
        title.value=posWritten;
    }
   
}