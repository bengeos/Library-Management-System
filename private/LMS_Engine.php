<?php
require_once 'LMS.php';
$lms = new LMS();
class LMS_Engine{
    public function __construct(){
        global $lms;
        $lms->connect();
    }
    //*************************************************************************************************************
    //*************************************************************************************************************
    //                                  Admin
    //*************************************************************************************************************
    //*************************************************************************************************************
    public function add_admin($user_name, $password)
    {
        global $lms;
        $state = $lms->add_admin($user_name, $password);
        return $state;
    }
    public function is_admin($user, $pass){
        //check for valid admin
        global $lms;
        $state = $lms->is_admin($user, $pass);
        return $state;
    }
    public function change_password($user, $new_pass, $old_pass)
    {
        global $lms;
        if($this->is_admin($user, $old_pass))
        {
            return $lms->change_password($user, $new_pass);
        }else{
            return false;
        }
    }
    public function get_user_privilage($user)
    {
        global $lms;
        return $lms->get_user_privilage($user);
    }

    //*************************************************************************************************************
    //*************************************************************************************************************
    //                                  users
    //*************************************************************************************************************
    //*************************************************************************************************************
    public function get_user($user_id, $as)
    {
        global $lms;
        $result = array();
        if($as == "student")
            $result = $lms->get_student($user_id);
        elseif($as == "teacher")
            $result = $lms->get_teacher($user_id);
        return $result;
    }
    public function add_student_user($pocket_id, $name, $grade, $section, $photo)
    {
        global $lms;
        $result = $lms->insert_students($pocket_id, $name, $grade, $section, $photo);
        return $result;
    }
    public function get_all_student_users()
    {
        global $lms;
        return $lms->get_all_student();
    }
    public function add_teacher_user($name, $department )
    {
        global $lms;
        $lms->insert_teachers($name, $department);
    }
    public function get_all_teacher_users()
    {
        global $lms;
        return $lms->get_all_teachers();
    }

    //*************************************************************************************************************
    //*************************************************************************************************************
    //                                  Book categories
    //*************************************************************************************************************
    //*************************************************************************************************************

    public function insert_book_cat($cat_name)
    {
        global $lms;
        $lms->insert_book_cat($cat_name);
    }
    public function get_book_cat_id($cat_name)
    {
        global $lms;
        return $lms->get_book_cat_id($cat_name);
    }
    public function get_book_cat_name($cat_id)
    {
        global $lms;
        return $lms->get_book_cat_name($cat_id);
    }
    public function get_all_book_categories()
    {
        global $lms;
        return $lms->get_all_book_categories();
    }



