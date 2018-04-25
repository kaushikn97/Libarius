<?php
session_start();
if(isset($_GET['added']) && ($_GET['added'])== 1){
    echo '<script type="text/javascript">alert("Book added")</script>';
}
if(isset($_GET['success']) && ($_GET['success'])== 1){
    echo '<script type="text/javascript">alert("Your transaction was successful. Check you profile for further details")</script>';
}


$id = $_SESSION['ID'];
$name = $_SESSION['Name'];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Dashboard</title>
    <script src="js/jquery-3.1.1.min.js">
    </script>
    <script src="js/bootstrap.min.js">
    </script>
<style>.col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
    text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
    text-align: center;
}</style>
</head>

<body>
    
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
                <h1 class="marginTop">Dashboard</h1>            <hr>
                <form class="form-horizontal" role="form"  method = "get" action = "search.php">		
			<div class="form-group">
                    <div class="marginTop">
                        <input required type="text" name="search_phrase" placeholder="Search Books.." class="form-control">
                    </div>
            </div>
                    </div></div>
            
            <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div>
                <div class="form-group">
                <label class=" control-label  col-centered" style="font-size:120%">Type:</label>
                    <div class="radiobox col-md-4 col-centered">
                        <input type="radio" name="search_by" value="Author" checked>
                        <label for="sell">Search by Author</label>

                    </div>
                    <div class="col-md-4 radiobox col-centered">
                        <input type="radio"  name="search_by" value="Name" >
                        <label for="rent">Search by Book Name</label>
                    </div>
                    <div class="col-md-3 col-centered">
                <input type="submit" class="btn btn-success btn-block" value="Search"/>
                        </form>
            </div>

                </div>
                </div>    
                </div></div> 
              
        <div class="row marginTop">
            <div class="col-md-6 col-md-offset-3">
                    <div class="col-md-6 col-centered">
                <form action="MyProfile.php" method="get">
                <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" value="Profile"/>
                    </div>
                </form>
                    </div>
                    <div class="col-md-6 col-centered">
                <form action="post.html" method="get">
                <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" value="Post">
                </div>
            </form>
                    </div>
                </div>
        </div> 
                
    </div>
    
</body>
</html>