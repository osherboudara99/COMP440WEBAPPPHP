<?php
    $fName = $_GET['fName'];
    $lName = $_GET['lName'];
    $mail = $_GET['mail'];
    $pass = $_GET['pass'];
    $Username = $_GET['Username'];


    $host="127.0.0.1";
    $port=3306;
    $socket="";
    $user="root";
    $password="";
    $dbname="webapp";
    
    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ('Could not connect to the database server' . mysqli_connect_error());
    
    //$con->close();
    

//$con->close();

    


    $query = "INSERT INTO Users (firstName, lastName, email, password, username) 
    VALUES ('$fName', '$lName', '$mail', '$pass', '$Username')";

    $query_insert = $con->query($query);


    if($query_insert)
    {
        echo "Insert worked";
    }


//$con->close();

//$con->close();



?>

