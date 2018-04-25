<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Libarius</title>

<link rel="stylesheet" href="css/indexStyle.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar-collapse">

    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
             <div class="navbar-header pull-left">
                 <a class="navbar-brand" href="/libarius/">Libarius</a>
            </div>
            <div class="collapse navbar-collapse">
                <form class="navbar-form navbar-right" method = "post" action = 'logincheck.php' >
                    <div class="form-group">
                        <input type="text" name="login_id" placeholder="BITS ID" class = "form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="login_pass" placeholder="Password" class = "form-control"/>
                    </div>
                    <input type="submit" name="login_submit" class="btn btn-success" value="Login"/>
                </form>
            </div>
        </div>
    </div>

    <div class="container contentContainer" id="topContainer">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="topRow">
                <h1 class="marginTop">Libarius</h1>
                <p class="lead">Leading website to buy/sell and borrow/lend books</p>
                <p>Libarius is an online commnity where buyers and sellers meet and share their love for books. Let us help you find books you always wanted to read. We even have a borrow/lend feature!</p>
                <p class="bold marginTop">Interested in joining our community? Sign up right away!</p>
                <form class="marginTop" method="post" action = "signup.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" name="sign_name" class="form-control" placeholder="Your Name"/>
                    </div>
                    <div class="form-group">
                        <label for="id">BITS ID</label>
                        <input type="id" name="sign_id" class="form-control" placeholder="Your ID"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="sign_pass" class="form-control" placeholder="Password"/>
                    </div>
                    <input type="submit" name="sign_submit" value="Sign Up" class="btn btn-success btn-lg marginTop"/>
                </form>
            </div></div></div>
            
    <?php
    
        if(isset($_GET['error']) && ($_GET['error'])== 1){
            echo '<script type="text/javascript">alert("Login failed")</script>';
        }
        if(isset($_GET['error']) && ($_GET['error']) == 2){
            echo '<script type="text/javascript">alert("Signup failed")</script>';
        }
        if(isset($_GET['error']) && ($_GET['error']) == 3){
            echo '<script type="text/javascript">alert("Invalid BITS. Please Retry!")</script>';
        }
            
            ?>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
