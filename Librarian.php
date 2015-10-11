<?php
include 'includes/Pages_Func.php';
if(isset($_GET['page'])){
    if($_GET['page'] == 'sign_out'){
        sign_out();
    }
    if($_GET['page'] == 'search_by'){

    }
}
if(isset($_COOKIE['user_type'] ) && $_COOKIE['user_type'] == 'Lib'){

}else{
    sign_out();
}
?>
    <html>
    <head>
        <title>Saint Joseph School</title>
        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">

        <link href="includes/css/styles.css" rel="stylesheet">

        <script src="includes/js/modernizr-2.6.2.min.js"></script>

    </head>
    <body>
    <div class="pull-left" style="z-index: 7000; position: fixed; left: 10px;"> <img src="images/SJS%20LOGO.PNG"> </div>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="nav_header">
            <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <br><br>

            <div class="nav-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav" style="margin-left: 100px;">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Search for Items <b class="caret"> </b></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="?page=search_book">Search for Books</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=search_cd_dvd">Search for CD/DVD</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=search_magazine">Search for Magazine</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Library Users <b class="caret"> </b></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="?page=add_new_student">Add New Student</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=add_new_teacher">Add New Teacher</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Item Issues <b class="caret"> </b></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="?page=search_issued">Issued Items</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=return_item">Return Items</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Manage Library <b class="caret"> </b></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="?page=library_books">Manage Library Books</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=library_cd_dvd">Manage Library CD/DVD</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=library_magazine">Manage Library Magazines</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=report">Report</a></li>
                            <li class="divider"></li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Profile  <b class="caret"> </b></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="?page=update_profile">Edit Account</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=sign_out">Log out</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-search"></span> <b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <form class="navbar-form" action="?page=search_book">
                                <input type="text" class="form-control" name="search_nav" id="search" placeholder="Search here :)">
                                <button type="submit" class="form-control btn btn"><span class="glyphicon glyphicon-search">Search</span> </button>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>


    </nav>
    <br><br>
    <?php
    if(isset($_GET['page']) && $_GET['page'] == 'return_item'){
        if(isset($_POST['get_book_info'])){
            if(isset($_POST['item_type'])){
                if($_POST['item_type'] == "Book"){
                    $book_id = $engine->get_book_id($_POST['call_number'],$_POST['copy_number']);
                    if($book_id > 0 && $engine->is_issued_book_($book_id)==1){
                        $The_Item = $engine->get_book($book_id);
                        $The_Issue = $engine->get_book_borrower($book_id);
                        $The_User = $engine->get_student($The_Issue['user_id']);
                        include 'pages/Return/Return_Items_2.php';
                    }else{
                        include 'pages/Return/Return_Items.php';
                    }
                }
                if($_POST['item_type'] == "CD-DVD"){
                    $cd_id = $engine->get_CD_id($_POST['call_number'],$_POST['copy_number']);
                    if($cd_id > 0 && $engine->is_issued_CD($cd_id)==1){
                        $The_Item = $engine->get_CDs($cd_id);
                        $The_Issue = $engine->get_CD_borrower($cd_id);
                        $The_User = $engine->get_student($The_Issue['user_id']);
                        include 'pages/Return/Return_Items_2.php';
                    }else{
                        include 'pages/Return/Return_Items.php';

                    }
                }
                if($_POST['item_type'] == "Magazine"){
                    $mag_id = $engine->get_Magazine_id($_POST['call_number'],$_POST['copy_number']);
                    if($mag_id > 0 && $engine->is_issued_Mag($mag_id)==1){
                        $The_Item = $engine->get_magazine($mag_id);
                        $The_Issue = $engine->get_Mag_borrower($mag_id);
                        $The_User = $engine->get_student($The_Issue['user_id']);
                        include 'pages/Return/Return_Items_2.php';
                    }else{
                        include 'pages/Return/Return_Items.php';
                    }
                }
            }
        }elseif(isset($_POST['confirm_return'])){
            if(isset($_POST['item_type'])){
                if($_POST['item_type'] == "Book"){
                    $state = $engine->return_books($_POST['item_id']);
                    if($state){
                        include 'pages/Search_Issued.php';
                    }else{
                        include 'pages/Return/Return_Items.php';
                    }
                }
                if($_POST['item_type'] == "CD-DVD"){
                    $state = $engine->return_CD($_POST['item_id']);
                    if($state){
                        include 'pages/Search_Issued.php';
                    }else{
                        include 'pages/Return/Return_Items.php';
                    }
                }
                if($_POST['item_type'] == "Magazine"){
                    $state = $engine->return_Meg($_POST['item_id']);
                    if($state){
                        include 'pages/Search_Issued.php';
                    }else{
                        include 'pages/Return/Return_Items.php';
                    }
                }
            }

        }else{
            include 'pages/Return/Return_Items.php';
        }
    }elseif(isset($_GET['page']) && $_GET['page'] == 'add_user'){
        include 'pages/Add_Users.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'add_new_student'){
        include 'pages/Add_New_Student.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'add_new_teacher'){
        include 'pages/Add_New_Teacher.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'registered_users'){
        include 'pages/Registered_Users.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'report'){
        include 'pages/Library_Reports.php';
    } elseif(isset($_GET['page']) && $_GET['page'] == 'search_issued'){
        include 'pages/Search_Issued.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'student_detail'){
        if(isset($_POST) AND isset($_POST['Update_Student'])){
            $user_id = $_POST['STD_id'];
            $stat = $Student = $engine->update_students($user_id,$_POST['pocket_id'],$_POST['name'],$_POST['grade'],$_POST['section'],$_POST['photo']);

            $Student = $engine->get_student($user_id);
        }
        if(isset($_POST['user_id'])){
            $user_id = $_POST['user_id'];
        }
        include 'pages/Student_Detail.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'add_remove'){
        include 'pages/Reg_Books.php';
    }elseif(isset($_POST['book_id'])) {
        require_once "private/LMS_Engine.php";
        $engine = new LMS_Engine();
        $book_data = array("title" => "", "call_id" => "" , "copy_number" => "");
        $book_id = $_POST['book_id'];
        $book_data = $engine->get_book($book_id);
        if(isset($_POST['make_book_issue'])){
            include 'pages/Issues/Issued_Book_1.php';
        }
        if(isset($_POST['confirm_user'])){
            $user_type = $_POST['user_type'];
            $user_id = $_POST['user_id'];
            if($user_type == "student"){
                $_id = $engine->get_student_by_pid($user_id);
                if(isset($_id) && isset($_id['id'])){
                    $user = $_id;
                    include 'pages/Issues/Issued_Book_2.php';
                }else{
                    include 'pages/Issues/Issued_Book_1.php';
                }
            }else{
                $_id = $engine->get_teacher_id_by_name($user_id);
                if(isset($_id['use_id']) && $_id['use_id'] != 0){
                    include 'pages/Issues/Issued_Book_3.php';
                }else{
                    include 'pages/Issues/Issued_Book_1.php';
                }
            }
        }
    }elseif(isset($_POST['CDs_ID'])) {
        require_once "private/LMS_Engine.php";
        $engine = new LMS_Engine();
        $CDs_data = array("title" => "", "call_id" => "" , "copy_number" => "");
        $cd_id = $_POST['CDs_ID'];
        $CDs_data = $engine->get_CDs($cd_id);
        if(isset($_POST['make_cd_issue'])){
            include 'pages/Issues/Issued_CD_1.php';
        }
        if(isset($_POST['confirm_user'])){
            $user_type = $_POST['user_type'];
            $user_id = $_POST['user_id'];
            if($user_type == "student"){
                $_id = $engine->get_student_by_pid($user_id);
                if(isset($_id) && isset($_id['id'])){
                    $user = $_id;
                    include 'pages/Issues/Issued_CD_2.php';
                }else{
                    include 'pages/Issues/Issued_CD_1.php';
                }
            }else{
                $_id = $engine->get_teacher_id_by_name($user_id);
                if(isset($_id['use_id']) && $_id['use_id'] != 0){
                    include 'pages/Issues/Issued_CD_3.php';
                }else{
                    include 'pages/Issues/Issued_CD_1.php';
                }
            }
        }
    }elseif(isset($_POST['Mag_ID'])) {
        require_once "private/LMS_Engine.php";
        $engine = new LMS_Engine();
        $mag_id = $_POST['Mag_ID'];
        $Mag_data = $engine->get_magazine($mag_id);
        if(isset($_POST['make_magazine_issue'])){
            include 'pages/Issues/Issued_Magazine_1.php';
        }
        if(isset($_POST['confirm_user'])){
            $user_type = $_POST['user_type'];
            $user_id = $_POST['user_id'];
            if($user_type == "student"){
                $_id = $engine->get_student_by_pid($user_id);
                if(isset($_id) && isset($_id['id'])){
                    $user = $_id;
                    include 'pages/Issues/Issued_Magazine_2.php';
                }else{
                    include 'pages/Issues/Issued_Magazine_1.php';
                }
            }else{
                $_id = $engine->get_teacher_id_by_name($user_id);
                if(isset($_id) && isset($_id['use_id'])){
                    $user = $_id;
                    include 'pages/Issues/Issued_Magazine_3.php';
                }else{
                    include 'pages/Issues/Issued_Magazine_1.php';
                }
            }
        }
    }elseif(isset($_GET['page']) && $_GET['page'] == 'user_detail') {
        include 'pages/User_Detail.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'edit_book') {
        $book_id = $_POST['lib_book_id'];
        $The_Book = $engine->get_book($book_id);
        include 'pages/Edit_Book_Fields.php';

    }elseif(isset($_GET['page']) && $_GET['page'] == 'edit_cd_dvd') {
        $cd_id = $_POST['lib_cd_id'];
        $The_CD = $engine->get_CDs($cd_id);
        include 'pages/Edit_CD_DVD_Fields.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'edit_magazine') {
        $mag_id = $_POST['lib_meg_id'];
        $The_Mag = $engine->get_magazine($mag_id);
        include 'pages/Edit_Magazine_Fields.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'library_magazine') {
        if(isset($_POST['move_magazine'])){
            $engine->move_magazine($_POST['lib_meg_id']);
        }
        include 'pages/Library_Magazine_Items.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'library_books') {
        if(isset($_POST['move_book'])){
            $engine->move_book($_POST['lib_book_id']);
        }
        include 'pages/Library_Book_Items.php';

    }elseif(isset($_GET['page']) && $_GET['page'] == 'library_cds') {
        if(isset($_POST['move_cd'])){
            $engine->move_CDs($_POST['lib_cd_id']);
        }
        include 'pages/Library_CD_DVD_Items.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'successful_borrow') {
        include 'pages/Successfull_Borrow.php';

    }elseif(isset($_GET['page']) && $_GET['page'] == 'library_magazine') {
        if(isset($_POST['move_book'])){
            $engine->move_book($_POST['lib_book_id']);
        }
        include 'pages/Library_Magazine_Items.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'library_cd_dvd') {
        if(isset($_POST['move_book'])){
            $engine->move_book($_POST['lib_book_id']);
        }
        include 'pages/Library_CD_DVD_Items.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'issued_Book_detail') {
        $user_id = $_POST['user_id'];
        $user_type = $_POST['user_type'];
        $borrow_id = $_POST['borrow_id'];
        $book_id = $_POST['book_id_'];
        include 'pages/Issued_Book_Detail.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'issued_CD_detail') {
        $user_id = $_POST['user_id'];
        $user_type = $_POST['user_type'];
        $borrow_id = $_POST['borrow_id'];
        $book_id = $_POST['book_id_'];
        include 'pages/Issued_CD_Detail.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'issued_Magazine_detail') {
        $user_id = $_POST['user_id'];
        $user_type = $_POST['user_type'];
        $borrow_id = $_POST['borrow_id'];
        $book_id = $_POST['book_id_'];
        include 'pages/Issued_Magazine_Detail.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'search_book') {
        if(isset($_POST['search_nav'])){
            $search_nav = $_POST['search_nav'];
        }
        include 'pages/Search_Books.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'search_cd_dvd') {
        include 'pages/Search_CD_DVD.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'search_magazine') {
        include 'pages/Search_Magazine.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'search_news_paper') {
        include 'pages/Search_NewsPaper.php';
    }elseif(isset($_GET['page']) && $_GET['page'] == 'update_profile') {
        include 'pages/Edit_Account.php';
    }else{
        include 'pages/Search_Books.php';
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