<?php
include 'includes/Pages_Func.php';
if(isset($_GET['page'])){
    if($_GET['page'] == 'login'){
        $user_name = $_POST['UName'];
        $user_pass = $_POST['UPass'];
        Authenticate($user_name,$user_pass);
    }
}
if(isset($_COOKIE['user_type'] ) && $_COOKIE['user_type'] == 'Admin'){

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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="nav_header">
            <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="navbar-brand" style="cursor: pointer">Saint Joseph School</div>

            <div class="nav-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Search for Items <b class="caret"> </b></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="divider"></li>
                            <li><a href="?page=admins">Manage Admins</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=librarians">Manage Librarian</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<b class="caret"> </b></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="divider"></li>
                            <li><a href="?page=log_out">Log out</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>

                </ul>
            </div>


    </nav>
    <hr>
    <?php
    require_once "private/LMS_Engine.php";
    $engine = new LMS_Engine();
    if(isset($_GET)) {
        if (isset($_GET['page']) && $_GET['page'] == "librarians") {
            if (isset($_POST['Remove_Librarian'])) {
                $user_id = $_POST['User_ID'];
                $engine->remove_user_by($user_id);
                include 'pages/Add_New_Librarian.php';
            } else {
                include 'pages/Add_New_Librarian.php';
            }
            if (isset($_POST['Add_New_Librarian'])) {
                if (strlen($_POST['Full_Name']) > 2 && strlen($_POST['User_Name']) > 2 && strlen($_POST['User_Pass']) > 2) {
                    $engine->add_new_librarian($_POST['Full_Name'], $_POST['User_Name'], $_POST['User_Pass']);
                } else {

                }
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "admins") {
            if (isset($_POST['Remove_Admin'])) {
                $user_id = $_POST['User_ID'];
                $engine->remove_admin_by($user_id);
                include 'pages/Add_New_Admins.php';;
            } else {
                include 'pages/Add_New_Admins.php';;
            }

        }elseif(isset($_GET['page']) && $_GET['page'] == "log_out"){
            sign_out();
        }
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