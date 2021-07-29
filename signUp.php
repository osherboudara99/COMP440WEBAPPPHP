<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .sign-up {
        display: flex;
        flex-direction: column;
        text-align: center;
        width: 500px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 60px
    }

    /*contols label under photo*/
    .picture-label {
        font-family: "Lobster Two", cursive;
        font-size: 4em;
        line-height: normal;
        display: block;
        text-align: center;
    }

    /*Controls full container of submission boxes*/
    .container {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        height: 50%;
    }

    .clearfix {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    /* css for the input fields */
    input[type=text],
    input[type=password],
    input[type=email] {
        padding: 15px;
        margin-top: 15px;
        border: none;

    }

    .link {
        color: antiquewhite;
    }

    .sign-button {
        margin-top: 8px;
        display: flex;
        align-items: center;
        justify-content: center;

    }
</style>

<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
    <link rel="stylesheet" href="style.css">


    <meta charset="UTF-8">
    <title>signUpDoc</title>

</head>
<div class="content-container">

    <main class="sign-up-frame">
        <div class="sign-up">

            <div class="blurred-box">
                <h1>Sign Up</h1>


                <div class="caption">
                    <img height="150px" src="https://media.giphy.com/media/13upfk8AyiPrdC/giphy.gif" alt="Image" />

                    <div class="picture-label">Website</div>
                </div>

                <form action="insert_db.php" method="post">

                    <input name = "test" type = "text" value="asfvdg">
                    <div class="ui input">
                        <input id="fName" name="fName" type="text" onkeyup="checkShow()" placeholder="First Name..." required>

                    </div>
                    <div id="notifyFirstName" class="ui black message" style="display:none;">
                        <i class="close icon" onclick="hideFirstName()"></i>
                        <div class="header">
                            Your first name is required.
                        </div>
                    </div>
                    <div class="ui input">
                        <input id="lName" name="lName" type="text" onkeyup="checkShow()" placeholder="Last Name..." required>

                    </div>
                    <div id="notifyLastName" class="ui black message" style="display:none;" >
                        <i class="close icon" onclick="hideLastName()"></i>
                        <div class="header">
                            Your last name is required.
                        </div>
                    </div>
                    <div class="ui input">
                        <input id="Username" name="Username" type="username" onkeyup="checkShow()" placeholder="Username..." required>
                    </div>
                    <div id="notifyUsername" class="ui black message" style="display:none;" >
                        <i class="close icon" onclick="hideUsername()"></i>
                        <div class="header">
                            Your username is required.
                        </div>
                    </div>
                    <div class="ui input">
                        <input id="mail" name="mail" type="email" onkeyup="checkShow()" placeholder="Email..." required>
                    </div>
                    <div id="notifyError" class="ui black message" style="display:none;">
                        <i class="close icon" onclick="hideMail()"></i>
                        <div class="header">
                            Your email is required.
                        </div>
                    </div>
                    <div class="ui input">
                        <input id="pass" name="pass" type="password" onkeyup="checkShow()" placeholder="Password..." required>
                    </div>
                    <div id="notifyPass" class="ui black message" style="display:none;">
                        <i class="close icon" onclick="hide()"></i>
                        <div class="header">
                            Your password is required.
                        </div>
                    </div>
                    <div class="ui input">
                        <input id="confirmPass" type="password" onkeyup="checkShow()" placeholder="Confirm Password..." required>
                    </div>
                    <div id="notifyConfirmPass" class="ui black message" style="display:none;">
                        <i class="close icon" onclick="hideConfirmPass()"></i>
                        <div class="header">
                            Your passwords must match.
                        </div>
                    </div>

                    <div class="sign-button">
                        <button type="submit" name="sub" class="ui blue button" id="checkSignUp" style="opacity: 0.6;
                        cursor: not-allowed;" value="Register" ><b>Register</b></button>

                    </div>


                    <a href="index.php">

                        <p class="link"><u>Already have an account? Log in here.</u></p>
                    </a>
                </form>
            </div>

        </div>

</div>
</main>
</div>
<script>
    function checkShow() {

        if (document.getElementById("fName") !== null && document.getElementById("fName").value !== "") {
            if (document.getElementById("lName") !== null && document.getElementById("lName").value !== "") {
                if (document.getElementById("Username") !== null && document.getElementById("Username").value !== "") {
                    if (document.getElementById("mail") !== null && document.getElementById("mail").value !== "") {
                        if (document.getElementById("pass") !== null && document.getElementById("pass").value !== "") {
                            if (document.getElementById("confirmPass") !== null && document.getElementById("confirmPass").value !== "") {
                                if (document.getElementById("pass").value === document.getElementById("confirmPass").value) {
                                    document.getElementById("checkSignUp").style.cursor = "pointer";
                                    document.getElementById("checkSignUp").style.opacity = "1";
                                    document.getElementById("notifyConfirmPass").style.display = "none";
                                }
                            }
                        }
                    }
                }
            }
        }
        // hide the error block if the password and confirm pass equal
        if (document.getElementById("pass").value === document.getElementById("confirmPass").value) {
            document.getElementById("notifyConfirmPass").style.display = "none";
        }
        // if the values don't for password and confrim pass then box is unclickable and the error pops up
        if (document.getElementById("pass").value !== document.getElementById("confirmPass").value) {
            document.getElementById("checkSignUp").style.cursor = "not-allowed";
            document.getElementById("checkSignUp").style.opacity = "0.6";
            document.getElementById("notifyConfirmPass").style.display = "block";
        }
        // makes the box unclickable if the input have a value that equals ""
        if (document.getElementById("mail") !== null && document.getElementById("mail").value === "") {
            document.getElementById("checkSignUp").style.cursor = "not-allowed";
            document.getElementById("checkSignUp").style.opacity = "0.6";
        }
        if (document.getElementById("pass") !== null && document.getElementById("pass").value === "") {
            document.getElementById("checkSignUp").style.cursor = "not-allowed";
            document.getElementById("checkSignUp").style.opacity = "0.6";
        }
        if (document.getElementById("confirmPass") !== null && document.getElementById("confirmPass").value === "") {
            document.getElementById("checkSignUp").style.cursor = "not-allowed";
            document.getElementById("checkSignUp").style.opacity = "0.6";
        }
       
        if (document.getElementById("fName") !== null && document.getElementById("fName").value === "") {
            document.getElementById("checkSignUp").style.cursor = "not-allowed";
            document.getElementById("checkSignUp").style.opacity = "0.6";
        }
        if (document.getElementById("lName") !== null && document.getElementById("lName").value === "") {
            document.getElementById("checkSignUp").style.cursor = "not-allowed";
            document.getElementById("checkSignUp").style.opacity = "0.6";
        }
        if (document.getElementById("Username") !== null && document.getElementById("Username").value === "") {
            document.getElementById("checkSignUp").style.cursor = "not-allowed";
            document.getElementById("checkSignUp").style.opacity = "0.6";
        }
    
    }
    function hideMail() {
        document.getElementById("notifyError").style.display = "none";
    }
    function hide() {
        document.getElementById("notifyPass").style.display = "none";
    }
    function hideFirstName() {
        document.getElementById("notifyFirstName").style.display = "none";
    }
    function hideLastName() {
        document.getElementById("notifyLastName").style.display = "none";
    }
    function hideUsername() {
        document.getElementById("notifyUsername").style.display = "none";
    }
    function hideConfirmPass() {
        document.getElementById("notifyConfirmPass").style.display = "none";
    }
    
</script>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>

