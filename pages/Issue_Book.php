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
                            <input type="text" class="form-control" name="user_id"  placeholder="User ID" value="<?php echo $user_id?>"><br>
                            <input type="submit" class="form-control" name="confirm_user" value="Submit">
                        </div>
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
                            <img class="img-rounded" src="images/<?php echo $user['photo']?>" width="70px" height="95px">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 " style="margin-left: 30px">
            <h3>Student Detail</h3>
            <div class="container">
                <div  class="row" id="contact">
                    <form class="form-vertical" method="post" action="private/Page_Func.php">
                        <div class="form-group">
                            <input type="text" hidden="hidden" name="user_id" value="<?php echo $user['id']?>">
                            <input type="text" hidden="hidden" name="pocket_id" value="<?php echo $user['pocket_id']?>">
                            <input type="text" hidden="hidden" name="book_id" value="<?php echo $book_data['id']?>">
                            <input type="text" hidden="hidden" name="call_id" value="<?php echo $book_data['call_id']?>">
                            <input type="text" hidden="hidden" name="copy_number" value="<?php echo $book_data['copy_number']?>">
                            <input type="text" hidden="hidden" name="user_type" value="<?php echo $user_type?>">
                            <input type="text" hidden="hidden" name="librarian_id" value="Librarian">
                            <label class="form-control" for="book_title">Full Name: <?php echo $user['name']?> </label>
                            <label class="form-control" for="book_title">Grade: <?php echo $user['grade']?> </label>
                            <label class="form-control" for="book_title">Section: <?php echo $user['section']?> </label>
                            <input class="form-control" type="submit" name="confirm_book_borrow" value="Confirm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>