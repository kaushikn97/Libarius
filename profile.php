<?php
session_start();
include 'db_conn_test.php';
$name=$_SESSION['Name'];
$userID=$_SESSION['ID'];
$conn =Opencon();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Profile</title>

    <script src="js/jquery-3.1.1.min.js">

    </script>

    <script src="js/bootstrap.min.js">

    </script>
    <script src="js/jquery.table2excel.min.js">
    </script>

    <style>
         .navbar-brand {
         font-size:1.8em;
        }

#topContainer {
         background-image:url("images/login_bg.jpg");
         height:400px;
         width:100%;
         background-size:cover;
         }

#topRow {
         margin-top:80px;
         text-align:center;
}

#topRow h1 {
         font-size:300%;
}

#emailSignup {
         margin-top:50px;
}

.bold {
         font-weight:bold;
         font-size: 120%;
}
.general {
        font-size: 120%;
}
.marginTop {
         margin-top:30px;
}

.center {
         text-align:center;
    }

.table.center tr td, .table.center tr th {

    text-align: center;
}

.title {
         margin-top:100px;
         font-size:300%;
}
          .hello {
        float:left;
        margin: 7px 10px 0 0;
        font-size: 16px;
    }
         #footer {
         background-color:#B0D1FB;
         padding-top:70px;
         width:100%;
}

