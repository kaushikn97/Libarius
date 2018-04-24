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

    $sql = "SELECT NAME FROM USER WHERE ID = '$userID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["NAME"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    //echo "User ID: ".$userID."<br/> User Name: ".;


?>

</BODY></HTML>