    //*************************************************************************************************************
    //*************************************************************************************************************
    //                                  Books
    //*************************************************************************************************************
    //*************************************************************************************************************
    /**
     * @param $search
     * @return mixed
     */
    public function search_books($search){
        global $lms;
        $temp_titles = $lms->search_book_title($search);
        $found = array();
        foreach($temp_titles as $ids){
            array_push($found,$lms->get_book($ids));
        }
        return $found;
    }
    public function search_book($hint, $from, $cat_id)
    {
        global $lms;
        return $lms->search_book($hint, $from, $cat_id);
    }
    public function delete_book($id){
        global $lms;
        return $lms->delete_book($id);
    }
    public function get_all_books(){
        global $lms;
        return $lms->get_all_books();
    }
    public function get_book($id)
    {
        global $lms;
        return $lms->get_book($id);
    }
    public function get_book_call_id($id)
    {
        global $lms;
        return $lms->get_book_call_id($id);
    }
    public function get_book_id($call_id, $copy_number){
        global $lms;
        return $lms->get_book_id($call_id, $copy_number);
    }
    public function get_book_copy_number($id)
    {
        global $lms;
        return $lms->get_book_copy_number($id);
    }
    public function get_book_shelf_or_store($id)
    {
        global $lms;
        return $lms->get_book_shelf_or_store($id);
    }
    public function set_book_title($id, $title)
    {
        global $lms;
        return $lms->set_book_title($id, $title);
    }
    public function search_book_call_no($call_no)
    {
        global $lms;
        return $lms-> search_book_call_no($call_no);
    }
    public function get_unique($arrays_main,$arrays_slave){
        $found = array();
        foreach($arrays_slave as $slave_elements ){
            $state = 1;
            foreach($arrays_main as $main_elements){
                if($main_elements == $slave_elements){
                    $state = 0;
                }
            }
            if($state){
                array_push($found,$slave_elements);
            }
        }
    }
    public function move_book($id){
        global $lms;
        return $lms->move_book($id);
    }
    public  function Add_Book($title,$cat_id,$author,$publisher,$publish_year,$publish_address,$call_id,$copy_num,$shelf_or_store){
        global $lms;
        $val = $lms->insert_book($title,$cat_id,$author,$publisher,$publish_year,$publish_address,$call_id,$copy_num,$shelf_or_store);
        return $val;
    }
    public function update_book($id, $title,$author,$publisher,$pub_year,$pub_add,$call_id,$copy_num,$shelf_store,$cat_id){
        global $lms;
        return $lms->update_book($id, $title,$author,$publisher,$pub_year,$pub_add,$call_id,$copy_num,$shelf_store,$cat_id);
    }
    public function add_new_book($title,$cat_id, $author, $publisher, $publisher_year, $publisher_address, $call_id, $copy_number, $shelf_or_store)
    {
        global $lms;
        return $lms->insert_book($title,$cat_id, $author, $publisher, $publisher_year, $publisher_address, $call_id, $copy_number, $shelf_or_store);
    }
    //*************************************************************************************************************
    //*************************************************************************************************************
    //                                  CD DVDs Issues
    //*************************************************************************************************************
    //*************************************************************************************************************
    public function get_all_CDS(){
        global $lms;
        return $lms->get_all_CDS();
    }
    public function search_cds_not_issued($hint, $from, $cat_id){
        global $lms;
        return $lms->search_cds_not_issued($hint, $from, $cat_id);
    }
    public function search_cds($hint, $from , $cat_id){
        global $lms;
        return $lms->search_cds($hint, $from , $cat_id);
    }
    public function add_new_cds($title,$subject,$cd_num,$copy_num,$publisher,$cat_id,$call_num,$shelf_store='store'){
        global $lms;
        return $lms->add_new_cds($title,$subject,$cd_num,$copy_num,$publisher,$cat_id,$call_num,$shelf_store);
    }
    public function get_CDs($id){
        global $lms;
        return $lms->get_CDs($id);
    }
    public function  insert_cds_borrows($user_id, $tea_or_stu, $cds_id, $librarian_id){
        global $lms;
        return $lms->insert_cds_borrows($user_id, $tea_or_stu, $cds_id, $librarian_id);
    }
    public function move_CDs($id){
        global $lms;
        return $lms->move_CDs($id);
    }
    public function get_CD_issue_by_($cd_id){
        global $lms;
        return $lms->get_CD_issue_by_($cd_id);
    }
    public function get_books_cat_id($cat_name){
        global $lms;
        return $lms->get_books_cat_id($cat_name);
    }
    public function get_cds_cat_id($cat_name){
        global $lms;
        return $lms->get_cds_cat_id($cat_name);
    }
    public function get_mag_cat_id($cat_name){
        global $lms;
        return $lms->get_mag_cat_id($cat_name);
    }

    //*************************************************************************************************************
    //*************************************************************************************************************
    //                                  Books Issues
    //*************************************************************************************************************
    //*************************************************************************************************************
    public function new_pocket_id()
    {
        global $lms;
        return $lms->new_pocket_id();
    }
    public function get_all_copies_for_book($call_id)
    {
        global $lms;
        return $lms->get_all_copies_for_book($call_id);
    }
    public function get_free_copy_for_book($call_no)
    {
        global $lms;
        return $lms->get_free_copy_for_book($call_no);
    }
    public function get_all_issued_books()
    {
        global $lms;
        return $lms->get_all_issued_books();
    }
    public function is_issued_book_($bookID){
        global $lms;
        return $lms->is_issued_book($bookID);
    }
    public function is_issued_CD($cd_id){
        global $lms;
        return $lms->is_issued_CD($cd_id);
    }
    public function is_issued_Mag($mag_ID){
        global $lms;
        return $lms->is_issued_Mag($mag_ID);
    }

