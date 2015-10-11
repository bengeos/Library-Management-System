<?php
require_once 'LMS_Engine.php';
$engine = new LMS_Engine();
print_r($_POST);
if(isset($_GET['page']) && $_GET['page'] == 'return_item') {
    if (isset($_POST['get_book_info'])) {
        $book_id = $engine->get_book_id($_POST['call_number'], $_POST['copy_number']);
        if ($book_id > 0 && $engine->is_borrowed($book_id) == 1) {
            $The_Item = $engine->get_book($book_id);
            $The_Issue = $engine->get_book_borrower($book_id);
            $The_User = $engine->get_student($The_Issue['user_id']);
            // include 'pages/Return/Return_Items_2.php';
            include 'pages/Return/Return_Items.php';
        } else {
            include 'pages/Return/Return_Items.php';
        }
    } elseif (isset($_POST['confirm_return'])) {
        if (isset($_POST['book_id'])) {
            $state = $engine->return_books($_POST['book_id']);
            if ($state) {
                include 'pages/Search_Issued.php';
            } else {
                include 'pages/Return/Return_Items.php';
            }
        }

    } else {
        include 'pages/Return/Return_Items.php';
    }
}
?>