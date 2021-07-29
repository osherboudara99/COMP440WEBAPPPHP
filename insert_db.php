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

$query = $conn->prepare("INSERT INTO Users (`firstName`, `lastName`, `email`, `password`, `username`) 
VALUES (?, ?, ?, ?, ?)");

$query->bind_param('sssss', $fName, $lName, $mail, $pass, $Username);


if ($query->execute() === TRUE){
    !$conn->commit();
    echo "\nInsert worked";
    header("Location: index.php");
    exit();
}
else{
    echo "\nInsert did not work: " . $conn->error;
    echo "\nRedirecting......";
    header("Refresh: 5; url=signUp.php");
    exit();
}



?>