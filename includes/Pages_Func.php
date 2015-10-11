<?php
try{
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
}catch (mysqli_sql_exception $e){

}

if(isset($_POST)){
    if(isset($_POST['Reg_Items'])){
        require_once '../private/LMS_Engine.php';
        $engine = new LMS_Engine();
        $val = $engine->Add_Book($_POST['title'],$_POST['cat_id'],$_POST['author'],$_POST['publisher'],$_POST['publish_year'],$_POST['publish_address'],$_POST['call_id'],$_POST['copy_num'],$_POST['shelf_or_store']);
        header("Location: ../Librarian.php?page=add_remove");
        exit;
    }
}
function get_Librarian_Add_User_Page(){
    header("Location: ../Librarian.php?page=add_user");
    exit;
}
function get_Librarian_Manage_Books_Page(){
    header("Location: ../Librarian.php?page=library_books");
    exit;
}
function get_Librarian_Add_New_Student_Page(){
    header("Location: ../Librarian.php?page=add_new_student");
    exit;
}
function get_Librarian_Add_New_Teacher_Page(){
    header("Location: ../Librarian.php?page=add_new_teacher");
    exit;
}
function Authenticate($User_Name,$User_Pass){
    global $engine;
    if($engine->is_librarian($User_Name,$User_Pass)){
        $user_id = $engine->get_user_id_by($User_Name,$User_Pass);
        setcookie("user_type","Lib",time()+(60*60*24));
        setcookie("user_name",$User_Name,time()+(60*60*24));
        setcookie("user_pass",$User_Pass,time()+(60*60*24));
        setcookie("user_id",$user_id,time()+(60*60*24));
        header("Location: Librarian.php");
        exit;
    }elseif($engine->is_admin_user($User_Name,$User_Pass)){
        setcookie("user_type","Admin",time()+(60*60*24));
        setcookie("user_name",$User_Name,time()+(60*60*24));
        setcookie("user_pass",$User_Pass,time()+(60*60*24));
        header("Location: Admin.php");
        exit;
    }
}
function Goto_Page($name){
    if($name == "Admin"){
        header("Location: Admin.php");
        exit;
    }
    if($name == "Lib"){
        header("Location: Librarian.php");
        exit;
    }
    if($name == "Teach") {
        header("Location: Teachers.php");
        exit;
    }
}
function sign_out()
{
    setcookie("user_type", "", time());
    setcookie("user_name", "", time());
    setcookie("user_pass", "", time());
    header("Location: index.php");
    exit;
}
?>