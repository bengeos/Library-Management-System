<?php
if(!isset($CDs_data))
{
    $The_CD = array("title" => "", "call_id" => "" , "copy_number" => "");
}else{
    $The_CD = $CDs_data;
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
                <h4>Book Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="">
                    <label class="label label-success">CD Title: </label>
                    <label class="form-control" for="book_title"><?php echo $The_CD['title']?> </label>
                    <label class="label label-success">CD Subject: </label>
                    <label class="form-control" for="book_title"><?php echo $The_CD['subject']?> </label>
                    <label class="label label-success">CD Publisher: </label>
                    <label class="form-control" for="book_title"><?php echo $The_CD['publisher']?> </label>
                </form>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">
                <h4>Student Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="Librarian.php">
                    <input type="hidden" name="book_id" value="<?php echo $The_CD['id']?>">
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

            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">

                <form class="form-vertical" method="post" action="private/Page_Func.php">
                    <div class="form-group">
                        <input type="text" hidden="hidden" name="user_id" value="<?php echo $user['id']?>">
                        <input type="text" hidden="hidden" name="pocket_id" value="<?php echo $_id['use_id']; ?>">
                        <input type="text" hidden="hidden" name="cds_id" value="<?php echo $The_CD['id']?>">
                        <input type="text" hidden="hidden" name="call_id" value="<?php echo $The_CD['call_id']?>">
                        <input type="text" hidden="hidden" name="copy_number" value="<?php echo $The_CD['copy_number']?>">
                        <input type="text" hidden="hidden" name="user_type" value="<?php echo $user_type?>">
                        <input type="text" hidden="hidden" name="librarian_id" value="Librarian">
                        <label class="label label-success" >Teacher Full name: </label>
                        <label class="form-control" for="book_title" style="margin-bottom: 10px">Full Name: <?php echo $user_id; ?> </label>
                        <label class="label label-success" >Department: </label>
                        <label class="form-control" for="book_title" style="margin-bottom: 10px">Department: <?php echo "Teacher"; ?> </label>
                        <input class="form-control" type="submit" name="confirm_cd_borrow" value="Confirm">
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