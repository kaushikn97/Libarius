    <?php
    session_start();
    $id = $_POST["login_id"];
    $pass = $_POST["login_pass"];
    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";

    $sql = "SELECT PASSWORD FROM USER WHERE ID = '$id' ";
    $result = $conn->query($sql);
    echo $sql;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($pass == $row["PASSWORD"]){
                echo "Login successful";
                
                $_SESSION['ID'] = $id;
                header('Location: test.php');
                //go to dashboard
            }else{
                echo "Incorrect password";
                header('Location: index.php?error=1');
            }
        }
    } else {
        echo "Login Failed";
        header('Location: index.php?error=1');
        //back to homepage
    }
    closeCon($conn);
    ?>