.marginBottom {
         margin-bottom:30px;
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
                <form class="navbar-form navbar-right" method = "post" action = 'logout.php' >
                    <div class="hello">Hello, <?php echo $name ?></div>
                    <input type="submit" name="logout_submit" class="btn btn-success" value="Log Out"/>
                </form>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <form method="post" action = "changePass.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="opass">Old Password:</label>
                        <input required type="password" name="opass" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="npass">New Password:</label>
                        <input required type="password" name="npass" class="form-control"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onClick="form_submit()" name="logout_submit" class="btn btn-success" value="Log Out">Change password</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container contentContainer " id="topContainer" >
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="topRow">
                <h1 class="marginTop">My Profile</h1><hr>
                <p class="general" align="left"><strong>Name: </strong><?php echo $name ?></p>
                <p class="general" align="left"><strong>BITS ID: </strong><?php echo $userID ?></p>


            </div>
        </div>
        <div class="row marginTop">
            <div class="col-md-3 col-md-offset-3 center">
                <button type="button" class="btn btn-info btn-large" data-toggle="modal" data-target="#myModal">Change Password</button>
            </div>
            <div class="col-md-3  center">
                <button type="button" class="btn btn-danger btn-large"> <a style='color:white;' href="deleteAccount.php"> Delete Account</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 center" >
                <p class="bold marginTop" align="left">Current Posts</p>
            <div class="table-responsive" >
                <table id="current_posts" class="table center table-hover">
                    <tr>
                        <th>S.No.</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php

                        $sql = "SELECT * FROM BOOK WHERE UserID='$userID' AND Availability='YES'";
                        $result = $conn->query($sql);

                        $count=1;

                        if($result->num_rows>0){

                            while($row=$result->fetch_assoc()){

                                $bid=$row['ID'];
                                $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
                                $result2 = $conn->query($sql2)  or die($conn->error);
                                $row2 = $result2->fetch_assoc();
                                echo "<tr>";
                                echo "<td style='vertical-align:middle;'>" . $count . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Name'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Author'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Price'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Type'] . "</td>";
                                echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-danger btn-sm'><a style='color:white;' href=\"editbook.php?bookID=".$row['ID']."\">Edit</a> </button></td>";
                                echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-danger btn-sm'><a style='color:white;' href=\"removebook.php?bookID=".$row['ID']."\">Delete</a> </button></td>";
                                echo "</tr>";
                                $count = $count+1;

                            }

                        } else{
                            //echo "0 results";
                        }

                    ?>


                </table>
            </div>
                <div align="center">
                <?php     echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-success btn-sm'><a style='color:white;' href=\"excel.php?table=curr&ID=".$userID."\">Create .csv</a> </button></td>";?>

                </div>
                <p class="bold" align="left">Books Sold</p>
                <table class="table center table-hover ">
                    <tr>
                        <th>S.No.</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Buyer</th>
                    </tr>

                    <?php

                        $sql = "SELECT * FROM TRANS WHERE PREV='$userID' AND STATUS=0";
                        //echo $sql;
                        $result = $conn->query($sql);

                        $count=1;

                        if($result->num_rows>0){

                            while($row=$result->fetch_assoc()){

                                $bid=$row['BOOKID'];
                                $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
                                $result2 = $conn->query($sql2)  or die($conn->error);
                                $row2 = $result2->fetch_assoc();
                                $buyerid = $row['NEXT'];
                                $sql3 = "SELECT * FROM USER WHERE ID = '$buyerid' ";
                                $result3 = $conn->query($sql3)  or die($conn->error);
                                $row3 = $result3->fetch_assoc();
                                $buyer = $row3['Name'];

                                echo "<tr>";
                                echo "<td style='vertical-align:middle;'>" . $count . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Name'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Author'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Price'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $buyer . "</td>";
                                echo "</tr>";
                                $count = $count+1;

                            }

                        } else{
                            //echo "0 results";
                        }

                    ?>

                </table>
                <div align="center">
                <?php     echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-success btn-sm'><a style='color:white;' href=\"excel.php?table=sold&ID=".$userID."\">Create .csv</a> </button></td>";?>

                </div>
                <p class="bold" align="left">Books Bought</p>
                <table class="table center table-hover ">
                    <tr>
                        <th>S.No.</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Seller</th>
                    </tr>

                    <?php

                        $sql = "SELECT * FROM TRANS WHERE NEXT='$userID' AND STATUS=0";
                        $result = $conn->query($sql);

                        $count=1;

                        if($result->num_rows>0){

                            while($row=$result->fetch_assoc()){

                                $bid=$row['BOOKID'];
                                $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
                                $result2 = $conn->query($sql2)  or die($conn->error);
                                $row2 = $result2->fetch_assoc();
                                $sellerid = $row['PREV'];
                                $sql3 = "SELECT * FROM USER WHERE ID = '$sellerid' ";
                                $result3 = $conn->query($sql3)  or die($conn->error);
                                $row3 = $result3->fetch_assoc();
                                $seller = $row3['Name'];

                                echo "<tr>";
                                echo "<td style='vertical-align:middle;'>" . $count . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Name'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Author'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Price'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $seller . "</td>";
                                echo "</tr>";
                                $count = $count+1;

                            }

                        } else{
                            //echo "0 results";
                        }

                    ?>


                </table>
                <div align="center">
                <?php     echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-success btn-sm'><a style='color:white;' href=\"excel.php?table=bought&ID=".$userID."\">Create .csv</a> </button></td>";?>

                </div>
                <p class="bold" align="left">Books Borrowed</p>
                <table class="table center table-hover ">
                    <tr>
                        <th>S.No.</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Borrowed from</th>
                        <th>Return</th>
                    </tr>

                    <?php

                        $sql = "SELECT * FROM TRANS WHERE NEXT='$userID' AND STATUS=1";
                        $result = $conn->query($sql);

                        $count=1;

                        if($result->num_rows>0){

                            while($row=$result->fetch_assoc()){

                                $bid=$row['BOOKID'];
                                $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
                                $result2 = $conn->query($sql2)  or die($conn->error);
                                $row2 = $result2->fetch_assoc();
                                $sellerid = $row['PREV'];
                                $sql3 = "SELECT * FROM USER WHERE ID = '$sellerid' ";
                                $result3 = $conn->query($sql3)  or die($conn->error);
                                $row3 = $result3->fetch_assoc();
                                $seller = $row3['Name'];

                                echo "<tr>";
                                echo "<td style='vertical-align:middle;'>" . $count . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Name'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Author'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Price'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $seller . "</td>";
                                echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-success btn-sm'><a style='color:white;' href=\"returnbook.php?bookID=".$row['BOOKID']."\">Return</a> </button></td>";
                                echo "</tr>";
                                $count = $count+1;

                            }

                        } else{
                            // "0 results";
                        }

                    ?>


                </table>
                <div align="center">
                <?php     echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-success btn-sm'><a style='color:white;' href=\"excel.php?table=borrowed&ID=".$userID."\">Create .csv</a> </button></td>";?>

                </div>

                <p class="bold" align="left">Books Lent</p>
                <table class="table center table-hover ">
                    <tr>
                        <th>S.No.</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Lent from</th>
                    </tr>

                    <?php

                        $sql = "SELECT * FROM TRANS WHERE PREV='$userID' AND STATUS=1";
                        $result = $conn->query($sql);

                        $count=1;

                        if($result->num_rows>0){

                            while($row=$result->fetch_assoc()){

                                $bid=$row['BOOKID'];
                                $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
                                $result2 = $conn->query($sql2)  or die($conn->error);
                                $row2 = $result2->fetch_assoc();
                                $buyerid = $row['NEXT'];
                                $sql3 = "SELECT * FROM USER WHERE ID = '$buyerid' ";
                                $result3 = $conn->query($sql3)  or die($conn->error);
                                $row3 = $result3->fetch_assoc();
                                $buyer = $row3['Name'];

                                echo "<tr>";
                                echo "<td style='vertical-align:middle;'>" . $count . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Name'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Author'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $row2['Price'] . "</td>";
                                echo "<td style='vertical-align:middle;'>" . $buyer . "</td>";
                                echo "</tr>";
                                $count = $count+1;

                            }

                        } else{
                            //echo "0 results";
                        }

                    ?>


                </table>
                <div align="center">
                <?php     echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-success btn-sm'><a style='color:white;' href=\"excel.php?table=lent&ID=".$userID."\">Create .csv</a> </button></td>";?>

                </div>
            </div>
        </div>
        <?php
            if(isset($_GET['error']) && ($_GET['error'])== 1){
                echo '<script type="text/javascript">alert("Failed! Please enter correct old password.")</script>';
            }
            if(isset($_GET['success']) && ($_GET['success'])== 1){
            echo '<script type="text/javascript">alert("Password changed successfully!")</script>';
        }
        ?>

    </div>
    <script type="text/javascript">
    function form_submit() {
      document.getElementById("changePass_form").submit();
    }
  </script>

</body>
</html>
<script>
$(document).ready(function(){
   $('#create_excel').click(function(){
       $("#current_posts").table2excel({
   // exclude CSS class
   exclude: ".noExl",
   name: "Worksheet Name",
   filename: "SomeFile" //do not include extension
 });
});
</script>
