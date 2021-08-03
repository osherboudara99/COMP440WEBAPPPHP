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