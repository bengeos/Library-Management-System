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
                        <img src="" width="150px" height="200px">
                        <label class="form-control" for="book_title">Full name: <?php echo $book_data['title']?> </label> <br>
                        <label class="form-control">Grade: <?php echo $book_data['call_id']?></label> <br>
                        <label class="form-control">Section: <?php echo $book_data['copy_number']?></label> <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>