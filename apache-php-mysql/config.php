<?php
$servername = "192.168.64.2";
$username = "root";
$password = "1234";
$dbname = "classicmodels";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($link === false) {
    die("Connection failed: " . $conn->connect_error);
} 
// $sql = "SELECT * FROM customers";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["customerNumber"]. " - Name: " . $row["customerNumber"]. " " . $row["contactLastName"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
//$conn->close();
?>