    public function get_book_borrower($bookID){
        global $lms;
        return $lms->get_book_borrower($bookID);
    }
    public function get_CD_borrower($CD_ID){
        global $lms;
        return $lms->get_CD_borrower($CD_ID);
    }
    public function get_Mag_borrower($mag_ID){
        global $lms;
        return $lms->get_Mag_borrower($mag_ID);
    }
    public function return_book($borrow_id){

        global $lms;
        $state = $lms->return_book($borrow_id);
        return $state;
    }
    public function return_books($book_id){
        global $lms;
        $state = $lms->return_books($book_id);
        return $state;
    }
    public function get_issued_to($call_no, $copy_number)
    {
        global $lms;
        return $lms->get_issued_to($call_no, $copy_number);
    }
    public function get_issued_($call_no, $copy_number){
        global $lms;
        return $lms->get_issued_($call_no, $copy_number);
    }
    public function  insert_book_borrows($user_id, $tea_or_stu, $books_id, $librarian_id, $return_date)
    {
        global $lms;
        return $lms->insert_book_borrows($user_id, $tea_or_stu, $books_id, $librarian_id, $return_date);
    }
    public function search_issued_books($after_date){
        //get all books which are issued after some date
        global $lms;
        $found = array();
        $ids = $lms->search_book_borrows_returned("0");
        foreach($ids as $id){
            array_push($found,$lms->get_book($id));
        }
        return $found;
    }
    public function is_issued_book($call_id,$copy_number){
        //check weather the book is issued or not
        global $lms;
        $book_id = $lms->get_book_id($call_id,$copy_number);
        $borrow_id = $lms->get_book_author($book_id);/////get id by book id
        $state = $lms->get_book_borrows_returned($book_id);
        if($state == '1'){
            $state = 1;
        }else{
            $state = 0;
        }
        return $state;
    }

    public function is_issuedBook($book_id)
    {
        //check weather the book is issued or not
        global $lms;
        $state = $lms->get_book_borrows_returned($book_id);
        return $state;
    }
    public function is_issuedCD($cd_id){
        //check weather the book is issued or not
        global $lms;
        $state = $lms->get_cd_borrows_returned($cd_id);
        return $state;
    }
    public function is_issuedMagazine($mag_id){
        //check weather the book is issued or not
        global $lms;
        $state = $lms->get_magazine_borrows_returned($mag_id);
        return $state;
    }
    public function is_issued_to($call_id,$copy_number){
        //check weather the book is issued or not
        global $lms;
        $ret = $lms->get_book_borrow_info($call_id, $copy_number);
        return $ret;
    }
    public function is_borrowed_already($userID,$T_S,$bookID){
        global $lms;
        return $lms->is_borrowed_already($userID,$T_S,$bookID);
    }
    public function search_issued_book_by($pocket_id){
        //return list of books borrowed by this pocket id
        global $lms;
        $found = array();
        $student_id = $lms->get_students_id($pocket_id);
        $borrow_ids = $lms->search_book_borrows_user_id($student_id);
        foreach($borrow_ids as $borrow_id){
            if($lms->get_book_borrows_returned($borrow_id) == '0'){
                //filter only not returned books
                $book_id = $lms->get_book_borrows_book_id($borrow_id);
                array_push($found,$lms->get_book($book_id));
            }
        }
        return $found;
    }
    public function search_book_issued($hint, $from, $cat_id){
        global $lms;
        return $lms->search_book_issued($hint, $from, $cat_id);
    }
    public function search_cds_issued($hint, $from, $cat_id){
        global $lms;
        return $lms->search_cds_issued($hint, $from, $cat_id);
    }
    public function cancel_book_borrow($call_id,$copy_num){
        global $lms;
        $book_id = $lms->get_book_id($call_id,$copy_num);
        $borrow_id = $lms->get_book_borrows_id($book_id);
        $state = $lms->delete_section($borrow_id);
        return $state;
    }

