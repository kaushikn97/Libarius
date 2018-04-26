<?php

    session_start();
    $bid = $_GET['bookID'];
    $name = $_POST['name'];
    $userID = $_SESSION['ID'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $type = $_POST['radio'];
    $cat = $_POST['category'];
    $avail = 'YES';

    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";
    echo $bid;
    $sql = "UPDATE BOOK SET Name='$name', Price=$price, Type='$type', Subject='$cat', Author='$author' WHERE ID=$bid";
    $stmt = $conn->query($sql) or die($conn->error);
    echo $sql;
        header('Location: dashboard.php?updated=1');


?>
