<?php
if(!isset($book_data))
{
    $book_data = array("title" => "", "call_id" => "" , "copy_number" => "");
}
?>
<div class="container">
    <hr>
    <div class="row">
        <div class="container">
        </div>
        <hr>
        <div class="col-md-3 col-lg-3 ">
            <h3>Book Information</h3>
            <div class="container">
                <div  class="row" id="contact">
                    <form class="form-vertical" method="post" action="">
                        <label class="form-control" for="book_title">Book Title: <?php echo $book_data['title']?> </label> <br>
                        <label class="form-control">Book Call ID: <?php echo $book_data['call_id']?></label> <br>
                        <label class="form-control">Book Copy No: <?php echo $book_data['copy_number']?></label> <br>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 " style="margin-left: 30px">
            <h3>Customer Information</h3>
            <div class="container">
                <div  class="row" id="contact">
                    <form class="form-vertical" method="post" action="Librarian.php">
                        <div class="form-group">
                            <input type="hidden" name="book_id" value="<?php echo $book_data['id']?>">
                            <select class="form-control" name="user_type">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select><br>
                            <input type="text" class="form-control" name="user_id"  placeholder="User ID" value=""><br>
                            <input type="submit" class="form-control" name="confirm_user" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>