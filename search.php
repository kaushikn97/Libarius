<?php
session_start();
include 'db_conn_test.php';
$searchby = $_GET['search_by'];
$searchphrase = $_GET['search_phrase'];
$name = $_SESSION['Name'];
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
                 <a class="navbar-brand">Libarius</a>
            </div>
            <div class="collapse navbar-collapse">
                <form class="navbar-form navbar-right" method = "post" action = 'logincheck.php' >
                    <div class="hello">Hello, <?php echo $name ?></div>
                    <input type="submit" name="logout_submit" class="btn btn-success" value="Log Out"/>
                </form>
            </div>
        </div>
    </div>
        
    <div class="container contentContainer" id="topContainer">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="topRow">
                <h1 class="marginTop">Search Results</h1>
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
     $sql = "SELECT * FROM BOOK WHERE $searchby = '$searchphrase'";
     $result = $conn->query($sql);
     //echo $sql;
    $count = 1;
     if ($result ->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $uid = $row['UserID'];
             $sql2 = "SELECT * FROM User WHERE ID = '$uid'";
             $result2 = $conn->query($sql2);
             $bowner = '';
             while ($row2 = $result2->fetch_assoc()) {
                 $bowner = $row2['Name'];
            }
             echo "<tr>";
             echo "<td style='vertical-align:middle;'>" . $count . "</td>";             
             echo "<td style='vertical-align:middle;'>" . $row['Name'] . "</td>";
             echo "<td style='vertical-align:middle;'>" . $row['Author'] . "</td>";
             echo "<td style='vertical-align:middle;'>" . $bowner . "</td>";
             echo "<td style='vertical-align:middle;'> <button type='button' class='btn btn-success btn-sm'>View Details</button></td>";
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
