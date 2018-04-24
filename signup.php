<HTML><HEAD><TITLE>HTML Form </TITLE></HEAD>


<BODY>

<?php
    session_start();
    $name = $_POST["sign_name"];
    $id = $_POST["sign_id"];
    $pass = $_POST["sign_pass"];

    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";
    echo $name;
    echo $id;
    echo $password;
    $stmt = $conn->prepare("INSERT INTO USER (ID,Name,Password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",$id,$name,$pass);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
        $_SESSION['ID'] = $id;
        header('Location: dashboard.php');
    } else {
        echo "Error";
        header("Location: index.php?error=2");
    }
    closeCon($conn);
    ?>
    </BODY> </HTML>
