<?php
session_start();
$name = $_SESSION['Name'];

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Post for Sale/Rent</title>

    <script src="js/jquery-3.1.1.min.js">

    </script>

    <script src="js/bootstrap.min.js">

    </script>

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

    <div class="container" id="topRow">
            <form class="form-horizontal" role="form" method ="post" action="addbook.php">
                <h2 align="center">Book Details</h2>
                <hr>
                <div class="form-group">
                    <label for="bName" class="col-sm-2 control-label">Book Name</label>
                    <div class="col-sm-9">
                        <input required type="text" name="name" placeholder="Book Name" class="form-control" autofocus>

                    </div>
                </div>
                    <div class="form-group">
                    <label for="author" class="col-sm-2 control-label">Author</label>
                    <div class="col-sm-9">
                        <input required type="text" name="author" placeholder="Author" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Category" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-9">
                        <select name="category" class="form-control">
                            <option>General</option>
                            <option>Study</option>
                            <option>Fiction</option>
                            <option>Non Fiction</option>
                            <option>Literature</option>
                            <option>History</option>
                            <option>Biography</option>
                            <option>Autobiography</option>

                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Type</label>
                    <div class="col-sm-9">
                    	<div class="radiobox">
        					<input type="radio" name="radio" id="BUY" value="BUY" checked>
                           	<label for="sell">Sell</label>

                        </div>
                        <div class="radiobox">
                            <input type="radio"  name="radio" id="BORROW" value="BORROW" >
                           	<label for="rent">Rent</label>
                        </div>

                    </div>
                </div>


                 <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-9">
                        <input required type="price" name="price" placeholder="Price" class="form-control" onkeypress="return isNumberKey(event)">
                        <span class="help-block">*for rent, please enter the weekly rent</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-2">
                        <div class="checkbox">
                            <label>
                                <input required type="checkbox">I accept <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-2">
                        <input type="submit" class="btn btn-success btn-block" value="Add Book"/>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
        <script>
            function isNumberKey(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
                        return false;
                    return true;
                    }
        </script>
</body>
