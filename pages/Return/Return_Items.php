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
            <h3>Library Items Return Form</h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <div class="col-sm-4 col-md-4 col-lg-4" style="margin-left: 5px; padding-bottom: 20px">
                <h4>User Information</h4>
                <hr>
                <form class="form-horizontal"  method="post" action="?page=return_item">
                    <label class="label label-success">Item Type: </label>
                    <select class="form-control" name="item_type" style="margin-bottom: 15px">
                        <option>Book</option>
                        <option>CD-DVD</option>
                        <option>Magazine</option>
                    </select>
                    <label class="label label-success">Item Call Number: </label>
                    <input class="form-control" name="call_number" type="text" style="margin-bottom: 15px">
                    <label class="label label-success">Item Copy Number: </label>
                    <input class="form-control" name="copy_number" type="text" style="margin-bottom: 15px">
                    <input class="form-control" type="submit" name="get_book_info" value="Get Book Information">
                </form>
            </div>
        </div>
    </div>
</div>