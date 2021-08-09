<?php 
include("db.php");

$filename = 'DBProject_withUserID.sql';
$tempLine = '';
// Read in the full file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line) {

    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

    // Add this line to the current segment
    $tempLine .= $line;
    // If its semicolon at the end, so that is the end of one query
    if (substr(trim($line), -1, 1) == ';')  {
        // Perform the query
        mysqli_query($conn, $tempLine) or print("Error in " . $tempLine .":". mysqli_error($conn));
        // Reset temp variable to empty
        $tempLine = '';
    }
}

$query_delimiter = $conn->prepare(" 
CREATE DEFINER = `comp440`@`localhost` PROCEDURE 
`insert_blog` (sub varchar(250), des varchar (500), postDate varchar(25), user_id varchar(25))
BEGIN IF
(SELECT COUNT(*) FROM `blogs` WHERE `userID` = userID AND pdate = DATE(NOW())) < 2
THEN INSERT INTO `blogs` (`subject`, `description`, `pdate`, `userID`) VALUES (sub, des, postDate, user_id);
END IF;
END;");

 /*$result = $query_delimiter->execute();

 if($result === TRUE){

*/
 echo "Tables imported successfully";
 header("Location: blogFromOther.php");
 exit();
 /*}
 else{
     echo $conn->error;
 }*/
?>