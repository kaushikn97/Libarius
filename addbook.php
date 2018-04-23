<HTML><HEAD><TITLE>HTML Form </TITLE></HEAD>


<BODY>
<?php

    session_start();
    $name = $_POST['name'];
    $userID = $_SESSION['ID'];
    //$userID = '2015B5A70747H';
    $price = $_POST['price'];
    $author = $_POST['author'];
    $type = $_POST['type'];
    $cat = $_POST['category'];
    $avail = 'YES';
    var_dump($_POST);

    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";

    $stmt = $conn->prepare("INSERT INTO BOOK (Name, UserID, Price, Type, Availability, Subject, Author) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("ssissss",$name,$userID,$price,$type,$avail,$cat,$author);
    ;
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error";
    }
    

?>
    </BODY></HTML>