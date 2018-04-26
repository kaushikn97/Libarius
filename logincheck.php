    <?php
    session_start();
    $id = $_POST["login_id"];
    $pass = $_POST["login_pass"];
    $pass2 = md5($pass);
    $pass3 = md5($pass2.$id);
    echo $id;
    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";

    $sql = "SELECT * FROM USER WHERE ID = '$id' ";
    $result = $conn->query($sql);
    echo $sql;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo $row["Password"];
            //echo "****";
            //echo $pass3;
            if($pass3 == $row["Password"]){
                echo "Login successful";

                $_SESSION['ID'] = $id;

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
                $_SESSION["Name"] = $name;
                header('Location: dashboard.php');
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
