<HTML><HEAD><TITLE>HTML Form </TITLE></HEAD>


<BODY>
    <?php
    echo "Your name is". $_POST["Name"];
    echo "Your ID is". $_POST["ID"];
    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";

    $stmt = $conn->prepare("INSERT INTO sample (ID,Name) VALUES (?, ?)");
    $stmt->bind_param("is",$_POST["ID"],$_POST["Name"]);
    ;
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error";
    }

    $sql = "SELECT * FROM sample";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["ID"]. " - Name: " . $row["Name"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    ?>
</BODY> </HTML>
