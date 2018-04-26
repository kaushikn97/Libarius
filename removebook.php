<?php

    session_start();
    $bid = $_GET['bookID'];

    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";

    $result = $conn->prepare("DELETE FROM BOOK WHERE ID = '$bid'");
    $result->execute();
    header('Location: profile.php');

    

?>