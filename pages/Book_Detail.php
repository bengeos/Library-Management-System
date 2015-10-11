<?php
if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
    $Student = $engine->get_student_by_pid($user_id);
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
            <h3>Customer Information kk</h3>
            <div class="container">
                <div  class="row" id="contact">
                    <form class="form-vertical" method="post" action="Librarian.php">
                        <div class="form-group">
                            <label>User ID:</label>
                            <input type="hidden" name="book_id" value="">
                            <input type="text" class="form-control" name="user_id" value="<?php echo $user_id;?>"><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 " style="margin-left: 30px">
            <h3>Customer Details</h3>
            <div class="container">
                <div  class="row" id="contact">
                    <form class="form-vertical" method="post" action="Test.php">
                        <div class="form-group">
                            <img src="images/<?php echo $Student['photo']?>" width="70px" height="95px"><br><br>
                            <input type="text" hidden="hidden" name="student_id" value="<?php echo $Student['id']?>">
                            <input type="text" hidden="hidden" name="book_id" value="<?php echo $book_data['id']?>">
                            <label class="form-control" for="book_title">Full Name: <?php echo $Student['namev']?> </label>
                            <label class="form-control" for="book_title">Grade: <?php echo $Student['grade']?> </label>
                            <label class="form-control" for="book_title">Section: <?php echo $Student['section']?> </label>
                            <input class="form-control" type="submit" name="confirm_book_borrow" value="Confirm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>