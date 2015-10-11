<?php
require_once('common.php');
class LMS
{
    private static  $dbhost = SERVER_NAME;
    private static $dbuser = USER_NAME;
    private static $dbpass = PASSWORD;
    private static $dbname = DB_NAME;
    public function connect()
    {
        global $conn;
        $conn = mysqli_connect(self::$dbhost, self::$dbuser, self::$dbpass, self::$dbname);
        return mysqli_connect_errno();
    }


    //////////////////////////////////////////////////////////////////////////
///                    users table
//////////////////////////////////////////////////////////////////////////
    public function add_admin($user_name, $password, $type = "Teacher")
    {
        global $conn;
        $sql = "INSERT INTO users(username, password, users.type) VALUES('$user_name', password('$password'), '$type')";
        $res = mysqli_query($conn, $sql);
        if(!$res)
        {
            return mysqli_error($conn);
        }
    }
    public function is_admin($user, $pass)
    {
        global $conn;
        $sql = "SELECT username FROM users WHERE password=password('$pass')";
        $res = mysqli_query($conn, $sql);
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                if($row['username'] == $user)
                {
                    return true;
                }
            }

        }
        return false;
    }

    public function change_password($user, $new_pass)
    {
        global $conn;
        $sql = "UPDATE users SET password=password('$new_pass') WHERE username='$user'";
        $res = mysqli_query($conn, $sql);
        if(!$res)
        {
            return mysqli_error($conn);
        }
        else
            return "password changed successfully!";
    }
    public function get_user_privilage($user_name)
    {
        global $conn;
        $sql = "SELECT users.type FROM users WHERE username='$user_name'";
        $res = mysqli_query($conn, $sql);
        if(!$res)
        {
            return mysqli_error($conn);
        }
        else
            return mysqli_fetch_array($res)['type'];
    }

