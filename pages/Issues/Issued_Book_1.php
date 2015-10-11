<?php
if(!isset($book_data))
{
    $book_data = array("title" => "", "call_id" => "" , "copy_number" => "");
}else{
    $The_Book = $book_data;
}
?>
<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header">
            <h3>Book Issue Form</h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <div class="col-sm-4 col-md-4 col-lg-4" style="margin-left: 5px; padding-bottom: 20px">
                <h4>Book Information</h4>
                    <hr>
                    <form class="form-horizontal"  method="post" action="">
                        <label class="label label-success">Book Title: </label>
                        <label class="form-control" for="book_title"><?php echo $The_Book['title']?> </label>
                        <label class="label label-success">Book Author: </label>
                        <label class="form-control" for="book_title"><?php echo $The_Book['author']?> </label>
                        <label class="label label-success">Book Publisher: </label>
                        <label class="form-control" for="book_title"><?php echo $The_Book['publisher']?> </label>
                        <label class="label label-success">Book Publisher Address: </label>
                        <label class="form-control" for="book_title"><?php echo $The_Book['publish_address']?> </label>
                    </form>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4" style="margin-left: 5px; padding-bottom: 20px">
                <h4>Student Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="Librarian.php">
                    <input type="hidden" name="book_id" value="<?php echo $The_Book['id']?>">
                    <label class="label label-success">User Type: </label>
                    <select class="form-control" name="user_type" style="margin-bottom: 20px">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                    <label class="label label-success" style="margin-top: 30px">Student Pocket ID: |<small>Full name for teachers</small> </label>
                    <input type="text" class="form-control" name="user_id"  placeholder="Student Pocket ID | Teacher full name " value=""><br>
                    <input type="submit" class="form-control btn-primary" name="confirm_user" value="Submit">
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