<?php
if(isset($_GET['added']) && ($_GET['added'])== 1){
    echo '<script type="text/javascript">alert("Book added")</script>';
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>

</head>

<body>
	<div class="container">
		<form class="form-horizontal" role="form">

			<h2 align="center">Dashboard</h2>
			<hr>
			<p style="font-size: 500%" align="center">Welcome, username </p>

			<div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" id="search" placeholder="Search" class="form-control">
                    </div>
            </div>

            <div class="form-group">
                <form action="search.html" method="get">
        	       <div class="col-sm-2 col-sm-offset-1">
	                   <input type="submit" class="btn btn-primary btn-block" value="Search by Name"/>
	         	   </div>
                </form>
                <form action="search.html" method="get">
       	         	<div class="col-sm-2 col-sm-offset-1">
       	            	<input type="submit" class="btn btn-primary btn-block" value="Search by Author"/>
       	         	</div>
                </form>
            </div>
            <hr>
			<div class="form-group">
                <form action="post.html" method="get">
   	       		<div class="col-sm-2 col-sm-offset-0">
   	            	<input type="submit" class="btn btn-primary btn-block" value="Profile"/>
   	         	</div>
                </form>
                <form action="post.html" method="get">
   	         	<div class="col-sm-2 col-sm-offset-0">
   	            	<input type="submit" class="btn btn-primary btn-block" value="Post">
   	    	    </div>
                </form>
   		   	</div>
		</form>
	</div>
</body>
