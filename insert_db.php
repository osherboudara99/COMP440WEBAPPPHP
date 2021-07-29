<?php 

include("db.php");

/*function insert_signup($conn, $fName, $lName, $mail, $pass, $Username){
    $query = "INSERT INTO Users (`firstName`, `lastName`, `email`, `password`, `username`) 
        VALUES ('$fName', '$lName', '$mail', '$pass', '$Username')";


    if ($conn->query($query) === TRUE){
        !$conn->commit();
        echo "Insert worked";
    }
    else{
        echo "error insert" . $conn->error;
    }
}*/


$fName = strval($_POST["fName"]);
$lName = strval($_POST["lName"]);
$mail = strval($_POST["mail"]);
$pass = strval($_POST["pass"]);
$Username = strval($_POST["Username"]);

$query = "INSERT INTO Users (`firstName`, `lastName`, `email`, `password`, `username`) 
VALUES ('".strval($_POST['fName'])."', '".strval($_POST['lName'])."', '".strval($_POST['mail'])."', 
'".strval($_POST['pass'])."', '".strval($_POST['Username'])."')";


if ($conn->query($query) === TRUE){
!$conn->commit();
echo "Insert worked";
}
else{
echo "error insert" . $conn->error;
}
echo $Username;


?>