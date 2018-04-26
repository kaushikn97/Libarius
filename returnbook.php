<?php

    session_start();
    $bid = $_GET['bookID'];

    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";

    $result = $conn->prepare("DELETE FROM TRANS WHERE BOOKID = '$bid'");
    $result->execute();
    $result2 = $conn->prepare("UPDATE BOOK SET AVAILABILITY='YES' WHERE ID = '$bid'");
    $result2->execute();

    header('Location: profile.php');

?>