<?php
if(!isset($Mag_data))
{
    $Mag_data = array("title" => "", "call_id" => "" , "copy_number" => "");
}else{
    $The_Mag = $Mag_data;
}
?>
<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header">
            <h3>Book Issue Form</h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">
                <h4>Magazine Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="">
                    <label class="label label-success">Magazine Title: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['title']?> </label>
                    <label class="label label-success">Magazine Subject: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['subject']?> </label>
                    <label class="label label-success">Magazine Publisher: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['publisher']?> </label>
                    <label class="label label-success">Magazine Publish Date: </label>
                    <label class="form-control" for="book_title"><?php echo $The_Mag['publish_date']?> </label>
                </form>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">
                <h4>Student Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="Librarian.php">
                    <input type="hidden" name="Mag_ID" value="<?php echo $The_Mag['id']?>">
                    <label class="label label-success">User Type: </label>
                    <select class="form-control" name="user_type" style="margin-bottom: 20px">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                    <label class="label label-success" >Student Pocket ID: </label>
                    <input type="text" class="form-control" name="user_id"  placeholder="User ID" value="<?php echo $user_id?>"><br>
                    <input type="submit" class="form-control" name="confirm_user" value="Submit">
                </form>
            </div>
            <h4>Student Information</h4>
            <hr>
            <div class="col-sm-1 col-md-1 col-lg-1" style="margin-left: 5px; margin-left: 50px">
                <form class="form-horizontal"  method="post" action="Librarian.php">
                    <img class="img-rounded" src="images/<?php echo $user['photo']?>" width="80px" height="110px" style="border: solid lightgray 5px">
                </form>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">

                <form class="form-vertical" method="post" action="private/Page_Func.php">
                    <div class="form-group">
                        <input type="text" hidden="hidden" name="user_id" value="<?php echo $user['id']?>">
                        <input type="text" hidden="hidden" name="pocket_id" value="<?php echo $user['pocket_id']?>">
                        <input type="text" hidden="hidden" name="Mag_ID" value="<?php echo $The_Mag['id']?>">
                        <input type="text" hidden="hidden" name="call_id" value="<?php echo $The_Mag['call_id']?>">
                        <input type="text" hidden="hidden" name="copy_number" value="<?php echo $The_Mag['copy_number']?>">
                        <input type="text" hidden="hidden" name="user_type" value="<?php echo $user_type?>">
                        <input type="text" hidden="hidden" name="librarian_id" value="Librarian">
                        <label class="label label-success" >Student Pocket ID: </label>
                        <label class="form-control" for="book_title" style="margin-bottom: 10px">Full Name: <?php echo $user['name']?> </label>
                        <label class="label label-success" >Student Pocket ID: </label>
                        <label class="form-control" for="book_title" style="margin-bottom: 10px">Grade: <?php echo $user['grade']?> </label>
                        <label class="label label-success" >Student Pocket ID: </label>
                        <label class="form-control" for="book_title" style="margin-bottom: 10px">Section: <?php echo $user['section']?> </label>
                        <input class="form-control" type="submit" name="confirm_magazine_borrow" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" id="contact">
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <div class="col-md-1 col-lg-1">
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style=" margin-left: 5px; padding-bottom: 20px">

            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style=" margin-left: 5px; padding-bottom: 20px">
                <form method="post" action="private/Page_Func.php">
                    <input class="form-control btn-primary" name="search_book" type="submit" value="Go back to Book Search">
                </form>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style=" margin-left: 5px; padding-bottom: 20px">

            </div>
        </div>
    </div>
</div>