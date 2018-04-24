<HTML><HEAD><TITLE>My Profile</TITLE></HEAD>


<BODY>
<?php

    session_start();
    // $name = $_POST['name'];
    $userID = $_SESSION['ID'];
    var_dump($_POST);

    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";

    $name = $conn->prepare("SELECT NAME FROM USER WHERE ID = ''$userID'");

    if ($name->execute() === TRUE) {
        echo "Success!";
    } else {
        echo "Error";
    }

    echo "User ID: ".$userID."<br />User Name: ".$name;


?>

</BODY></HTML>
