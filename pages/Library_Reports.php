<?php
require_once "private/LMS_Engine.php";
$engine = new LMS_Engine();
$book_count = $engine->get_number_of_books();
$cd_count = $engine->get_number_of_cds();
$mag_count = $engine->get_number_of_magazine();
$book_count_SH = $engine->get_number_of_book_on('shelf');
$cd_count_SH = $engine->get_number_of_cd_on('shelf');
$mag_count_SH = $engine->get_number_of_mag_on('shelf');

$book_count_ST = $engine->get_number_of_book_on('store');
$cd_count_ST = $engine->get_number_of_cd_on('store');
$mag_count_ST = $engine->get_number_of_mag_on('store');

if(isset($_POST['item_users'])){
    $book_users = $engine->get_number_of_student_book_users_since($_POST['date']);
    $cds_users = $engine->get_number_of_student_cd_users_since($_POST['date']);
    $mag_users = $engine->get_number_of_student_mag_users_since($_POST['date']);

    $book_borrow = $engine->get_number_of_books_issued_since($_POST['date']);
    $book_returned = $engine->get_number_of_book_returned_issues_since($_POST['date']);

    $cds_borrow = $engine->get_number_of_cds_issued_since($_POST['date']);
    $cds_returned = $engine->get_number_of_cds_returned_issues_since($_POST['date']);

    $mag_borrow = $engine->get_number_of_mag_issued_since($_POST['date']);
    $mag_returned = $engine->get_number_of_mag_returned_issues_since($_POST['date']);
}

?>



<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header">
            <h3>Library Reports</h3>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-6">
            <strong>Number of Items Issued Since</strong>
                <div class="table-responsive">
                    <table class="table table-hover" style="color: #a19ac0; border: solid 1px; ">
                        <thead>
                        <tr class="table table-condensed">
                            <form method="post" action="?page=report">
                                <th>Pick Date</th>
                                <th>
                                    <input class="form-control" name="date" type="date" value="<?php if(isset($_POST['date'])){echo $_POST['date'];}?>"  style="max-height:30px; margin-bottom: 5px;">
                                </th>
                                <th>
                                    <input class="form-control" type="submit" name="item_users" value="Excute" style="max-height: 30px; margin-bottom: 5px">
                                </th>
                                <th>

                                </th>
                            </form>
                        </tr>
                        <tr class="active">
                            <th>No</th>
                            <th>Item</th>
                            <th>Borrowed</th>
                            <th>Returned</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="" style="color: #337ab7">
                            <th>1</th>
                            <th>Books</th>
                            <th><?php if(isset($book_borrow)){echo $book_borrow;}?></th>
                            <th><?php if(isset($book_returned)){echo $book_returned;}?></th>
                        </tr>
                        <tr class="tab-pane" style="color: #337ab7">
                            <th>2</th>
                            <th>CD-DVDs</th>
                            <th><?php if(isset($cds_borrow)){echo $cds_borrow;}?></th>
                            <th><?php if(isset($cds_returned)){echo $cds_returned;}?></th>
                        </tr>
                        <tr class="tab-pane" style="color: #337ab7">
                            <th>3</th>
                            <th>Magazines</th>
                            <th><?php if(isset($mag_borrow)){echo $mag_borrow;}?></th>
                            <th><?php if(isset($mag_returned)){echo $mag_returned;}?></th>
                        </tr>
                        <tr class="table-bordered" style="color: #337ab7; background: #e9e6e6">

                            <th>Total:</th>
                            <th></th>
                            <th><?php if(isset($book_returned)){echo ($cds_borrow+$mag_borrow+$book_borrow);}?></th>
                            <th><?php if(isset($book_returned)){echo ($book_returned+$cds_returned+$mag_returned);}?></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-6"">
            <strong>Number of Users Since</strong>
                <div class="table-responsive">
                    <table class="table table-hover" style="color: #a19ac0; border: solid 1px">
                        <thead>
                        <tr class="table table-condensed">
                            <form method="post" action="?page=report">
                                <th>Pick Date</th>
                                <th>
                                    <input class="form-control" name="date" type="date">
                                </th>
                                <th>
                                    <input class="form-control" type="submit" name="item_users" value="Excute">
                                </th>
                            </form>
                        </tr>
                        <tr class="active">
                            <th>No</th>
                            <th>Item</th>
                            <th>No. Users</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="" style="color: #337ab7">
                            <th>1</th>
                            <th>Books</th>
                            <th><?php if(isset($book_users)){echo $book_users;}?></th>
                        </tr>
                        <tr class="tab-pane" style="color: #337ab7">
                            <th>2</th>
                            <th>CD-DVDs</th>
                            <th><?php if(isset($cds_users)){echo $cds_users;}?></th>
                        </tr>
                        <tr class="tab-pane" style="color: #337ab7">
                            <th>3</th>
                            <th>Magazines</th>
                            <th><?php if(isset($mag_users)){echo $mag_users;}?></th>
                        </tr>
                        <tr class="table-bordered" style="color: #337ab7; background: #e9e6e6">
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
<hr>
        <div class="col-lg-12">
            <strong>Library Item Counts</strong>
                <div class="table-responsive">
                    <table class="table table-hover" style="color: #a19ac0; border: solid 1px">
                        <thead>
                        <tr class="active">
                            <th>No</th>
                            <th>Item</th>
                            <th>On Shelf</th>
                            <th>On Store</th>
                            <th>Total Count</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="" style="color: #337ab7">
                            <th>1</th>
                            <th>Books</th>
                            <th><?php if(isset($book_count_SH)){echo $book_count_SH;}?></th>
                            <th><?php if(isset($book_count_ST)){echo $book_count_ST;}?></th>
                            <th><?php if(isset($book_count)){echo $book_count;}?></th>
                        </tr>
                        <tr class="" style="color: #337ab7">
                            <th>2</th>
                            <th>CD-DVDs</th>
                            <th><?php if(isset($cd_count_SH)){echo $cd_count_SH;}?></th>
                            <th><?php if(isset($cd_count_ST)){echo $cd_count_ST;}?></th>
                            <th><?php if(isset($cd_count)){echo $cd_count;}?></th>
                        </tr>
                        <tr class="" style="color: #337ab7">
                            <th>3</th>
                            <th>Magazines</th>
                            <th><?php if(isset($mag_count_SH)){echo $mag_count_SH;}?></th>
                            <th><?php if(isset($mag_count_ST)){echo $mag_count_ST;}?></th>
                            <th><?php if(isset($mag_count)){echo $mag_count;}?></th>
                        </tr>
                        <tr class="table-bordered" style="color: #337ab7; background: #e9e6e6">
                            <th></th>
                            <th>Total:</th>
                            <th><?php if(isset($book_count)){echo ($book_count_SH+$mag_count_SH+$cd_count_SH);}?></th>
                            <th><?php if(isset($book_count)){echo ($book_count_ST+$mag_count_ST+$cd_count_ST);}?></th>
                            <th><?php if(isset($book_count)){echo ($book_count+$mag_count+$cd_count);}?></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
</div>
<br><br><br><br><br><br><br><br><br><br>

