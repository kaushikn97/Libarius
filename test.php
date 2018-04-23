<?php
    session_start();
    $id = $_SESSION['ID'];
    include 'db_conn_test.php';
    $conn = OpenCon();
    $sql = "SELECT Name FROM USER WHERE ID = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $name = $row['Name'];
        }
    } else {
        echo "0 results";
    }

    echo $name;
    echo $id;

    closeCon($conn);

?>