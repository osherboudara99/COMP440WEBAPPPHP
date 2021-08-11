function load(){
//document.getElementById('buttonLED'+id).setAttribute('onclick','writeLED(1,1)')
var tables2 = document.getElementsByClassName("mini ui vertical animated blue button 2").length;
   
for(var j = 0; j < tables2; j++){
    var t= document.getElementById("saveButton2");
    var t2= "saveButton2"+j;
    t.setAttribute('id', t2.toString());
   
    var td= document.getElementById("editCommentsBox");
    var textBox = document.getElementById("saveCommentButton");
    var textBox2 = document.getElementById("likeCommentButton");
    var textBox3 = document.getElementById("dislikeCommentButton");
    var td0= "editCommentsBox"+j;
    var td1= "saveCommentBox"+j;
    var td2= "likeCommentBox"+j;
    var td3= "dislikeCommentBox"+j;
    td.setAttribute('id', td0.toString());
     textBox.setAttribute('id', td1.toString());
     textBox2.setAttribute('id', td2.toString());
     textBox3.setAttribute('id', td3.toString());
     //alert(t2 +" "+td0+" "+ td1+" "+td2+" "+td3);
    //document.getElementById(t2.toString()).onclick = addComment(j);
 // document.getElementById(t2.toString()).setAttribute('onclick',addComment(j));

}
for(var z =0;z<tables2;z++){
    var t2= "saveButton2"+z;
    var t= document.getElementById(t2.toString());
   // alert(z);
    document.getElementById(t2).onclick = (function(z) {
        return function() {
            addComment(z);
           
        };
    })(z);

}
for(var z =0;z<tables2;z++){
    var t2= "likeCommentBox"+z;
    var t= document.getElementById(t2.toString());
   // alert(z);
    document.getElementById(t2).onclick = (function(z) {
        return function() {
            likeComment(z);
           
        };
    })(z);

}
for(var z =0;z<tables2;z++){
    var t2= "dislikeCommentBox"+z;
    var t= document.getElementById(t2.toString());
   // alert(z);
    document.getElementById(t2).onclick = (function(z) {
        return function() {
            dislikeComment(z);
           
        };
    })(z);

}
for(var z =0;z<tables2;z++){
    var t2= "saveCommentBox"+z;
    var t= document.getElementById(t2.toString());
   // alert(z);
    document.getElementById(t2).onclick = (function(z) {
        return function() {
            saveComment(z);
           
        };
    })(z);

}
}
function myFunction(num){
    alert("myFunction called"+ num);
    }
function addComment(num){ 
   
   //alert(num);
    var word="editCommentsBox"+ num;
    var word2="saveCommentBox"+ num;
    var word3="likeCommentBox"+ num;
    var word4="dislikeCommentBox"+ num;
    var title = document.getElementById(word);
    title.style.display = "block";
    var textBox = document.getElementById(word2);
    textBox.style.display="inline-block";
    var textBox2 = document.getElementById(word3);
    textBox2.style.display="inline-block";
    var textBox3 = document.getElementById(word4);
    textBox3.style.display="inline-block";
   
}
/*function saveComment(num){
    var word="editCommentsBox"+ num;
    var word2="saveCommentBox"+ num;
    var word3="likeCommentBox"+ num;
    var word4="dislikeCommentBox"+ num;
    var title =document.getElementById(word);
    var written =title.value;
    title.style.display = "none";
    var textBox = document.getElementById(word2);
    textBox.style.display="none";
    var textBox2 = document.getElementById(word3);
    textBox2.style.display="none";
    var textBox3 = document.getElementById(word4);
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
*/
function likeComment(num){
    var word="editCommentsBox"+ num;
  
    var title =document.getElementById(word);
    var written =title.value;
    alert(title.value);
    if(written.endsWith("*Negative")|| written.endsWith("*Positive")){
      
        var array = written.split("*",1);
        var a= array.toString();
        title.value=a.trim()+"\n *positive";
    
       }

    var posWritten=title.value+"\n *s;klfhgj";
    title.value=posWritten.toLowerCase();
}
function dislikeComment(num){
    var word="editCommentsBox"+ num;
    var title =document.getElementById(word);
    var written =title.value;
    if(written.endsWith("*negative")|| written.endsWith("*positive")){
        var array = written.split("*",1);
        var a= array.toString();
        title.value=a.trim()+"\n *negative";
       }else{
        var posWritten=title.value+"\n *fg;ljksafg";
        title.value=posWritten.toLowerCase();
    }
   
}