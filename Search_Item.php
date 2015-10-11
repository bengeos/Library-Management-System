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
if(isset($_COOKIE['user_type'] ) && $_COOKIE['user_type'] == 'Lib'){

}else{
    sign_out();
}
?>
    <html>
    <head>
        <title>Saint Joseph School></title>
        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">

        <link href="includes/css/styles.css" rel="stylesheet">

        <script src="includes/js/modernizr-2.6.2.min.js"></script>

    </head>
    <body>
    <div class="pull-left" style="z-index: 7000; position: fixed; left: 10px; top:3px"> <img src="images/SJS%20LOGO.PNG"> </div>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="nav_header">
            <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <div class="nav-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav" style="margin-left: 120px;">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Search for Items <b class="caret"> </b></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="divider"></li>
                            <li><a href="index.php">Home</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>

                </ul>
            </div>


    </nav>
    <hr>
    <?php
    if(isset($_GET['page']) && $_GET['page'] == 'search_items'){
        include 'pages/Search_Items.php';
    }
    ?>
    <footer>
        ,

        <div class="container" id="cont">
            <div class="row">
                <div class="col-lg-12">
                    <h5>Copyright &copy; 2015 | <small>Saint Joseph School</small> </h5>
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
<?php
?>