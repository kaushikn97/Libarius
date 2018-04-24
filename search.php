<?php
session_start();
include 'db_conn_test.php';
$searchby = $_GET['search_by'];
$searchphrase = $_GET['search_phrase'];
$conn = OpenCon();
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="utf-8">
     <meta name="viewpoint" content="width=device-width,initial-scale=1">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <title>Dashboard</title>
     <script src="js/jquery-3.1.1.min.js">
     </script>
     <script src="js/bootstrap.min.js">
     </script>

 </head>
 <body>
     <h2 align="center">Search Results</h2>
     <hr>
     <p style="font-size: 200%" align="center">You searched for <?php echo $searchphrase ?> by <?php echo $searchby ?> </p>
     <?php
     $sql = "SELECT Name , Author, Price, Type FROM BOOK WHERE $searchby = '$searchphrase'";
     $result = $conn->query($sql);

     echo "<table class = 'table' border='1'>
     <tr>
     <th>Name</th>
     <th>Author</th>
     </tr>";

     if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
     echo "<tr>";
     echo "<td>" . $row['Name'] . "</td>";
     echo "<td>" . $row['Author'] . "</td>";
     echo "</tr>";
     }
     } else {
     echo "0 results";
     }

      ?>
 </body>
