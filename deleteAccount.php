<?php
session_start();

$ID = $_SESSION['ID'];

include 'db_conn_test.php';

$conn = OpenCon();

echo "Connected Successfully";

$stmt = $conn->prepare("DELETE FROM USER WHERE ID='$ID'");
//$stmt->bind_param("s",$ID);

if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
    session_destroy();
    header("Location: index.php");
} else {
    echo $conn->error;
}



?>