//////////////////////////////////////////////////////////////////////////
///                     BOOKS Table
//////////////////////////////////////////////////////////////////////////


    public function search_book($hint, $from = "ALL", $cat_id)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM books WHERE (books.title LIKE '%$hint%' OR books.author LIKE '%$hint%' OR books.publisher LIKE '%$hint%') ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND books.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "AND books.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .=  "AND books.cat_id = $cat_id ";
                }
            }
        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM books ";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "WHERE books.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "WHERE books.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND books.cat_id = $cat_id";
                }
            }

        }

        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }
    public function search_book_not_issued($hint, $from = "ALL", $cat_id, $page = 0)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM books WHERE (books.title LIKE '%$hint%' OR books.author LIKE '%$hint%' OR books.publisher LIKE '%$hint%' AND id NOT IN(SELECT books_id FROM book_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND books.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "AND books.shelf_or_store = '$from'";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .=  "AND books.cat_id = $cat_id";
                }
            }
        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM books WHERE id NOT IN(SELECT books_id FROM book_borrows WHERE returned = '0') ";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "AND books.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "AND books.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND books.cat_id = $cat_id";
                }
            }
        }
        $sql .= " GROUP BY call_id";
        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }
    public function search_book_issued($hint, $from = "ALL", $cat_id)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM books WHERE (books.title LIKE '%$hint%' OR books.author LIKE '%$hint%' OR books.publisher LIKE '%$hint%' AND id IN(SELECT books_id FROM book_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "AND books.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "AND books.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .=  "AND books.cat_id = $cat_id ";
                }
            }
        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM books WHERE (id IN(SELECT books_id FROM book_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND books.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "AND books.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND books.cat_id = $cat_id";
                }
            }

        }
        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;
    }
    public function search_cds($hint, $from = "ALL", $cat_id)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM cds WHERE (cds.title LIKE '%$hint%' OR cds.subject LIKE '%$hint%' OR cds.publisher LIKE '%$hint%') AND id NOT IN(SELECT cd_id FROM cd_borrows) ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "AND cds.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "AND cds.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .=  "AND cds.cat_id = $cat_id ";
                }
            }
        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM cds ";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                    $sql .= "";
                }
                else{
                    $sql .= "WHERE cds.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "WHERE cds.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "WHERE cds.cat_id = $cat_id ";
                }
            }

        }
        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }
    public function search_magazine($hint, $from = "ALL", $cat_id)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM megazines WHERE (megazines.title LIKE '%$hint%' OR megazines.subject LIKE '%$hint%' OR megazines.publisher LIKE '%$hint%') ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "AND megazines.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "AND megazines.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .=  "AND megazines.cat_id = $cat_id ";
                }
            }
        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM megazines ";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "WHERE megazines.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "WHERE megazines.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND megazines.cat_id = $cat_id";
                }
            }

        }

        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }
    public function search_cds_not_issued($hint, $from = "ALL", $cat_id)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM cds WHERE (cds.title LIKE '%$hint%' OR cds.subject LIKE '%$hint%' OR cds.publisher LIKE '%$hint%' AND id NOT IN(SELECT cd_id FROM cd_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "AND cds.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "AND cds.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .=  "AND cds.cat_id = $cat_id ";
                }
            }

        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM cds WHERE (id NOT IN(SELECT cd_id FROM cd_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND cds.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "AND cds.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND cds.cat_id = $cat_id";
                }
            }

        }
        $sql .= " GROUP BY call_number";

        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }
    public function search_cds_issued($hint, $from = "ALL", $cat_id)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM cds WHERE (cds.title LIKE '%$hint%' OR cds.subject LIKE '%$hint%' OR books.publisher LIKE '%$hint%' AND id IN(SELECT cd_id FROM cd_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "AND cds.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "AND cds.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .=  "AND cds.cat_id = $cat_id ";
                }
            }
        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM cds WHERE (id IN(SELECT cd_id FROM cd_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND cds.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "AND cds.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND cds.cat_id = $cat_id";
                }
            }

        }
        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }
    public function search_meg_issued($hint, $from = "ALL", $cat_id)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM megazines WHERE (megazines.title LIKE '%$hint%' OR megazines.publisher LIKE '%$hint%' AND id IN(SELECT meg_id FROM meg_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "AND megazines.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "AND megazines.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .=  "AND megazines.cat_id = $cat_id ";
                }
            }
        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM megazines WHERE (id IN(SELECT meg_id FROM meg_borrows WHERE (returned = '0'))) ";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND megazines.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "AND megazines.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND megazines.cat_id = $cat_id";
                }
            }

        }
        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }
    public function search_meg_not_issued($hint, $from = "ALL", $cat_id)
    {
        global $conn;
        $sql = "";
        if(isset($hint) and $hint != "")
        {
            $sql .= "SELECT * FROM megazines WHERE (megazines.title LIKE '%$hint%' OR megazines.subject LIKE '%$hint%' OR  megazines.publisher LIKE '%$hint%') AND megazines.id NOT IN(SELECT meg_id FROM meg_borrows WHERE (returned = '0')) ";
            if(!isset($from) or $from == "All" or $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {

                }
                else{
                    $sql .= "AND megazines.cat_id = $cat_id ";
                }
            }
            else{
                $sql .= "AND megazines.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .=  "AND megazines.cat_id = $cat_id ";
                }
            }
        }
        elseif($hint == "")
        {
            $sql = "SELECT * FROM megazines WHERE (megazines.id NOT IN(SELECT meg_id FROM meg_borrows WHERE (returned = '0')))";
            if(!isset($from) or $from == "All" OR $from == "")
            {
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND megazines.cat_id = $cat_id";
                }
            }
            else{
                $sql .= "AND megazines.shelf_or_store = '$from' ";
                if(isset($cat_id) and $cat_id <= 1)
                {
                }
                else{
                    $sql .= "AND megazines.cat_id = $cat_id";
                }
            }

        }
        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }
    public function insert_book($title,$cat_id, $author, $publisher, $publisher_year, $publisher_address, $call_id, $copy_number, $shelf_or_store)
    {
        global $conn;
        $query = "INSERT INTO `books`(`title`, `cat_id`, `author`, `publisher`, `publish_year`, `publish_address`, `call_id`, `copy_number`, `shelf_or_store`) VALUES
                    ('$title','$cat_id','$author','$publisher','$publisher_year','$publisher_address','$call_id','$copy_number','$shelf_or_store');";
        $result = mysqli_query($conn, $query);
        if($result != 1){
            $result = mysqli_error($conn);
        }
        return $result;
    }

    public function get_all_books()
    {
        global $conn;
        $response = array();
        $query = "Select * From books";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response,$rows);
            }
        }
        return $response;
    }
    public function get_book_id($call_id, $copy_number)
    {
        global $conn;
        $query = "Select * From books";
        $result = mysqli_query($conn, $query);
        $response = 0;
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($call_id == $rows['call_id']) && ($copy_number == $rows['copy_number'])) {
                    $response = $rows['id'];
                }
            }
        }
        return $response;
    }
    public function get_CD_id($call_id, $copy_number)
    {
        global $conn;
        $query = "Select * From cds";
        $result = mysqli_query($conn, $query);
        $response = 0;
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($call_id == $rows['call_number']) && ($copy_number == $rows['copy_number'])) {
                    $response = $rows['id'];
                }
            }
        }
        return $response;
    }
    public function get_Magazine_id($call_id, $copy_number)
    {
        global $conn;
        $query = "Select * From megazines";
        $result = mysqli_query($conn, $query);
        $response = 0;
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($call_id == $rows['call_number']) && ($copy_number == $rows['copy_number'])) {
                    $response = $rows['id'];
                }
            }
        }
        return $response;
    }
    public function get_book_title($id)
    {
        global $conn;
        $query = "Select title From books where id=$id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows['title'];
            }
        }
        return $response;
    }

    public function get_book_author($id)
    {
        global $conn;
        $query = "Select * From books";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {
                    $response = $rows['author'];
                }
            }
        }
        return $response;
    }

    public function get_book_publisher($id)
    {
        global $conn;
        $query = "Select * From books";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {
                    $response = $rows['publisher'];
                }
            }
        }
        return $response;
    }

    public function get_book_publisher_address($id)
    {
        global $conn;
        $query = "Select * From books";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['publisher_address'];
                }
            }
        }
        return $response;
    }

    public function get_book_call_id($id)
    {
        global $conn;
        $query = "Select * From books";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['call_id'];
                }
            }
        }
        return $response;
    }

    public function get_book_copy_number($id)
    {
        global $conn;
        $query = "Select * From books";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['copy_number'];
                }
            }
        }
        return $response;
    }

    public function get_book_shelf_or_store($id)
    {
        global $conn;
        $query = "Select * From books";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['shelf_or_store'];
                }
            }
        }
        return $response;
    }
    public function get_magazine_shelf_or_store($id)
    {
        global $conn;
        $query = "Select * From megazines";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['shelf_or_store'];
                }
            }
        }
        return $response;
    }
    public function get_cds_shelf_or_store($id)
    {
        global $conn;
        $query = "Select * From cds";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['shelf_or_store'];
                }
            }
        }
        return $response;
    }
    public function update_book($id, $title,$author,$publisher,$pub_year,$pub_add,$call_id,$copy_num,$shelf_store,$cat_id)
    {
        global $conn;
        $cur_time = date("Y-m-d H:i:s a",time());
        $query = "UPDATE books SET `title` = '{$title}',`author` = '{$author}',`publisher` = '{$publisher}',`publish_year` = '{$pub_year}',`publish_address` = '{$pub_add}',`call_id` = '{$call_id}',`copy_number` = '{$copy_num}',`shelf_or_store` = '{$shelf_store}' ,`cat_id` = '{$cat_id}' ,`update_time`='{$cur_time}'WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function update_magazine($id, $title,$subject,$publisher,$page_num,$publish_date,$call_num,$copy_num,$shelf_store,$cat_id)
    {
        global $conn;
        $cur_time = date("Y-m-d H:i:s a",time());
        $query = "UPDATE `megazines` SET `title`='{$title}',`subject`='{$subject}',`publisher`='{$publisher}',`page_number`='{$page_num}',`publish_date`='{$publish_date}',`call_number`='{$call_num}',`copy_number`='{$copy_num}',`shelf_or_store`='{$shelf_store}',`cat_id`='{$cat_id}',`modified`='{$cur_time}' WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function update_cd($id, $title,$subject,$publisher,$cat_id,$number_of_cd,$copy_number,$call_num,$shelf_store)
    {
        global $conn;
        $cur_time = date("Y-m-d H:i:s a",time());
        $query = "UPDATE cds SET `title` = '{$title}',`subject` = '{$subject}',`publisher` = '{$publisher}',`cat_id` = '{$cat_id}',`number_cd` = '{$number_of_cd}',`copy_number` = '{$copy_number}',`call_number` = '{$call_num}' ,`shelf_or_store` = '{$shelf_store}',`modified`='{$cur_time}' WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_title($id, $title)
    {
        global $conn;
        $query = "UPDATE books SET `title` = '{$title}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function move_book($id)
    {
        global $conn;
        if($this->get_book_shelf_or_store($id) == "shelf"){
            $query = "UPDATE books SET `shelf_or_store` = 'store'  WHERE `id`= '$id'";
        }else{
            $query = "UPDATE books SET `shelf_or_store` = 'shelf'  WHERE `id`= '$id'";
        }
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function move_magazine($id)
    {
        global $conn;
        if($this->get_magazine_shelf_or_store($id) == "shelf"){
            $query = "UPDATE megazines SET `shelf_or_store` = 'store'  WHERE `id`= '$id'";
        }else{
            $query = "UPDATE megazines SET `shelf_or_store` = 'shelf'  WHERE `id`= '$id'";
        }
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function move_CDs($id)
    {
        global $conn;
        if($this->get_cds_shelf_or_store($id) == "shelf"){
            $query = "UPDATE cds SET `shelf_or_store` = 'store'  WHERE `id`= '$id'";
        }else{
            $query = "UPDATE cds SET `shelf_or_store` = 'shelf'  WHERE `id`= '$id'";
        }
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_author($id, $author)
    {
        global $conn;
        $query = "UPDATE books SET `author` = '{$author}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_publisher_year($id, $publisher_year)
    {
        global $conn;
        $query = "UPDATE books SET `publisher_year` = '{$publisher_year}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function delete_book($id)
    {
        global $conn;
        $query = "DELETE From books WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function get_book($id)
    {
        global $conn;
        $query = "Select * From books where `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $rows = mysqli_fetch_assoc($result);
        }
        return $rows;
    }
    public function get_magazine($id)
    {
        global $conn;
        $query = "Select * From megazines where `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $rows = mysqli_fetch_assoc($result);
        }
        return $rows;
    }
    public function search_book_title($title)
    {
        global $conn;
        $query = "Select * From books where title LIKE '%$title%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_author($author)
    {
        global $conn;
        $query = "Select * From books where author LIKE '%$author%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_publisher($publisher)
    {
        global $conn;
        $query = "Select * From books where publisher LIKE '%$publisher%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_publish_year($publish_year)
    {
        global $conn;
        $query = "Select * From books where publish_year LIKE '%$publish_year%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_publish_address($publish_address)
    {
        global $conn;
        $query = "Select * From books where publish_address LIKE '%$publish_address%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_call_no_and_copy_number($call_no,$copy_number)
    {
        global $conn;
        $query = "Select * From books where call_no AND copy_number LIKE '%$call_no,$copy_number%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }
    public function search_book_call_no($call_no)
    {
        global $conn;
        $query = "Select * From books where call_no LIKE '%$call_no%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_copy_number($copy_number)
    {
        global $conn;
        $query = "Select * From books where copy_number LIKE '%$copy_number%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_shelf_or_store($shelf_or_store)
    {
        global $conn;
        $query = "Select * From books where shelf_or_store LIKE '%$shelf_or_store%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }


    //////////////////////////////////////////////////////////////////////////
///                    CD DVD Table
//////////////////////////////////////////////////////////////////////////
    public function get_all_CDS()
    {
        global $conn;
        $response = array();
        $query = "Select * From cds";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response,$rows);
            }
        }
        return $response;
    }
    public function get_all_magazines()
    {
        global $conn;
        $response = array();
        $query = "Select * From megazines";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response,$rows);
            }
        }
        return $response;
    }
    public function add_new_cds($title,$subject,$cd_num,$copy_num,$publisher,$cat_id,$call_num,$shelf_store="store"){
        global $conn;
        $query = "INSERT INTO `cds`(`title`, `subject`, `number_cd`, `copy_number`, `publisher`, `cat_id`,`call_number`, `shelf_or_store`)
                   VALUES ('$title','$subject','$cd_num','$copy_num','$publisher','$cat_id','$call_num','$shelf_store')";
        $result = mysqli_query($conn, $query);
        if($result) {
            return $result;
        }else{
            echo '<br>'.mysqli_error($conn).'<br>';
            return "Error:: book copy already issued out. please find another copy ";
        }
    }
    public function add_new_magazine($title,$subject,$publisher,$page_num,$publish_date,$call_num,$copy_num,$shelf_store,$cat_id){
        global $conn;
        $query = "INSERT INTO `megazines`(`title`, `subject`, `publisher`,`page_number`, `publish_date`, `call_number`, `copy_number`,`shelf_or_store`,`cat_id`)
                    VALUES ('$title','$subject','$publisher','$page_num','$publish_date','$call_num','$copy_num','$shelf_store','$cat_id')";
        $result = mysqli_query($conn, $query);
        if($result) {
            return $result;
        }else{
            echo '<br>'.mysqli_error($conn).'<br>';
            return "Error:: book copy already issued out. please find another copy ";
        }
    }
    public function get_CDs($id)
    {
        global $conn;
        $query = "Select * From cds where `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $rows = mysqli_fetch_assoc($result);
        }
        return $rows;
    }
//////////////////////////////////////////////////////////////////////////
///                    Book Borrows Table
//////////////////////////////////////////////////////////////////////////

    public function new_pocket_id()
    {
        global $conn;
        $query = "SELECT max(id) FROM students";
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            return false;
        }
        $num = mysqli_fetch_array($result)[0];
        $num++;
        $pocket_id = "SJS/";
        if($num < 10)
        {
            $pocket_id .= "000".$num."/".date('y');
        }elseif($num < 100)
        {
            $pocket_id .= "00".$num."/".date('y');
        }elseif($num < 1000)
        {
            $pocket_id .= "0".$num."/".date('y');
        }else{
            $pocket_id .= $num."/".date('y');
        }
        return $pocket_id;
    }
    public function get_issued_to($call_no, $copy_number)
    {
        global $conn;
        $response = array();
        $book_id = $this->get_book_id($call_no, $copy_number);

        $query = "SELECT user_id, tea_or_stu FROM book_borrows WHERE returned=0 AND books_id=$book_id";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            $data = mysqli_fetch_array($result);
            $user_id = $data['user_id'];
            echo $user_id.'<br>';
            $tea_or_stu = $data['tea_or_stu'];

            if($tea_or_stu == "T")
            {
                $response['type'] = "teacher";
                $response['result'] = $this->get_teacher($user_id);
            }elseif($tea_or_stu == "S")
            {
                $response['type'] = "student";
                $response['result'] = $this->get_student($user_id);
            }
        }
        else{
            $response['type'] = "error";
        }
        return $response;
    }
    public function get_issue_by_($book_id)
    {
        global $conn;
        $response = array();
        $query = "SELECT * FROM book_borrows WHERE returned=0 AND books_id='$book_id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }
    public function get_CD_issue_by_($cd_id)
    {
        global $conn;
        $response = array();
        $query = "SELECT * FROM cd_borrows WHERE returned=0 AND cd_id='$cd_id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }
    public function get_Mag_issue_by_($mag_id)
    {
        global $conn;
        $response = array();
        $query = "SELECT * FROM meg_borrows WHERE returned=0 AND meg_id='$mag_id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }
    public function get_Meg_issue_by_($Mag_id)
    {
        global $conn;
        $response = array();
        $query = "SELECT * FROM meg_borrows WHERE returned=0 AND meg_id='$Mag_id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }
    public function is_issued_book($book_id)
    {
        global $conn;
        $query = "SELECT * FROM book_borrows WHERE returned=0 AND books_id='$book_id'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response,$rows);
            }
        }
        return count($response);
    }
    public function is_issued_CD($cd_id)
    {
        global $conn;
        $query = "SELECT * FROM cd_borrows WHERE returned=0 AND cd_id='$cd_id'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response,$rows);
            }
        }
        return count($response);
    }
    public function is_issued_Mag($mag_id)
    {
        global $conn;
        $query = "SELECT * FROM meg_borrows WHERE returned=0 AND meg_id='$mag_id'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response,$rows);
            }
        }
        return count($response);
    }
    public function return_book($borrow_id)
    {
        global $conn;
        $query = "UPDATE book_borrows SET returned=1 WHERE id=$borrow_id";
        $result = mysqli_query($conn, $query);
        $num = mysqli_affected_rows($conn);
        if( $num == 0)
        {
            return false;
        }
        elseif($num == 1)
        {
            return true;
        }
        else{
            return "error";
        }
    }
    public function return_books($book_id)
    {
        global $conn;
        $query = "UPDATE book_borrows SET returned=1 WHERE books_id=$book_id AND returned='0'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function return_CD($cd_ID)
    {
        global $conn;
        $query = "UPDATE cd_borrows SET returned=1 WHERE cd_id=$cd_ID AND returned='0'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function return_Meg($mag_ID)
    {
        global $conn;
        $query = "UPDATE meg_borrows SET returned=1 WHERE meg_id=$mag_ID AND returned='0'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function  insert_book_borrows($user_id, $tea_or_stu, $books_id, $librarian_id, $return_date)
    {
        global $conn;
        $cur_time = date("Y-m-d h:i:s ",time());
        $query = "INSERT INTO `book_borrows`( `user_id`, `tea_or_stu`, `books_id`, `librarian_id`,`borrow_date`, `return_date`) VALUES ('$user_id','$tea_or_stu','$books_id','$librarian_id','$cur_time','$return_date')";
        $result = mysqli_query($conn, $query);
        if($result) {
            return $result;
        }else{
            echo '<br>'.mysqli_error($conn).'<br>';
            return "Error:: book copy already issued out. please find another copy ";
        }

    }
    public function  insert_magazine_borrows($user_id, $tea_or_stu, $mag_id, $librarian_id)
    {
        global $conn;
        $cur_time = date("Y-m-d h:i:s",time());
        $return_time = date("Y-m-d h:i:s",(time()+(60*60*24*7)));
        $query = "INSERT INTO `meg_borrows`(`user_id`, `tea_or_stu`, `meg_id`, `borrow_date`, `librarian_id`, `return_date`, `returned`)
                     VALUES ('{$user_id}','{$tea_or_stu}','{$mag_id}','{$cur_time}','{$librarian_id}','{$return_time}','0')";
        $result = mysqli_query($conn, $query);
        if($result) {
            return $result;
        }else{
            echo '<br>'.mysqli_error($conn).'<br>';
            return "Error:: book copy already issued out. please find another copy ";
        }

    }
    public function  insert_cds_borrows($user_id, $tea_or_stu, $cds_id, $librarian_id)
    {
        global $conn;
        $cur_time = date("Y-m-d h:i:s", time());
        $query = "INSERT INTO `cd_borrows`(`user_id`, `tea_or_stu`, `cd_id`, `issued_by_id`,`returned`,`borrow_date`)
                  VALUES ('$user_id','$tea_or_stu','$cds_id','$librarian_id','0','$cur_time')";
        $result = mysqli_query($conn, $query);
        if($result) {
            return $result;
        }else{
            echo '<br>'.mysqli_error($conn).'<br>';
            return "Error:: book copy already issued out. please find another copy ";
        }

    }
    public function get_all_copies_for_book($call_id)
    {
        global $conn;
        $sql = "SELECT id FROM books WHERE call_id=$call_id";
        $result = mysqli_query($conn, $sql);
        $response = array();
        $response = mysqli_fetch_array($result);
        return $response;
    }
    public function get_free_copy_for_book($call_no)
    {
        global $conn;
        $ids = $this->get_all_copies_for_book($call_no);
        foreach($ids as  $id)
        {
            if($this->get_book_borrows_returned($id) == 0)
            {
                return array('id' => $id);
            }
        }
        return array();
    }

    public function get_book_borrows_user_id($id)
    {
        global $conn;
        $query = "Select * From book_borrows";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if ($id == $rows['id']) {
                    $response = $rows['user_id'];
                }
            }
        }
        return $response;
    }
    public function get_book_borrower($bookID)
    {
        global $conn;
        $query = "Select * From book_borrows WHERE books_id='$bookID' AND returned='0'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }
    public function get_CD_borrower($CD_ID)
    {
        global $conn;
        $query = "Select * From cd_borrows WHERE cd_id='$CD_ID' AND returned='0'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }
    public function get_Mag_borrower($Mag_ID)
    {
        global $conn;
        $query = "Select * From meg_borrows WHERE meg_id='$Mag_ID' AND returned='0'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }
    public function get_book_borrows_librarian_id($id)
    {
        global $conn;
        $query = "Select * From book_borrows";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['librarian_id'];
                }
            }
        }
        return $response;
    }

    public function get_book_borrows_return_date($id)
    {
        global $conn;
        $query = "Select * From book_borrows";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['return_date'];
                }
            }
        }
        return $response;
    }

    public function get_book_borrows_books_id($id)
    {
        global $conn;
        $query = "Select * From book_borrows";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['books_id'];
                }
            }
        }
        return $response;
    }

    public function get_book_borrows_borrow_date($id)
    {
        global $conn;
        $query = "Select * From book_borrows";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['borrow_date'];
                }
            }
        }
        return $response;
    }

    public function get_book_borrows_tea_or_stu($id)
    {
        global $conn;
        $query = "Select * From book_borrows";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['tea or stu'];
                }
            }
        }
        return $response;
    }

    public function get_book_borrows_returned($id)
    {
        global $conn;
        $query = "Select returned From book_borrows WHERE books_id=$id";
        $result = mysqli_query($conn, $query);
        $response = 0;
        if ($result) {
            $rows = mysqli_fetch_array($result);
            $response = $rows['returned'];
        }else
        {
            echo mysqli_error($conn);
            exit;
        }
        return $response;
    }
    public function get_cd_borrows_returned($id)
    {
        global $conn;
        $query = "Select returned From cd_borrowss cd_id=$id";
        $result = mysqli_query($conn, $query);
        $response = 0;
        if ($result) {
            $rows = mysqli_fetch_array($result);
            $response = $rows['returned'];
        }
        return $response;
    }
    public function get_magazine_borrows_returned($mag_id)
    {
        global $conn;
        $query = "Select returned From meg_borrows meg_id=$mag_id";
        $result = mysqli_query($conn, $query);
        $response = 0;
        if ($result) {
            $rows = mysqli_fetch_array($result);
            $response = $rows['returned'];
        }
        return $response;
    }
    public function set_book_borrows_user_id($id, $user_id)
    {
        global $conn;
        $query = "UPDATE book_borrows SET `user_id` = '{$user_id}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_borrows_librarian_id($id, $librarian_id)
    {
        global $conn;
        $query = "UPDATE book_borrows SET `librarian_id` = '{$librarian_id}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_borrows_return_date($id, $return_date)
    {
        global $conn;
        $query = "UPDATE book_borrows SET `return_date` = '{$return_date}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_borrows_book_borrows_id($id, $book_borrows_id)
    {
        global $conn;
        $query = "UPDATE book_borrows SET `book_borrows_id` = '{$book_borrows_id}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_borrows_borrow_date($id, $borrow_date)
    {
        global $conn;
        $query = "UPDATE book_borrows SET `borrow_date` = '{$borrow_date}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_borrows_tea_or_stu($id, $tea_or_stu)
    {
        global $conn;
        $query = "UPDATE book_borrows SET `tea_or_stu` = '{$tea_or_stu}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_book_borrows_returned($id, $returned)
    {
        global $conn;
        $query = "UPDATE book_borrows SET `returned` = '{$returned}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function delete_book_borrow($id)
    {
        global $conn;
        $query = "DELETE From book_borrows WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function get_book_borrows_id($book_id)
    {
        global $conn;
        $query = "Select * From students";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($book_id == $rows['book_id'])) {///
                    $response = $rows['id'];
                }
            }
        }
        return $response;
    }
    public function get_book_borrow($id)
    {
        global $conn;
        $query = "Select * From book_borrows where `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $rows = mysqli_fetch_array($result);
        }
        return $rows;
    }
    public function search_book_borrows_user_id($user_id)
    {
        global $conn;
        $query = "Select * From book_borrows where user_id LIKE '%$user_id%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_borrows_book_id($book_id)
    {
        global $conn;
        $query = "Select * From book_borrows where book_id LIKE '%$book_id%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_borrows_borrow_date($borrow_date)
    {
        global $conn;
        $query = "Select * From book_borrows where borrow_date LIKE '%$borrow_date%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_borrows_librarian_id($librarian_id)
    {
        global $conn;
        $query = "Select * From book_borrows where librarian_id LIKE '%$librarian_id%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_borrows_return_date($return_date)
    {
        global $conn;
        $query = "Select * From book_borrows where return_date LIKE '%$return_date%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_book_borrows_returned($returned)
    {
        global $conn;
        $query = "Select * From book_borrows where returned LIKE '%$returned%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }
    public function get_all_issued_books()
    {
        global $conn;
        $query = "Select * From books where id IN (SELECT books_id FROM book_borrows WHERE returned=0)";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response[] = $rows;
            }
        }
        return $response;
    }

//////////////////////////////////////////////////////////////////////////
///                    sections table
//////////////////////////////////////////////////////////////////////////


    public function  insert_sections($grade, $section)
    {
        global $conn;
        $query = "INSERT INTO `sections`( `grade`,'section' ) VALUES ('$grade','$section')";
        $result = mysqli_query($conn, $query);
        echo mysqli_error($conn);
        return $result;
    }

    public function get_sections_section($id)
    {
        global $conn;
        $query = "Select * From sections";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['section'];
                }
            }
        }
        return $response;
    }

    public function get_sections_grade($id)
    {
        global $conn;
        $query = "Select * From sections";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['grade'];
                }
            }
        }
        return $response;
    }

    public function set_sections_section($id, $section)
    {
        global $conn;
        $query = "UPDATE sections SET `section` = '{$section}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_sections_grade($id, $grade)
    {
        global $conn;
        $query = "UPDATE sections SET `grade` = '{$grade}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function delete_section($id)
    {
        global $conn;
        $query = "DELETE From sections WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function get_section($id)
    {
        global $conn;
        $query = "Select * From sections where `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $rows = mysqli_fetch_array($result);
        }
        return $rows;
    }



//////////////////////////////////////////////////////////////////////////
///                    students Table
//////////////////////////////////////////////////////////////////////////


    public function  insert_students($pocket_id, $name, $grade, $section, $photo)
    {
        global $conn;

        $query = "INSERT INTO `students`(`pocket_id`, `name`, `grade`, `section`, `photo`) VALUES ('$pocket_id','$name','$grade','$section','$photo')";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function  update_students($id, $name, $grade, $section, $photo)
    {
        global $conn;
        if(isset($photo) And $photo != ""){
            $query = "UPDATE students SET `name` = '{$name}',`grade` = '{$grade}',`section` = '{$section}',`photo` = '{$photo}' WHERE `id`= '$id'";
        }else{
            $query = "UPDATE students SET `name` = '{$name}',`grade` = '{$grade}',`section` = '{$section}' WHERE `id`= '$id'";
        }
        $result = mysqli_query($conn, $query);
        echo mysqli_error($conn);
        return $result;
    }

    public function get_students_pocket_id($id)
    {
        global $conn;
        $query = "Select * From students";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['pocket_id'];
                }
            }
        }
        return $response;
    }

    public function get_students_name($id)
    {
        global $conn;
        $query = "Select * From students";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['name'];
                }
            }
        }
        return $response;
    }
    public function get_all_grades_()
    {
        global $conn;
        $query = "Select distinct `grade` From students";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if(!in_array($rows,$response)){
                    array_push($response,$rows);
                }
            }
        }
        return $response;
    }
    public function get_all_sections_()
    {
        global $conn;
        $query = "Select distinct `section` From students";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if(!in_array($rows,$response)){
                    array_push($response,$rows);
                }
            }
        }
        return $response;
    }
    public function get_student($id)
    {
        global $conn;
        $query = "Select * From students WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }
    public function get_students_grade($id)
    {
        global $conn;
        $query = "Select * From students";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['grade'];
                }
            }
        }
        return $response;
    }

    public function get_students_section($id)
    {
        global $conn;
        $query = "Select * From students";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['section'];
                }
            }
        }
        return $response;
    }

    public function get_students_photo($id)
    {
        global $conn;
        $query = "Select * From students";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['photo'];
                }
            }
        }
        return $response;
    }

    public function set_students_pocket_id($id, $pocket_id)
    {
        global $conn;
        $query = "UPDATE students SET `pocket_id` = '{$pocket_id}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_students_name($id, $name)
    {
        global $conn;
        $query = "UPDATE students SET `name ` = '{$name}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_students_grade($id, $grade)
    {
        global $conn;
        $query = "UPDATE students SET `grade` = '{$grade}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_students_section($id, $section)
    {
        global $conn;
        $query = "UPDATE students SET `section` = '{$section}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_students_photo($id, $photo)
    {
        global $conn;
        $query = "UPDATE students SET `photo` = '{$photo}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function delete_students($id)
    {
        global $conn;
        $query = "DELETE From students WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function get_students_id($pocket_id)
    {
        global $conn;
        $query = "Select * From students";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($pocket_id == $rows['pocket_id'])) {///
                    $response = $rows['id'];
                }
            }
        }
        return $response;
    }
    public function get_students_id_by($name,$grade,$section)
    {
        global $conn;
        $query = "Select * From students";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($name == $rows['name'] && $grade==$rows['grade']&& $section==$rows['section'])) {///
                    $response = $rows['name,grade,section'];
                }
            }
        }
        return $response;
    }
    public function get_student_($id)
    {
        global $conn;
        $query = "Select * From students where `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $rows = mysqli_fetch_array($result);
        }
        return $rows;
    }
    public function search_students_pocket_id($pocket_id)
    {
        global $conn;
        $query = "Select * From students where pocket_id LIKE '%$pocket_id%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_students_name($name)
    {
        global $conn;
        $query = "Select * From students where name LIKE '%$name%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_students_grade($grade)
    {
        global $conn;
        $query = "Select * From students where grade LIKE '%$grade%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_students_section($section)
    {
        global $conn;
        $query = "Select * From students where section LIKE '%$section%'";
        $result = mysqli_query($conn, $query);
        $response = array();
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                array_push($response, $rows['id']);
            }
        }
        return $response;
    }

    public function search_Student($hint, $grade = "ALL", $Section = "All")
    {
        global $conn;
        $sql = "";
        if(isset($hint))
        {
            $sql .= "SELECT * FROM students WHERE (students.name LIKE '%$hint%' OR students.pocket_id LIKE '%$hint%') ";
            if(isset($grade) and $grade != "All") {
                if(isset($Section) AND  $Section != "All"){
                    $sql.="AND students.grade =".$grade." AND students.section=".$Section;
                }else{
                    $sql.="AND students.grade =".$grade;
                }
            }else{
                if(isset($Section) AND $Section != "All"){
                    $sql.="AND students.section= ".$Section;
                }else{

                }
            }
        }else{
            $sql = "SELECT * FROM students";
        }
        $response = array();
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $response[] = $row;
            }
        }
        return $response;

    }


