<?php
session_start();
$id = $_SESSION['ID'];
$name = $_SESSION['Name'];
$bid = $_GET['bookID'];

// $id = '2015B2A70801H';
// $name = 'Swayam';
// $bid = 4;

include 'db_conn_test.php';

$conn = OpenCon();

echo "Connected Successfully";

if ($result = $conn->query("SELECT * FROM BOOK WHERE ID = '$bid'")) {
    echo "Success!";
} else {
    echo "Error";
}

$row = $result->fetch_assoc();

$bname = $row['Name'];
$bauthor = $row['Author'];
$bsubject = $row['Subject'];
$btype = $row['Type'];
//$btype = 'BUY';
$bprice = $row['Price'];
$bowid = $row['UserID'];

$sqql = "SELECT * FROM USER WHERE ID = '$bowid'";
echo $sqql;

$result = $conn->query($sqql);

$row = $result->fetch_assoc();


$bowner = $row['Name'];

if($btype == 'BUY')
    $current = 0;
else {
    $current = 1;
}
$flag = 0;
if($_GET){
if(isset($_GET['bookID'])){
    echo'In Get';
    $stmt = $conn->prepare("INSERT INTO TRANS (PREV,NEXT,BOOKID,CURRENT) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii",$bowid,$id,$bid,$current);
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
        $flag =1;
    } else {
        echo "Error";
    }
    $update = "UPDATE BOOK SET AVAILABILITY = 'NO' WHERE ID = '$bid'";
    if ($conn->query($update) === TRUE) {
        echo 'Book upadted';
    } else {
        echo "Error updating record: " . $conn->error;
    }
    if($flag == 1)
        header('Location: dashboard.php?success=1');
}
}

 ?>
