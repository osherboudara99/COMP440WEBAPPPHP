<div class="six ui blue buttons" style="margin-bottom:2%; margin-top:2%; ">
  <button class="ui button" style="width:12%; margin-left:4%"onClick="location.href='moreInfo.php'">
  <i class=" comment alternative icon"></i>My Blogs With Positive Comments</button>
  <button class="ui button"style="width:12%;margin-left:4%" onClick="location.href='mostBlogs.php'">
  <i class=" calendar alternative outline icon"></i>Most Blogs On a Specific Date</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='blogFromMe.php'">
  <i class=" user icon"></i>Users Followed by Specificed Users</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='moreInfo.php'">
  <i class=" tags icon"></i>Blogs that Contain a Certain Tag</button>
  <button class="ui button" style="width:12%; margin-left:4%"onclick="location.href='moreInfo.php'">
  <i class=" user outline icon"></i>Display All Users that Have Not Posted Comments</button>
  <button class="ui button"style="width:12%;margin-left:4%" onClick="location.href='blogFromOther.php'">
  <i class=" home icon"></i>Main Menu</button>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
<link rel="stylesheet" href="style2.css">
<script src="blogShowFunctions.js"></script>
<hr size="8"  width="90%" color="white">  


<div class="blurred-box" id="titleBlurredBox"style="height:30ex;margin-top:5%; margin-left:20%;margin-right:20%; vertical-align:top;">
<div class="ui error form " style="height:20ex; margin-bottom:2%;">
<div class="field error">
<div class="titleCont">
    <h4  id="displayDate"style="text-align:center;font-family:Lobster Two; display:none;"></h4>
    <input name="subject" id="inputDateBox" onkeyup="onKeyDate()"style="display:inline-block; margin-left:15%; width: 50% "placeholder="Please Enter a Date as YYYY-MM-DD..." value ="">
    <button  style="width:5%;" id="saveDateButton" class="ui vertical animated blue button" onclick="checkDate()" >
  <div class="hidden content">Save</div>
  <div class="visible content">
    <i class="save icon"></i>
  </div>
</button>
<div id="notifyDate" class="ui black message" style="display:none;">
                        <i class="close icon" onclick="hideDateError()"></i>
                        <div class="header">
                            Your date is not in the correct format.
                        </div>
                    </div>
</div>
</div>
</div>  
  </div>
  <button type="submit" style="width:15%; margin-left:40%; margin-top:3%;display:none;" id="submitDateButton" class="ui vertical animated blue button"  >
  <div class="hidden content">Submit</div>
  <div class="visible content">
    <i class="checkmark icon"></i>
  </div>
</button>

  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
<script>
    function checkDate(){
        var dateInput =  document.getElementById("inputDateBox");
        var dateValue = dateInput.value;
        var validatePattern = /^(\d{4})(\-)(\d{1,2})(\-)(\d{1,2})$/;
       
        var dateValues = dateValue.match(validatePattern);
        var dtYear = dateValues[1];        
          dtMonth = dateValues[3];
          dtDay=  dateValues[5];
          if(dateValue === " "){
            document.getElementById("notifyDate").style.display = "block";
            document.getElementById("submitDateButton").style.display="none";
           
        } 
        if(dateValues == null){ 
            document.getElementById("notifyDate").style.display = "block";
            document.getElementById("submitDateButton").style.display="none";
        }else if(dateValue === ''){
            document.getElementById("notifyDate").style.display = "block";
            document.getElementById("submitDateButton").style.display="none";
           
        }  else if (dtMonth < 1 || dtMonth > 12) {
            document.getElementById("notifyDate").style.display = "block";
            document.getElementById("submitDateButton").style.display="none";
        } else if (dtDay < 1 || dtDay> 31) {
        document.getElementById("notifyDate").style.display = "block";
        document.getElementById("submitDateButton").style.display="none";
    }else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) {
        document.getElementById("notifyDate").style.display = "block";
        document.getElementById("submitDateButton").style.display="none";
    }else if (dtMonth == 2) {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay> 29 || (dtDay ==29 && !isleap)) {
        document.getElementById("notifyDate").style.display = "block";
        document.getElementById("submitDateButton").style.display="none";
        }
    } else{
            document.getElementById("notifyDate").style.display = "none";
            document.getElementById("displayDate").innerHTML = dateValue;
            document.getElementById("displayDate").style.display="block";
            document.getElementById("submitDateButton").style.display="block";
        
        }
    
       
        
    }
    function onKeyDate(){
        var dateInput =  document.getElementById("inputDateBox");
        var dateValue = dateInput.value;
        if(dateValue === ''){
            document.getElementById("notifyDate").style.display = "block";
            document.getElementById("submitDateButton").style.display="none";
           
        } 
    }
    function hideDateError() {
        document.getElementById("notifyDate").style.display = "none";
    }
    </script>