//////////////////////////////////////////////////////////////////////////
///                    teachers Table
//////////////////////////////////////////////////////////////////////////


    public function  insert_teachers( $name, $department)
    {
        global $conn;
        $query = "INSERT INTO `students`( 'teacher_id','name''department' ) VALUES ('$name','$department')";
        $result = mysqli_query($conn, $query);
        return $result;
    }



    public function get_teachers_name($id)
    {
        global $conn;
        $query = "Select * From teachers";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['name'];
                }
            }
        }
        return $response;
    }

    public function get_teachers_department($id)
    {
        global $conn;
        $query = "Select * From teachers";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($id == $rows['id'])) {///
                    $response = $rows['department'];
                }
            }
        }
        return $response;
    }

    public function set_teachers_teacher_id($id, $teacher_id)
    {
        global $conn;
        $query = "UPDATE teachers SET `teacher_id` = '{$teacher_id}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_teachers($id, $name)
    {
        global $conn;
        $query = "UPDATE teachers SET `name` = '{$name}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function set_teachers_department($id, $department)
    {
        global $conn;
        $query = "UPDATE teachers SET `department` = '{$department}'  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    public function delete_teachers($id)
    {
        global $conn;
        $query = "DELETE From teachers WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function get_teachers_id($name)
    {
        global $conn;
        $query = "Select * From teachers";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                if (($name == $rows['name'])) {///
                    $response = $rows['id'];
                }
            }
        }
        return $response;
    }
    public function get_teacher($id)
    {
        global $conn;
        $query = "Select * From teachers where `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $rows = mysqli_fetch_array($result);
        }
        return $rows;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                             book category table
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_all_book_categories()
    {
        global $conn;
        $return = array();
        $sql = "SELECT id, name FROM book_catagory ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        return $return;

    }
    public function get_all_cd_categories()
    {
        global $conn;
        $return = array();
        $sql = "SELECT id, name FROM cds_category ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        return $return;

    }
    public function get_all_mag_categories()
    {
        global $conn;
        $return = array();
        $sql = "SELECT id, name FROM mag_category ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        return $return;

    }
    public function add_new_book_category($Name)
    {
        global $conn;
        $query = "INSERT INTO `book_catagory`(`name`) VALUES ('$Name')";
        $result = mysqli_query($conn, $query);
        if($result){
            return $result;
        }else{
            echo mysqli_error($conn);
        }

    }
    public function add_new_cd_category($Name)
    {
        global $conn;
        $query = "INSERT INTO `cds_category`(`name`) VALUES ('$Name')";
        $result = mysqli_query($conn, $query);
        if($result){
            return $result;
        }else{
            echo mysqli_error($conn);
        }
    }
    public function add_new_mag_category($Name)
    {
        global $conn;
        $query = "INSERT INTO `mag_category`(`name`) VALUES ('$Name')";
        $result = mysqli_query($conn, $query);
        if($result){
            return $result;
        }else{
            echo mysqli_error($conn);
        }
    }
    public function delete_mag_category($id)
    {
        global $conn;
        $query = "DELETE FROM `mag_category` WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function delete_cd_category($id)
    {
        global $conn;
        $query = "DELETE FROM `cds_category` WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function delete_book_category($id)
    {
        global $conn;
        $query = "DELETE FROM `book_catagory` WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }


    public function get_book_cat_name($cat_id){
        global $conn;
        $return = array();
        $sql = "SELECT name FROM book_catagory";
        if($cat_id != 0)
            $sql .= " WHERE id=$cat_id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            $return = $row;
        }
        return $return;
    }
    public function get_book_category($cat_id)
    {
        global $conn;
        $return = array();
        $sql = "SELECT * FROM book_catagory";
        if ($cat_id != 0)
            $sql .= " WHERE id=$cat_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $return = $row;
        }
        return $return;
    }
    public function get_cds_category($cat_id)
    {
        global $conn;
        $return = array();
        $sql = "SELECT * FROM cds_category";
        if ($cat_id != 0)
            $sql .= " WHERE id=$cat_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $return = $row;
        }
        return $return;
    }
    public function get_mag_category($cat_id)
    {
        global $conn;
        $return = array();
        $sql = "SELECT * FROM mag_category";
        if ($cat_id != 0)
            $sql .= " WHERE id=$cat_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $return = $row;
        }
        return $return;
    }
    public function get_book_cat_id($cat_name){
        global $conn;
        $sql = "SELECT * FROM book_catagory";
        $res = mysqli_query($conn, $sql);
        $response = 0;
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                if($row['name'] == $cat_name){
                    $response = $row['id'];
                }
            }

        }
        return $response;
    }
    public function get_cds_cat_id($cat_name){
        global $conn;
        $sql = "SELECT * FROM cds_category";
        $res = mysqli_query($conn, $sql);
        $response = 0;
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                if($row['name'] == $cat_name){
                    $response = $row['id'];
                }
            }

        }
        return $response;
    }
    public function get_mag_cat_id($cat_name){
        global $conn;
        $sql = "SELECT * FROM mag_category";
        $res = mysqli_query($conn, $sql);
        $response = 0;
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                if($row['name'] == $cat_name){
                    $response = $row['id'];
                }
            }

        }
        return $response;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                         CDs
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function insert_cd($title, $subject, $number_cd, $copy_number, $publisher)
    {
        global $conn;
        $sql = "INSERT INTO cds(title, subjet, number_cd, copy_number, publisher) VALUES ($title, $subject, $number_cd, $copy_number, $publisher)";
        $result = mysqli_query($conn, $sql);
    }


    public function search_stu_and_tea($from, $name)
    {
        global $conn;
        $response = array();
        $sql =  "SELECT * FROM ";
        if($from == "All")
        {
            $sql = "SELECT * FROM students";
            if(isset($name) and $name != "")
            {
                $sql .= " WHERE name LIKE '%$name%'";
            }
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $response[] = $row;
                }
            }
            $sql = "SELECT * FROM teachers";
            if(isset($name) and $name != "")
            {
                $sql .= " WHERE name LIKE '%$name%'";
            }
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $response[] = $row;
                }
            }
        }else

        {
            if($from == "Student"){
                $sql .= "students ";
            }elseif($from == "Teacher"){
                $sql .= "teachers ";
            }
            if(isset($name) and $name != "")
            {
                $sql .= "WHERE name LIKE '%$name%'";
            }
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $response[] = $row;
                }
            }
        }
        $resp = array_reverse($response, null);
        return $resp;
    }

    public function get_student_by_pocket_id($pid)
    {
        global $conn;
        $response = array();
        $query = "Select * From students WHERE pocket_id= '$pid'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $rows = mysqli_fetch_array($result);
            $response = $rows;
        }
        return $response;
    }
    public function get_teacher_by_user_id($uid)
    {
        global $conn;
        $query = "Select * From staffs WHERE use_id= $uid";
        $result = mysqli_query($conn, $query);
        $response = '0';
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $response = $rows;
            }
        }
        return $response;
    }



    //////////////////////////////////////////////////////////////////
    //////nnenwnenwenwnenweeeeeeeeeeeeeeeeeeeeeeee
    public function get_all_admin()
    {
        global $conn;
        $sql = "SELECT * FROM admin";
        $res = mysqli_query($conn, $sql);
        $response = array();
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                array_push($response,$row);
            }

        }
        return $response;
    }
    public function add_new_admin($fullName,$userName,$userPass)
    {
        global $conn;
        $query = "INSERT INTO admin (user_name, user_pass,full_name) VALUES('$userName', password('$userPass'), '$fullName')";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function is_admin_user($userName,$userPass)
    {
        global $conn;
        $sql = "SELECT * FROM admin WHERE user_name='$userName'";
        $res = mysqli_query($conn, $sql);
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                if($row['user_name'] == $userName)
                {
                    return true;
                }
            }
        }
        return false;
    }
    public function add_new_staff($userID,$fullName,$department)
    {
        global $conn;
        $query = "INSERT INTO staffs (use_id, staffs.name,department) VALUES('$userID','$fullName','$department')";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function get_user_id_by($userName,$userPass)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE username='$userName' AND users.password= password('$userPass')";
        $res = mysqli_query($conn, $sql);
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                $val = $row['id'];
            }

        }
        return $val;
    }
    public function add_new_librarian($fullName,$userName,$userPass)
    {
        global $conn;
        $query = "INSERT INTO users (username, users.password, users.type) VALUES('$userName', password('$userPass'), 'Librarian')";
        $result = mysqli_query($conn, $query);
        $user_id = $this->get_user_id_by($userName,$userPass);
        if($user_id>0){
            $this->add_new_staff($user_id,$fullName,"Librarian");
        }
        return $result;
    }
    public function add_new_teacher($fullName,$userName,$userPass,$department)
    {
        global $conn;
        $query = "INSERT INTO users (username, users.password, users.type) VALUES('$userName', password('$userPass'), 'Teacher')";
        $result = mysqli_query($conn, $query);
        $user_id = $this->get_user_id_by($userName,$userPass);
        if($user_id>0){
            $this->add_new_staff($user_id,$fullName,$department);
        }
        echo mysqli_error($conn);
        return $result;
    }
    public function is_librarian($userName,$userPass)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE username='$userName' AND users.password=password('$userPass')";
        $res = mysqli_query($conn, $sql);
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                if($row['type'] == "Librarian")
                {
                    return true;
                }
            }
        }
        return false;
    }
    public function get_user_by($userName,$userPass)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE username='$userName' AND users.password=password('$userPass')";
        $res = mysqli_query($conn, $sql);
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                $response = $row;
            }
        }
        return $response;
    }
    public function get_all_librarians()
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE users.type = 'Librarian'";
        $res = mysqli_query($conn, $sql);
        $response = array();
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                array_push($response,$row);
            }

        }
        return $response;
    }
    public function get_all_teachers()
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE users.type = 'Teacher'";
        $res = mysqli_query($conn, $sql);
        $response = array();
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                array_push($response,$row);
            }

        }
        return $response;
    }
    public function get_staff_by($id)
    {
        global $conn;
        $sql = "SELECT * FROM staffs";
        $res = mysqli_query($conn, $sql);
        $response = array();
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                if($row['use_id'] == $id){
                    $response = $row;
                }
            }
        }
        return $response;
    }
    public function get_staff_by_($user_id)
    {
        global $conn;
        $sql = "SELECT * FROM staffs WHERE use_id = '$user_id'";
        $res = mysqli_query($conn, $sql);
        $response = array();
        if($res)
        {
            while($row = mysqli_fetch_array($res))
            {
                $response = $row;
            }
        }
        return $response;
    }
    public function remove_user_by($id)
    {
        global $conn;
        $query = "DELETE From users WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function remove_admin_by($id)
    {
        global $conn;
        $query = "DELETE From admin WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }



    ///report generating functions

//books


    public function get_number_of_books_issued_since($date)
    {
        global $conn;
        $query = "SELECT count(id) FROM book_borrows WHERE created_time >= '$date'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }
    }

    public function get_number_of_book_returned_issues_since($date)
    {
        global $conn;
        $query = "SELECT count(id) FROM book_borrows WHERE borrow_date >= '$date' AND returned='1'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }else{
            echo mysqli_error($conn);
        }
    }
    public function get_number_of_student_users_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  user_id) FROM book_borrows WHERE created_time >= '$date' AND tea_or_stu='S'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_number_of_teacher_users_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  user_id) FROM book_borrows WHERE created_time >= '$date' AND tea_or_stu='T'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_number_of_books_not_returned_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  books_id) FROM book_borrows WHERE created_time >= '$date' AND returned='0'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_books_not_returned_since($date)
    {
        global $conn;

        $query = "SELECT * FROM book_borrows WHERE created_time > '$date' AND returned='0'";
        $result = mysqli_query($conn, $query);
        $resp = array();
        if($result)
        {
            while($row = mysqli_fetch_assoc($result)) {
                $resp[] = $row;
            }
        }
        return $resp;
    }

