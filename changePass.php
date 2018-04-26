<?php
    session_start();
    $oldPass = $_POST['opass'];
    $newPass = $_POST['npass'];
    $id = $_SESSION['ID'];

    $oldPass2 = md5($oldPass);
    $oldPass3 = md5($oldPass2.$id);
    $newPass2 = md5($newPass);
    $newPass3 = md5($newPass2.$id);

    include 'db_conn_test.php';

    $conn = OpenCon();

    $sql = "SELECT PASSWORD FROM USER WHERE ID = '$id' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($oldPass3 == $row["PASSWORD"]){

                $sql = "UPDATE USER SET PASSWORD = '$newPass3' WHERE ID = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                   
                } else {
                    echo "Error updating";
                }
                header('Location: profile.php?success=1');
            }
            else{
                //echo "Incorrect password";
                header('Location: profile.php?error=1');
            }
        }
    } else {
        echo "Failure 1";
        //back to homepage
    }

    closeCon($conn);

?>