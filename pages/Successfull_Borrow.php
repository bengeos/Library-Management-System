<div class="container">
    <hr>
    <div class="row">
        <div class="container">
        </div>
        <hr>
        <div class="col-md-3 col-lg-3 ">
            <h3 class="form-control">Student Information</h3>
            <div class="container">
                <div  class="row" id="contact">
                    <form class="form-vertical" method="post" action="">
                        <label class="form-control" for="book_title"><strong>Full Name: </strong><?php echo $The_STD['name']?> </label> <br>
                        <label class="form-control"><strong>Grade: </strong> <?php echo $The_STD['grade']?></label> <br>
                        <label class="form-control"><strong>Section: </strong> <?php echo $The_STD['section']?></label> <br>
                        <hr>
                        <label class="form-control"><strong>Title: </strong> <?php echo $The_Book['title']?></label> <br>
                        <label class="form-control"><strong>Author: </strong><?php echo $The_Book['author']?></label> <br>
                        <label class="form-control"><strong>Publisher: </strong> <?php echo $The_Book['publisher']?></label> <br>
                        <hr>
                        <input class="form-control" type="submit" value="Finish">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>