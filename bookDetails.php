<?php
    session_start();
    $id = $_SESSION['ID'];
    $name = $_SESSION['Name'];
    $bid = $_GET['bookID'];

    // $id = '2015B2A70801H';
    // $name = 'Swayam';
    // $bid = 4;

    include 'db_conn_test.php';

    $conn = OpenCon();

    echo "Connected Successfully";

    if ($result = $conn->query("SELECT * FROM BOOK WHERE ID = '$bid'")) {
        echo "Success!";
    } else {
        echo "Error";
    }

    $row = $result->fetch_assoc();

    $bname = $row['Name'];
    $bauthor = $row['Author'];
    $bsubject = $row['Subject'];
    $btype = $row['Type'];
    //$btype = 'BUY';
    $bprice = $row['Price'];
    $bowid = $row['UserID'];

    $sqql = "SELECT * FROM USER WHERE ID = '$bowid'";
    echo $sqql;

    $result = $conn->query($sqql);

    $row = $result->fetch_assoc();


    $bowner = $row['Name'];

    if($btype == 'BUY')
        $current = 0;
    else {
        $current = 1;
    }
    $flag = 0;
    if($_GET){
    if(isset($_GET[$btype])){
        $stmt = $conn->prepare("INSERT INTO TRANS (PREV,NEXT,BOOKID,CURRENT) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii",$bowid,$id,$bid,$current);
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
            $flag =1;
        } else {
            echo "Error";
        }
        $update = "UPDATE BOOK SET AVAILABILITY = 'NO' WHERE ID = '$bid'";
        if ($conn->query($update) === TRUE) {
            echo 'Book upadted';
        } else {
            echo "Error updating record: " . $conn->error;
        }
        if($flag == 1)
            header('Location: dashboard.php?success=1');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Libarius</title>
<link rel="stylesheet" href="css/indexStyle.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
     th{
         text-align: center;
         }
     </style>
</head>

<body data-spy="scroll" data-target=".navbar-collapse">

    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
             <div class="navbar-header pull-left">
                 <a class="navbar-brand" href="dashboard.php">Libarius</a>
            </div>
            <div class="collapse navbar-collapse">
                <form class="navbar-form navbar-right" method = "post" action="logout.php">
                    <div class="hello">Hello, <?php echo $name ?></div>
                    <input type="submit" name="logout_submit" class="btn btn-success" value="Log Out"/>
                </form>
            </div>
        </div>
    </div>

    <div class="container contentContainer" id="topContainer">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="topRow">
                <h1 class="marginTop">Book Details</h1>
                <table class="table no-border table-hover marginTop">
                  <tr>
                    <td class = "bold">Book Name:</td>
                    <td><?php echo $bname ?> </td>
                  </tr>
                  <tr>
                    <td class = "bold">Author:</td>
                    <td><?php echo $bauthor ?></td>
                  </tr>
                  <tr>
                    <td class = "bold">Subject:</td>
                    <td><?php echo $bsubject ?></td>
                  </tr>
                  <tr>
                    <td class = "bold">Type:</td>
                    <td><?php echo $btype ?></td>
                  </tr>
                  <tr>
                    <td class = "bold">Price(in Rs.):</td>
                    <td><?php echo $bprice ?></td>
                  </tr>
                  <tr>
                    <td class = "bold">Owner:</td>
                    <td><?php echo $bowner ?></td>
                  </tr>
                </table>
                <form action = <?php echo 'transaction.php'; ?>>
                    <input type='hidden' value = <?php echo $bid ?> name = <?php echo 'bookID' ?> />
                    <input type="submit" class="btn btn-large btn-success" name="submit" value=<?php echo $btype ?> />
                </form>
        </div></div></div>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
