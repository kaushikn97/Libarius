<HTML><HEAD><TITLE>My Profile</TITLE></HEAD>


<BODY>
<?php

    session_start();
    // $name = $_POST['name'];
    $userID = $_SESSION['ID'];
    $name = $_SESSION['NAME'];
    var_dump($_POST);

    echo "Name: ".$name."<br>User ID: ".$userID;

    include 'db_conn_test.php';
    $conn = OpenCon();
    echo "Connected Successfully";
    $sql = "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

        }
    } else {
        echo "0 results";
    }

?>

</BODY></HTML>
