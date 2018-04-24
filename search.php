<?php
session_start();
include 'db_conn_test.php';
$searchby = $_GET['search_by'];
$searchphrase = $_GET['search_phrase'];
$conn = OpenCon();
$sql = "SELECT Name , Author, Price, Type FROM BOOK WHERE $searchby = '$searchphrase'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"]. "Author: " . $row["Author"]. "<br>";
    }
} else {
    echo "0 results";
}

 ?>
