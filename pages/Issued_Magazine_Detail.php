<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
$issue_info = $engine->get_Mag_issue_by_($book_id);
$User_Info = $engine->get_student($user_id);
$The_Mag = $engine->get_magazine($book_id);
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
    $User_Info = $engine->get_teacher_by_user_id($user_id);
    $user_type = "T";
}
?>
<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header">
            <h3>Issued Item Details</h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <form class="form-horizontal"  method="post" action="">
                <div class="col-md-2 col-lg-2">
                    <label class="label label-success" >User Photo: </label>
                    <img class="img-rounded" src="images/<?php echo $User_Info['photo']?>" width="150px" height="220px">
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3" >
                    <h4>Student Information</h4>
                    <hr>
                    <label class="label label-success">Student Full Name: </label>
                    <label class="form-control"><?php echo $User_Info['name']?></label>

                    <label class="label label-success">Student Pocket ID: </label>
                    <label class="form-control"><?php echo $User_Info['pocket_id']?></label>

                    <label class="label label-success">Student Grade: </label>
                    <label class="form-control"><?php echo $User_Info['grade']?></label>

                    <label class="label label-success">Student Section: </label>
                    <label class="form-control"><?php echo $User_Info['section']?></label>
                </div>
                <h4>Issue Information</h4>
                <hr>
                <div class="col-sm-3 col-md-3 col-lg-3" >
                    <label class="label label-info">CD-DVD Title: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['title']?> </label>

                    <label class="label label-info">CD-DVD Subject: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['subject']?> </label>

                    <label class="label label-info">CD-DVD Publisher: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['publisher']?> </label>

                    <label class="label label-info">CD-DVD Category: </label>
                    <label class="form-control" for="book_title"><?php echo $engine->get_book_cat_name($The_Mag['cat_id'])['name']?> </label>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3" style=" margin-left: 5px; padding-bottom: 20px">

                    <label class="label label-info">CD-DVD Call ID: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['call_number']?> </label>

                    <label class="label label-info">CD-DVD Copy Number: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['copy_number']?> </label>

                    <label class="label label-info">Borrow Date: </label>
                    <label class="form-control" for="book_title"><?php echo $issue_info['borrow_date']?> </label>

                    <label class="label label-info">Issue Duration: </label>
                    <label class="form-control" for="book_title"><?php echo $date_dif?> </label>

                </div>
            </form>
        </div>
    </div>
    <div class="row" id="contact">
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <div class="col-md-2 col-lg-2">
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style=" margin-left: 5px; padding-bottom: 20px">

            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style=" margin-left: 5px; padding-bottom: 20px">
                <form method="post" action="private/Page_Func.php">
                    <input class="form-control btn-primary" name="issues_page" type="submit" value="Go back to Issues">
                </form>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style=" margin-left: 5px; padding-bottom: 20px">

            </div>
        </div>
    </div>
</div>