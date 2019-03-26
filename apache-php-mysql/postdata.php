<?php

require('config.php');
$jsonCont = file_get_contents('php://input');

// Converts it into a PHP object

$content = json_decode($jsonCont, true);


$lastName = $content['lastName'];
$firstName = $content['firstName'];
$extension = $content['extension'];
$email  = $content['email'];
$officeCode = $content['officeCode'];
$reportsTo = $content['reportsTo'];
$jobTitle = $content['jobTitle'];

$sql = "INSERT INTO employees2(lastName, firstName, extension, email, officeCode, reportsTo, jobTitle) 
VALUES('$lastName', '$firstName', '$extension', '$email', '$officeCode', '$reportsTo', '$jobTitle')"; 
if ($conn->query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

