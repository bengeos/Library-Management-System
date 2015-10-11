<?php
include 'includes/Pages_Func.php';
if(isset($_GET['page'])){
    if($_GET['page'] == 'login'){
        $user_name = $_POST['UName'];
        $user_pass = $_POST['UPass'];
        Authenticate($user_name,$user_pass);
    }
}

?>
<html>
<head>

    <title>Library Managnment System </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="includes/css/styles.css" rel="stylesheet">
    <script src="includes/js/modernizr-2.6.2.min.js"></script>

</head>
<style>
    
    body{background-image: url("images/SJS%20-back.png"); }
    
</style>
<body>
<div class="pull-left" style="z-index: 7000; width: 300px;  position: fixed; left: 10px;"> <img src="images/SJS%20LOGO.PNG"> </div>
<div class="navbar navbar-static-top navbar-inverse" id="nav">
    <div class="container" id="dd">
        <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="nav-collapse navbar-responsive-collapse">
        </div>
    </div>
</div>
<div class="container" id="main">
 <form class="navbar-form pull-right" method="post" action="Search_Item.php?page=search_items" >
        <input type="text" class="form-control" placeholder="Search a Book" name="hint" id="searchInput">
        <button type="submit" class="btn btn-default btn-default " name="Search_Input"><span class="glyphicon glyphicon-search" ></span></button>
        <input hidden="hidden" type="text" name="from" value="shelf">
        <input hidden="hidden" type="text" name="cat_id" value="None">
    </form>
    <br><br>
    <div  class="row" id="contact">
        <div class="col-lg-12">
            <div class="col-lg-8" style="background: rgba(245,245,245,0.7); border-style: solid; border:2px solid #3c3c3c">
        <div> <br>
        <div class="page-header">
            <h3>Sign In.. </h3>
        </div>
        <form class="form-horizontal" method="post" action="?page=login">
            <div class="form-group">
                <label class="col-lg-2 control-label" for="UName">User Name: </label>
                <div class="col-lg-10">
                    <input class="form-control" id="UName" name="UName" placeholder="Enter your Username.." type="text" width="50"> <br>
                </div>
                <label class="col-lg-2 control-label" for="pass">Password: </label>
                <div class="col-lg-10">
                    <input class="form-control" id="UPass" name="UPass" placeholder="Enter your Password.." type="password"><br>
                    <input type="submit" class="btn btn-default"  id="login" value="Sign In">
                </div>
            </div>
        </form><br>
    </div>
</div>
            </div>
<br><br><br><br>
<hr>
<footer>

    <div class="container" id="cont">
        <div class="navbar navbar-fixed-bottom">

        <div class="row">
            <div class="col-lg-12">
                <h5><br><br>Copyright &copy; 2015 | <small>Saint Joseph School</small> </h5>
            </div>
        </div>
    </div>
  </div>
</footer>

<!-- All Javascript at the bottom of the page for faster page loading -->

<!-- First try for the online version of jQuery-->
<script src="http://code.jquery.com/jquery.js"></script>

<!-- If no online access, fallback to our hardcoded version of jQuery -->
<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>

<!-- Bootstrap JS -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="includes/js/script.js"></script>

</body>
</html>