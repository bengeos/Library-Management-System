<tr>
<?php
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
    if(isset($type) && $type == "Books"){
        $path = "Librarian.php?page=issued_Book_detail";
        $issue_info = $engine->get_issue_by_($found['id']);
    }elseif(isset($type) && $type == "CD-DVDs"){
        $path = "Librarian.php?page=issued_CD_detail";
        $state = $engine->is_issuedCD($found['id']);
        $issue_info = $engine->get_CD_issue_by_($found['id']);
    }elseif(isset($type) && $type == "Magazines"){
        $path = "Librarian.php?page=issued_Magazine_detail";
        $state = $engine->is_issuedMagazine($found['id']);
        $issue_info = $engine->get_Meg_issue_by_($found['id']);
    }else{
        $path = "Librarian.php?page=issued_Book_detail";
        $state = $engine->is_issuedBook($found['id']);
        $issue_info = $engine->get_issue_by_($found['id']);
    }


    $User_Info = $engine->get_student($issue_info['user_id']);
    $prev_date = strtotime($issue_info['borrow_date']);
    $date_dif = abs(time()- $prev_date);
    if($date_dif >86400){
        $days_ = floor($date_dif/(60*60*24));
        $date_dif = $days_." days ago";
    }elseif($date_dif>3600){
        $hour = floor($date_dif/(60*60));
        $date_dif = $hour." hours ago";
    }elseif($date_dif>60){
        $min = floor($date_dif/(60));
        $date_dif = $min." minutes ago";
    }else{
        $min = floor($date_dif);
        $date_dif = $min." seconds ago";
    }
    if(count($User_Info)>0){
        $user_type = "S";
    }else{
        $User_Info = $engine->get_teacher_by_user_id($issue_info['user_id']);
        $user_type = "T";
    }
  ?>
    <td><?php echo $found['title']?></td>
    <td><?php if(isset($User_Info['pocket_id'])){echo $User_Info['pocket_id'];}elseif(isset($User_Info['name'])){echo $User_Info['name'];}?></td>
    <td><?php echo date("Y-m-d  H:i:s",(strtotime($issue_info['borrow_date'])+(60*60*3)))?></td>
    <td><?php echo $date_dif?></td>
    <td>
        <form  class="form-vertical" method="POST"  action="<?php echo $path;?>">
            <input type="text" hidden="hidden" name="book_id_" value="<?php echo $found['id']?>">
            <input type="text" hidden="hidden" name="user_id" value="<?php echo $User_Info['id']?>">
            <input type="text" hidden="hidden" name="borrow_id" value="<?php echo $issue_info['id']?>">
            <input type="text" hidden="hidden" name="user_type" value="<?php echo $user_type?>">
            <button  class="form-control btn-small" type="submit" value="<?php echo $found['id']?>" name="make_book_issue">See Detail </strong> </button>
        </form>
    </td>
</tr>