    public function search_material($hint, $material, $from)
    {
        // this function needs to be modified to make searches on different materials... not just books
        $ret = array();
        global $lms;
        $result = $lms->search_book_title($hint);
        if(!isset($result))
            echo "Result not set";
        if($from != "ALL"){
            foreach($result as $row)
            {
                $detail = $lms->get_book($row);
                if($detail['shelf_or_store'] == $from)
                {
                    array_push($ret, $detail);
                }
            }
        }else{
            foreach($result as $row)
            {
                $detail = $lms->get_book($row);
                array_push($ret, $detail);
            }
        }
        return $ret;
    }
    public function get_student_by_pid($pid)
    {
        global $lms;
        return $lms->get_student_by_pocket_id($pid);
    }
    public function  update_students($id, $name, $grade, $section, $photo){
        global $lms;
        return $lms->update_students($id, $name, $grade, $section, $photo);
    }
    public function delete_students($id){
        global $lms;
        return $lms->delete_students($id);
    }
    public function get_student($id){
        global $lms;
        return $lms->get_student_($id);
    }
    public function search_Student($hint, $grade, $Section){
        global $lms;
        return $lms->search_Student($hint, $grade, $Section);
    }
    public function get_all_grades_(){
        global $lms;
        return $lms->get_all_grades_();
    }
    public function get_all_sections_(){
        global $lms;
        return $lms->get_all_sections_();
    }
    public function get_teacher_by_user_id($uid)
    {
        global $lms;
        return $lms->get_teacher_by_user_id($uid);
    }
    public function search_book_not_issued($hint, $from = "ALL", $cat_id){
        global $lms;
        return $lms->search_book_not_issued($hint, $from, $cat_id);
    }
    public function get_issue_by_($book_id){
        global $lms;
        return $lms->get_issue_by_($book_id);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                  Magazine Table
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_Meg_issue_by_($mag_id){
        global $lms;
        return $lms->get_Meg_issue_by_($mag_id);
    }
    public function search_meg_not_issued($hint, $from, $cat_id){
        global $lms;
        return $lms->search_meg_not_issued($hint, $from, $cat_id);
    }
    public function search_meg_issued($hint, $from, $cat_id)
    {
        global $lms;
        return $lms->search_meg_issued($hint, $from, $cat_id);
    }
    public function add_new_magazine($title,$subject,$publisher,$page_num,$publish_date,$call_num,$copy_num,$shelf_store,$cat_id){
        global $lms;
        return $lms->add_new_magazine($title,$subject,$publisher,$page_num,$publish_date,$call_num,$copy_num,$shelf_store,$cat_id);
    }
    public function search_magazine($hint, $from, $cat_id){
        global $lms;
        return $lms->search_magazine($hint, $from, $cat_id);
    }
    public function get_all_magazines(){
        global $lms;
        return $lms->get_all_magazines();
    }
    public function update_cd($id, $title,$subject,$publisher,$cat_id,$number_of_cd,$copy_number,$call_num,$shelf_store){
        global $lms;
        return $lms->update_cd($id, $title,$subject,$publisher,$cat_id,$number_of_cd,$copy_number,$call_num,$shelf_store);
    }
    public function update_magazine($id, $title,$subject,$publisher,$page_num,$publish_date,$call_num,$copy_num,$shelf_store,$cat_id){
        global $lms;
        return $lms->update_magazine($id, $title,$subject,$publisher,$page_num,$publish_date,$call_num,$copy_num,$shelf_store,$cat_id);
    }
    public function get_magazine($id){
        global $lms;
        return $lms->get_magazine($id);
    }
    public function move_magazine($id){
        global $lms;
        return $lms->move_magazine($id);
    }
    public function  insert_magazine_borrows($user_id, $tea_or_stu, $mag_id, $librarian_id){
        global $lms;
        return $lms->insert_magazine_borrows($user_id, $tea_or_stu, $mag_id, $librarian_id);
    }
    public function get_Mag_issue_by_($mag_id){
        global $lms;
        return $lms->get_Mag_issue_by_($mag_id);
    }
    public function get_CD_id($call_id, $copy_number){
        global $lms;
        return $lms->get_CD_id($call_id, $copy_number);
    }
    public function return_CD($cd_ID){
        global $lms;
        return $lms->return_CD($cd_ID);
    }
    public function return_Meg($mag_ID){
        global $lms;
        return $lms->return_Meg($mag_ID);
    }
    public function add_new_book_category($Name)
    {
        global $lms;
        return $lms->add_new_book_category($Name);

    }
    public function add_new_cd_category($Name){
        global $lms;
        return $lms->add_new_cd_category($Name);
    }
    public function add_new_mag_category($Name){
        global $lms;
        return $lms->add_new_mag_category($Name);
    }
    public function get_all_mag_categories(){
        global $lms;
        return $lms->get_all_mag_categories();
    }
    public function get_all_cd_categories(){
        global $lms;
        return $lms->get_all_mag_categories();
    }
    public function get_book_category($cat_id){
        global $lms;
        return $lms->get_book_category($cat_id);
    }
    public function get_cds_category($cat_id){
        global $lms;
        return $lms->get_cds_category($cat_id);
    }
    public function get_mag_category($cat_id){
        global $lms;
        return $lms->get_mag_category($cat_id);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                  general
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function search_stu_and_tea($from, $name)
    {
        global $lms;
        return $lms->search_stu_and_tea($from, $name);
    }



    /////////////////////////////////////////////////////////////////////////////////////////
    public function get_all_admin(){
        global $lms;
        return $lms->get_all_admin();
    }
    public function add_new_admin($fullName,$userName,$userPass){
        global $lms;
        return $lms->add_new_admin($fullName,$userName,$userPass);
    }
    public function is_admin_user($userName,$userPass){
        global $lms;
        return $lms->is_admin_user($userName,$userPass);
    }
    public function get_user_id_by($userName,$userPass){
        global $lms;
        return $lms->get_user_id_by($userName,$userPass);
    }
    public function add_new_librarian($fullName,$userName,$userPass){
        global $lms;
        return $lms->add_new_librarian($fullName,$userName,$userPass);
    }
    public function is_librarian($userName,$userPass){
        global $lms;
        return $lms->is_librarian($userName,$userPass);
    }
    public function get_all_librarians(){
        global $lms;
        return $lms->get_all_librarians();
    }
    public function get_staff_by($id){
        global $lms;
        return $lms->get_staff_by($id);
    }
    public function get_all_teachers(){
        global $lms;
        return $lms->get_all_teachers();
    }
    public function add_new_teacher($fullName,$userName,$userPass,$department){
        global $lms;
        return $lms->add_new_teacher($fullName,$userName,$userPass,$department);
    }
    public function remove_user_by($id){
        global $lms;
        return $lms->remove_user_by($id);
    }
    public function remove_admin_by($id){
        global $lms;
        return $lms->remove_admin_by($id);
    }



    //reporting functions

    //books

    public function get_number_of_books(){
        global $lms;
        return $lms->get_number_of_books();
    }
    public function get_number_of_book_on($shelf_store){
        global $lms;
        return $lms->get_number_of_book_on($shelf_store);
    }
    public function get_number_of_books_issued_since($date)
    {
        global $lms;
        return $lms->get_number_of_books_issued_since($date);
    }
    public function get_number_of_student_book_users_since($date)
    {
        global $lms;
        return $lms->get_number_of_student_users_since($date);
    }
    public function get_number_of_teacher_book_users_since($date)
    {
        global $lms;
        return $lms->get_number_of_teacher_users_since($date);
    }
    public function get_number_of_books_not_returned_since($date)
    {
        global $lms;
        return $lms->get_number_of_books_not_returned_since($date);
    }
    public function get_books_not_returned_since($date)
    {
        global $lms;
        return $lms->get_books_not_returned_since($date);
    }


//cds

    public function get_number_of_cds(){
        global $lms;
        return $lms->get_number_of_cds();
    }
    public function get_number_of_cd_on($shelf_store){
        global $lms;
        return $lms->get_number_of_cd_on($shelf_store);
    }
    public function get_number_of_cds_issued_since($date)
    {
        global $lms;
        return $lms->get_number_of_cds_issued_since($date);
    }
    public function get_number_of_student_cd_users_since($date)
    {
        global $lms;
        return $lms->get_number_of_student_cd_users_since($date);
    }
    public function get_number_of_teacher_cd_users_since($date)
    {
        global $lms;
        return $lms->get_number_of_teacher_cd_users_since($date);
    }
    public function get_number_of_cd_not_returned_since($date)
    {
        global $lms;
        return $lms->get_number_of_cd_not_returned_since($date);
    }
    public function get_cd_not_returned_since($date)
    {
        global $lms;
        return $lms->get_cd_not_returned_since($date);
    }
////////////////MAGAZINE
    public function get_number_of_magazine(){
        global $lms;
        return $lms->get_number_of_magazine();
    }
    public function get_number_of_mag_on($shelf_store){
        global $lms;
        return $lms->get_number_of_mag_on($shelf_store);
    }
    public function get_number_of_mag_issued_since($date)
    {
        global $lms;
        return $lms->get_number_of_mag_issued_since($date);
    }
    public function get_number_of_student_mag_users_since($date)
    {
        global $lms;
        return $lms->get_number_of_student_mag_users_since($date);
    }
    public function get_number_of_teacher_mag_users_since($date)
    {
        global $lms;
        return $lms->get_number_of_teacher_mag_users_since($date);
    }
    public function get_number_of_mag_not_returned_since($date)
    {
        global $lms;
        return $lms->get_number_of_mag_not_returned_since($date);
    }
    public function get_mag_not_returned_since($date)
    {
        global $lms;
        return $lms->get_mag_not_returned_since($date);
    }

    public function get_number_of_book_returned_issues_since($date){
        global $lms;
        return $lms->get_number_of_book_returned_issues_since($date);
    }
    public function get_number_of_cds_returned_issues_since($date){
        global $lms;
        return $lms->get_number_of_cds_returned_issues_since($date);
    }
    public function get_number_of_mag_returned_issues_since($date){
        global $lms;
        return $lms->get_number_of_mag_returned_issues_since($date);
    }
    //new  functions



    //pagination
    public function get_number_total_books_not_issued()
    {
        global $lms;
        return $lms->get_number_total_books_not_issued();
    }

    //lms engine
    //teacher search
    public function get_teacher_id_by_name($name)
    {
        global $lms;
        return $lms->get_teacher_id_by_name($name);
    }
}
?>