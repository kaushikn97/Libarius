<?php
session_start();
include 'db_conn_test.php';
$searchby = $_GET['search_by'];
$searchphrase = $_GET['search_phrase'];
$name = $_SESSION['Name'];
$id = $_SESSION["ID"];
$conn = OpenCon();
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="utf-8">
     <meta name="viewpoint" content="width=device-width,initial-scale=1">
     <link rel="stylesheet" href="css/indexStyle.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <title>Search Result</title>
     <script src="js/jquery-3.1.1.min.js">
     </script>
     <script src="js/bootstrap.min.js">
     </script>

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
                <h1 class="marginTop">Search Results</h1><hr>
                <p class="lead marginTop" align="center">You searched for '<?php echo $searchphrase ?>' by '<?php echo $searchby ?>' </p>
                <table class="table center table-hover marginTop">
                 <tr>
                     <th>S. No.</th>
                     <th>Name</th>
                     <th>Author</th>
                     <th>Owner</th>
                     <th>Details</th>
                 </tr>
                <?php

     $sql = "SELECT * FROM BOOK WHERE $searchby LIKE '%$searchphrase%' AND AVAILABILITY = 'YES' AND UserID != '$id'";
     $result = $conn->query($sql);
     //echo $sql;
    $count = 1;
     if ($result ->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $uid = $row['UserID'];
             $sql2 = "SELECT * FROM USER WHERE ID = '$uid' ";
             $result2 = $conn->query($sql2)  or die($conn->error);
             $bowner = '';
            //  while ($row2 = $result2->fetch_assoc()) {
            //      $bowner = $row2['Name'];
            // }
            $row2 = $result2->fetch_assoc();
            $bowner = $row2['Name'];
             echo "<tr>";
             echo "<td style='vertical-align:middle;'>" . $count . "</td>";
             echo "<td style='vertical-align:middle;'>" . $row['Name'] . "</td>";
             echo "<td style='vertical-align:middle;'>" . $row['Author'] . "</td>";
             echo "<td style='vertical-align:middle;'>" . $bowner . "</td>";
             echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-success btn-sm'><a style='color:white;' href=\"bookDetails.php?bookID=" . $row['ID'] . "\"> View Details </a> </button></td>";
             echo "</tr>";
             $count = $count+1;
         }
     }
     else {
         echo "0 results";
     }

      ?>
                </table>


        </div></div></div>

 </body>
