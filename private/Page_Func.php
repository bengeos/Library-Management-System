<?php
include_once 'Functions.php';
if(isset($_POST)){
    if(isset($_POST['reg_user'])){
        require_once '../private/LMS_Engine.php';
        $engine = new LMS_Engine();
        $file = $_FILES['upload_image'];
        $uploaded = upload_image($file);
        if(strlen($uploaded) == 34){
            if($_POST['user_type'] == 'student'){
                $val = $engine->add_student_user($engine->new_pocket_id(),$_POST['full_name'],$_POST['grade'],$_POST['section'],$uploaded);
                if($val == 1){
                    header("Location: ../Librarian.php?page=add_new_student");
                    exit;
                }else{
                    header("Location: ../Librarian.php?page=add_new_student");
                    exit;
                }
            }else {
               $val = $engine->add_new_teacher($_POST['full_name'],$_POST['user_name'],$_POST['user_pass'],$_POST['department']);
                header("Location: ../Librarian.php?page=add_new_student");
                exit;
            }

        }else{
            header("Location: ../Librarian.php?page=add_new_student");
            exit;
        }
    }
    if(isset($_POST['upload_books'])){
        require_once '../private/File_Manager.php';
        $manager = new File_Manager();
        $file = $_FILES['upload_file'];
        $uploaded = upload_file($file);
        if(strlen($uploaded) == 34){
            $manager->Upload_Books('../files/'.$uploaded);
            header("Location: ../Librarian.php?page=library_books");
            exit;
        }else{

        }
    }
    if(isset($_POST['upload_cds'])){
        require_once '../private/File_Manager.php';
        $manager = new File_Manager();
        $file = $_FILES['upload_file'];
        $uploaded = upload_file($file);
        if(strlen($uploaded) == 34){
            $manager->Upload_CDs('../files/'.$uploaded);
            header("Location: ../Librarian.php?page=library_cds");
            exit;
        }else{

        }
    }
    if(isset($_POST['upload_magazines'])){
        require_once '../private/File_Manager.php';
        $manager = new File_Manager();
        $file = $_FILES['upload_file'];
        $uploaded = upload_file($file);
        if(strlen($uploaded) == 34){
            $manager->Upload_Magazines('../files/'.$uploaded);
            header("Location: ../Librarian.php?page=library_magazine");
            exit;
        }else{

        }
    }
    if(isset($_POST['Delete_Student'])){
        require_once '../private/LMS_Engine.php';
        $engine = new LMS_Engine();
        $engine->delete_students($_POST['STD_id']);
        header("Location: ../Librarian.php?page=add_new_student");
        exit;
    }

    if(isset($_POST['Update_Student'])){
        require_once '../private/LMS_Engine.php';
        $engine = new LMS_Engine();
        $file = $_FILES['upload_image'];
        if(isset($_FILES['upload_image'])){
            $user_id = $_POST['STD_id'];
            $uploaded = upload_image($file);
            if(strlen($uploaded) == 34){
                $val = $engine->update_students($_POST['STD_id'],$_POST['name'],$_POST['grade'],$_POST['section'],$uploaded);
                if($val == 1){
                    header("Location: ../Librarian.php?page=add_new_student");
                    exit;
                }else{

                }
            }else{


            }
        }else{
            $val = $engine->update_students($_POST['STD_id'],$_POST['name'],$_POST['grade'],$_POST['section'],"");
            if($val == 1){
                header("Location: ../Librarian.php?page=add_new_student");
                exit;
            }else{

            }
        }

    }
    if(isset($_POST['Go_Back'])){
        header("Location: ../Librarian.php?page=add_new_student");
        exit;
    }

    if(isset($_POST['confirm_cd_borrow'])){
        require_once '../private/LMS_Engine.php';
        $engine = new LMS_Engine();
        $user_id = $_POST['user_id'];
        $cd_id = $_POST['cds_id'];
        $pocket_id = $_POST['pocket_id'];
        $user_type = $_POST['user_type'];
        $The_CD = $engine->get_CDs($cd_id);
        $librarian_id = $_COOKIE['user_id'];
        if($user_type == "student"){
            $user_type = "S";
            $The_STD = $engine->get_student_by_pid($pocket_id);
            $librarian_id = $_COOKIE['user_id'];
            $stat = $engine->insert_cds_borrows($user_id,$user_type,$cd_id,$librarian_id);

            if($stat){
                header("Location: ../Librarian.php?page=search_cd_dvd");
                exit;
            }else{
                header("Location: ../Librarian.php?page=search_cd_dvd");
                exit;
            }
        }else{
            $user_type = "T";
            $librarian_id = $_COOKIE['user_id'];
            $stat = $engine->insert_cds_borrows($pocket_id,$user_type,$cd_id,$librarian_id);
            if($stat){
                header("Location: ../Librarian.php?page=search_cd_dvd");
                exit;
            }else{
                header("Location: ../Librarian.php?page=search_cd_dvd");
                exit;
            }
        }

    }
    if(isset($_POST['confirm_book_borrow'])) {
        //include '../includes/Pages_Func.php';
        require_once '../private/LMS_Engine.php';
        $engine = new LMS_Engine();
        $user_id = $_POST['user_id'];
        $book_id = $_POST['book_id'];
        $pocket_id = $_POST['pocket_id'];
        $user_type = $_POST['user_type'];
        $call_id = $_POST['call_id'];
        $The_Book = $engine->get_book($book_id);
        $librarian_id = $_COOKIE['user_id'];
        if ($user_type == "student") {
            $user_type = "S";
            $The_STD = $engine->get_student_by_pid($pocket_id);
            $cur_time = date("y-m-d H:i:s", time());
            $stat = $engine->insert_book_borrows($user_id, $user_type, $book_id, $librarian_id, $cur_time);
            if ($stat) {
                header("Location: ../Librarian.php?page=search_book");
                exit;
            } else {
                header("Location: ../Librarian.php?page=search_book");
                exit;
            }
        } else {

            $user_type = "T";
            $cur_time = date("y-m-d H:i:s", time());
            $stat = $engine->insert_book_borrows($pocket_id, $user_type, $book_id, $librarian_id, $cur_time);
            if ($stat) {
                header("Location: ../Librarian.php?page=search_book");
                exit;
            } else {
                header("Location: ../Librarian.php?page=search_book");
                exit;
            }
        }


    }


    if(isset($_POST['confirm_magazine_borrow'])) {
        //include '../includes/Pages_Func.php';
        require_once '../private/LMS_Engine.php';
        $engine = new LMS_Engine();
        $user_id = $_POST['user_id'];
        $mag_id = $_POST['Mag_ID'];
        $pocket_id = $_POST['pocket_id'];
        $user_type = $_POST['user_type'];

        $librarian_id = $_COOKIE['user_id'];
        if ($user_type == "student") {
            $user_type = "S";
            $The_STD = $engine->get_student_by_pid($pocket_id);
            $cur_time = date("y-m-d H:i:s", time());
            $stat = $engine->insert_magazine_borrows($user_id,$user_type,$mag_id,$librarian_id);
            if ($stat) {
                header("Location: ../Librarian.php?page=search_magazine");
                exit;
            } else {
                header("Location: ../Librarian.php?page=search_magazine");
                exit;
            }
        } else {
            $user_type = "T";
            $cur_time = date("y-m-d H:i:s", time());
            $stat = $engine->insert_magazine_borrows($pocket_id,$user_type,$mag_id,$librarian_id);
            if ($stat) {
                header("Location: ../Librarian.php?page=search_magazine");
                exit;
            } else {
                header("Location: ../Librarian.php?page=search_magazine");
                exit;
            }
        }


    }
    if(isset($_POST['issues_page'])){
        header("Location: ../Librarian.php?page=search_issued");
        exit;
    }
    if(isset($_POST['search_book'])){
        header("Location: ../Librarian.php?page=search_book");
        exit;
    }

}
?>