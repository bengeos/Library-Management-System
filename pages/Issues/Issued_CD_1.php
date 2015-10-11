<?php
if(!isset($CDs_data))
{
    $CDs_data = array("title" => "", "call_id" => "" , "copy_number" => "");
}else{
    $The_CD = $CDs_data;
}
?>
<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header">
            <h3>CD-DVD Issue Form</h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">
                <h4>Book Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="">
                    <label class="label label-success">CD-DVD Title: </label>
                    <label class="form-control" for="book_title"><?php echo $The_CD['title']?> </label>
                    <label class="label label-success">CD-DVD Subject: </label>
                    <label class="form-control" for="book_title"><?php echo $The_CD['subject']?> </label>
                    <label class="label label-success">CD-DVD Publisher: </label>
                    <label class="form-control" for="book_title"><?php echo $The_CD['publisher']?> </label>
                </form>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">
                <h4>Student Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="Librarian.php">
                    <input type="hidden" name="CDs_ID" value="<?php echo $The_CD['id']?>">
                    <label class="label label-success">User Type: </label>
                    <select class="form-control" name="user_type" style="margin-bottom: 20px">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                    <label class="label label-success" style="margin-top: 30px">Student Pocket ID: </label>
                    <input type="text" class="form-control" name="user_id"  placeholder="User ID" value=""><br>
                    <input type="submit" class="form-control" name="confirm_user" value="Submit">
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