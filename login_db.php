<?php 

include("db.php");



$query = "SELECT * FROM Users";

$result = mysqli_query($conn, $query);


    while($r = mysqli_fetch_array($result)){
        echo $r['UserID']. " ". $r['UserName']. " ". $r['password'];
    }





?>