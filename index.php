<style>
    .signup-button p {
        line-height: 1.5;
        text-align: center;
        color:white;
        margin-top: 10%;
    }

    .content-container {
        display: flex;
        flex-direction: column;
        text-align: center;
        width: 500px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 60px
    }
 

    .frame {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-holder {
        width: 150px;
    }

    .center {
        display: block;
        width: 100%;
        height: auto;
        margin: 0 auto;
    }


    .sign-button {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .picture-label {
        font-family: "Lobster Two", cursive;
        font-size: 4em;
        line-height: normal;
        display: block;
        text-align: center;
    }
    .input {
        margin-bottom: 15px;
        margin-top: 10px;
    }






</style>
<div class="container">
    <div class="content-container">
        <div class ="blurred-box">
        <h1>
            Sign In
        </h1>
        <div class="frame">
            <div>
                <img height="150px" src="https://media.giphy.com/media/13upfk8AyiPrdC/giphy.gif" alt="Image" />
            </div>
        </div>
        <div class="picture-label">Website </div>
        <div class="ui input">
            <input type="Username" id="Username" onkeyup="checkShow()" placeholder="Username...">
        </div>
        <div id="notifyError" class="ui black message" style="display:none;">
            <i class="close icon" onclick="hideMail()"></i>
            <div class="header">
                Your username was incorrect.
            </div>
        </div>
        <div class="ui input">
            <input type="password" id="pass" onkeyup="checkShow()" placeholder="Password...">
        </div>
        <div id="notifyPass" class="ui black message" style="display:none;">
            <i class="close icon" onclick="hide()"></i>
            <div class="header">
                Your password was incorrect.
            </div>
        </div>
        <div class="sign-button">
            <button class="ui blue button" id="deButton" type="submit" style="opacity: 0.6;
            cursor: not-allowed;" >Sign In</button>
        </div>
        <div class="signup-button">
            <a href="signUp.php">
                <p><u>Not registered yet? Sign up here</u></p>
            </a>
        
        </div>
    </div>
    </div>
    
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script>
      function checkButton() {
        if (document.getElementById("Username") !== null && document.getElementById("Username").value === "") {
            document.getElementById("notifyError").style.display = "block" ;
        }
        if (document.getElementById("pass")!== null && document.getElementById("pass").value === "") {
            document.getElementById("notifyPass").style.display = "block" ;
        }
    }
   function checkShow()  {
       
        if (document.getElementById("Username") !== null && document.getElementById("Username").value !== "") {
            if (document.getElementById("pass")!== null && document.getElementById("pass").value !== "") {
            document.getElementById("deButton").style.cursor = "pointer" ;
            document.getElementById("deButton").style.opacity="1";
        }
    }
    if (document.getElementById("Username") !== null && document.getElementById("Username").value === "") { 
        document.getElementById("deButton").style.cursor = "not-allowed" ;
            document.getElementById("deButton").style.opacity="0.6";
    }
        if (document.getElementById("pass")!== null && document.getElementById("pass").value === "") {
            document.getElementById("deButton").style.cursor = "not-allowed" ;
            document.getElementById("deButton").style.opacity="0.6";
        }   
    
}
    function hideMail() {
        document.getElementById("notifyError").style.display = "none" ;
    }
    function hide(){
        document.getElementById("notifyPass").style.display = "none" ;
    }
</script>