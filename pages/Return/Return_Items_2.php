<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header">
            <h3>Library Items Return Form</h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <div class="col-sm-4 col-md-4 col-lg-4" style="margin-left: 5px; padding-bottom: 20px">
                <h4>User Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="?page=return_item">
                    <label class="label label-success">Item Type: </label>
                    <select class="form-control" name="item_type" style="margin-bottom: 15px">
                        <?php
                        if(isset($_POST['item_type'])){
                            echo '<option>'.$_POST['item_type'].'</option>';
                        }
                        ?>
                        <option>Book</option>
                        <option>CD-DVD</option>
                        <option>Magazine</option>
                    </select>
                    <label class="label label-success">Item Call Number: </label>
                    <input class="form-control" name="call_number" type="text" value="<?php if(isset($_POST['call_number'])){echo $_POST['call_number'];}?>" style="margin-bottom: 15px">
                    <label class="label label-success">Item Copy Number: </label>
                    <input class="form-control" name="copy_number" type="text" value="<?php if(isset($_POST['copy_number'])){echo $_POST['copy_number'];}?>" style="margin-bottom: 15px">
                    <input class="form-control" type="submit" name="get_book_info" value="Get Book Information">
                </form>
            </div>
            <h4>Item Information</h4>
            <hr>
            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">
                <form class="form-horizontal"  method="post" action="">
                    <label class="label label-success" style="margin-top: 0px">Full Name: </label>
                    <input type="text" class="form-control" name="user_id"  placeholder="User ID" value="<?php echo $The_User['name']?>"><br>
                    <label class="label label-success" style="margin-top: 15px">User ID </label>
                    <input type="text" class="form-control" name="user_id"  placeholder="User ID" value="<?php echo $The_User['pocket_id']?>"><br>
                    <label class="label label-success" style="margin-top: 15px">Item Title </label>
                    <input type="text" class="form-control" name="user_id"  placeholder="User ID" value="<?php echo $The_Item['title']?>"><br>
                    <label class="label label-success" style="margin-top: 15px"><?php if(isset($The_Item['author'])){echo 'Item Author';}else{ echo "Item Subject";}?> </label>
                    <input type="text" class="form-control" name="user_id"  placeholder="User ID" value="<?php if(isset($The_Item['author'])){echo $The_Item['author'];}else{ echo $The_Item['subject'];}?>"><br>
                </form>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3" style="margin-left: 5px; padding-bottom: 20px">
                <form class="form-horizontal"  method="post" action="?page=return_item">
                    <input type="text" hidden="hidden" name="item_type" value="<?php echo $_POST['item_type']?>">
                    <input type="text" hidden="hidden" name="item_id" value="<?php echo $The_Item['id']?>">
                    <label class="label label-success" style="margin-top: 0px">Item Publisher: </label>
                    <input type="text" class="form-control" name="publisher"  placeholder="User ID" value="<?php echo $The_Item['publisher']?>"><br>
                    <label class="label label-success" style="margin-top: 15px">Borrow Date </label>
                    <input type="text" class="form-control" name="borrow_date"  placeholder="User ID" value="<?php echo $The_Issue['borrow_date']?>"><br>
                    <label class="label label-success" style="margin-top: 15px">Issue Duration </label>
                    <input type="text" class="form-control" name="borrow_duration"  placeholder="User ID" value="<?php echo $The_Issue['borrow_date']?>"><br>
                    <input type="submit" class="form-control" name="confirm_return" value="Confirm Return">
                </form>
            </div>
            <div class="col-sm-1 col-md-1 col-lg-1" style="margin-left: 5px; padding-bottom: 20px">
                <form class="form-horizontal"  method="post" action="">
                    <img class="img-rounded" src="images/<?php echo $The_User['photo']?>" width="80px" height="130px" style="border: solid lightgray">
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