<HTML><HEAD><TITLE>HTML Form </TITLE></HEAD>


<BODY>
<?php

    session_start();
    $name = $_POST['name'];
    $userID = $_SESSION['ID'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $type = $_POST['radio'];
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
        header('Location: dashboard.php?added=1');
    } else {
        echo '<script type="text/javascript">alert("Book added")</script>';
    }


?>
    </BODY></HTML>