//cds

    public function get_number_of_cds_issued_since($date)
    {
        global $conn;
        $query = "SELECT count(id) FROM cd_borrows WHERE borrow_date >= '$date'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }else{
            echo mysqli_error($conn);
        }
    }
    public function get_number_of_cds_returned_issues_since($date)
    {
        global $conn;
        $query = "SELECT count(id) FROM cd_borrows WHERE borrow_date >= '$date' AND returned='1'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }else{
            echo mysqli_error($conn);
        }
    }
    public function get_number_of_student_cd_users_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  user_id) FROM cd_borrows WHERE borrow_date >= '$date' AND tea_or_stu='S'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_number_of_teacher_cd_users_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  user_id) FROM cd_borrows WHERE borrow_date >= '$date' AND tea_or_stu='T'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_number_of_cd_not_returned_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  cd_id) FROM cd_borrows WHERE borrow_date >= '$date' AND returned='0'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_cd_not_returned_since($date)
    {
        global $conn;
        $query = "SELECT * FROM cd_borrows WHERE borrow_date >= '$date' AND returned='0'";
        $result = mysqli_query($conn, $query);
        $resp = array();
        if($result)
        {
            while($row = mysqli_fetch_assoc($result)) {
                $resp[] = $row;
            }
        }
        return $resp;
    }

    //////mag
    public function get_number_of_mag_issued_since($date)
    {
        global $conn;
        $query = "SELECT count(id) FROM meg_borrows WHERE borrow_date >= '$date'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }else{
            echo mysqli_error($conn);
        }
    }
    public function get_number_of_mag_returned_issues_since($date)
    {
        global $conn;
        $query = "SELECT count(id) FROM meg_borrows WHERE borrow_date >= '$date' AND returned='1'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }else{
            echo mysqli_error($conn);
        }
    }
    public function get_number_of_student_mag_users_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  user_id) FROM meg_borrows WHERE borrow_date >= '$date' AND tea_or_stu='S'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_number_of_teacher_mag_users_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  user_id) FROM meg_borrows WHERE borrow_date >= '$date' AND tea_or_stu='T'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_number_of_mag_not_returned_since($date)
    {
        global $conn;
        $query = "SELECT count(DISTINCT  cd_id) FROM meg_borrows WHERE borrow_date >= '$date' AND returned='0'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_array($result)[0];
        }
    }
    public function get_mag_not_returned_since($date)
    {
        global $conn;
        $query = "SELECT * FROM meg_borrows WHERE borrow_date >= '$date' AND returned='0'";
        $result = mysqli_query($conn, $query);
        $resp = array();
        if($result)
        {
            while($row = mysqli_fetch_assoc($result)) {
                $resp[] = $row;
            }
        }
        return $resp;
    }


    // new LMS functions
    public function change_admin_user_password($user_name, $prev_pass, $new_pass)
    {
        global $conn;

    }




    //pagination functions
    public function get_number_total_books_not_issued()
    {
        global $conn;
        $query = "SELECT count(id) FROM books WHERE id NOT IN (SELECT books_id FROM book_borrows WHERE returned=0) GROUP BY call_id";
        $result = mysqli_query($conn, $query);
        if($result)
        {
          echo mysqli_num_rows($result);
        }else{
            echo mysqli_error($conn);
        }
    }
    public function get_number_of_books()
    {
        global $conn;
        $query = "SELECT count(id) FROM books";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }
    }
    public function get_number_of_book_on($shelf_store)
    {
        global $conn;
        $query = "SELECT count(id) FROM books WHERE shelf_or_store = '$shelf_store'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }
    }
    public function get_number_of_cds()
    {
        global $conn;
        $query = "SELECT count(id) FROM cds";
        $result = mysqli_query($conn, $query);
        if ($result) {
            return mysqli_fetch_assoc($result)['count(id)'];
        }
    }
    public function get_number_of_cd_on($shelf_store)
    {
        global $conn;
        $query = "SELECT count(id) FROM cds WHERE shelf_or_store = '$shelf_store'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }
    }

    public function get_number_of_magazine()
    {
        global $conn;
        $query = "SELECT count(id) FROM megazines";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }
    }
    public function get_number_of_mag_on($shelf_store)
    {
        global $conn;
        $query = "SELECT count(id) FROM megazines WHERE shelf_or_store = '$shelf_store'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return mysqli_fetch_assoc($result)['count(id)'];
        }
    }
    public function get_teacher_id_by_name($name)
    {
        global $conn;
        $query = "Select use_id From staffs where staffs.name = '$name'";
        $result = mysqli_query($conn, $query);
        $rows = array();
        if ($result) {
            $rows = mysqli_fetch_assoc($result);
        }
        return $rows;
    }
}
?>