<?php
if(isset($_POST['return_item'])){
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
    $call_id = $_POST['call_id'];
    $copy_num= $_POST['copy_number'];

    print_r($_POST);
}
?>
<div class="container">
    <hr>
    <div class="row">
        <div class="container">
        </div>
        <hr>
        <div class="col-md-6 col-lg-5 ">
            <h3>Book Information</h3>
            <div class="container">
                <div  class="row" id="contact">
                    <form class="form-horizontal" method="post" action=""  >
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="UName">Call ID: </label>
                            <div class="col-lg-10"><input class="form-control" id="call_id" placeholder="Enter Book Title" value="<?php echo $call_id?>" type="text" width="40" style="margin-bottom: 5px"> </div>
                            <label class="col-lg-2 control-label" for="UName">Copy Number: </label>
                            <div class="col-lg-10"><input class="form-control" id="copy_number" placeholder="Enter Book Author" value="<?php echo $copy_num?>" type="text" width="40"style="margin-bottom: 5px"> </div>
                            <br><br>
                        </div>
                        <button class="btn btn-primary btn-lg" type="submit"><strong> Next </strong> </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <h3>Book Issued To</h3>
            <hr>
            <form class="form-vertical" method="post" action="?page=return_item"  >
                <img class="img-rounded" src="images/bbbb.png" width="70px" height="95px"><br><br>
                <label class="form-control">Full Name: <?php ?></label>
                <label class="form-control">Pocket ID: <?php ?></label>
                <label class="form-control">Grade: <?php ?></label>
                <label class="form-control">Section: <?php ?></label>
                <label class="form-control">Issued Date: <?php ?></label>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg" type="submit"><strong> Confirm </strong> </button>
                </div>

            </form>
        </div>
    </div>
</div>