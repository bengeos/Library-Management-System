<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
$page_num = null;
$from = "All";
$hint = "";
$cat_id = 1;
if(!isset($_GET['page_num']))
{
    $page_num = 0;
    if(isset($_POST['Search_Items']))
    {
        $from = $_POST['from'];
        $hint = $_POST['hint'];
        $cat_id = $_POST['cat_id'];
    }
}else{
    $page_num = $_GET['page_num'];
    $from = $_GET['from'];
    $hint = $_GET['hint'];
    $cat_id = $_GET['cat_id'];
}
?>
<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header">
            <h3>Search Library Magazines</h3>
        </div>

    <div class="row" id="contact">

        <div class="col-lg-9"  >
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <thead>
                    <tr style="background: #ececec">
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Publisher</th>
                        <th>Publish Date</th>
                        <th></th>
                    </tr>
                    </thead class="table table-condensed">
                    <tbody >
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
//                    if(isset($_POST['Search_Items'])) {
                        $founds = $engine->search_meg_not_issued($hint, $from, $cat_id);
//                    }else {
//                           $founds = $engine->search_meg_not_issued(null, null, 1);
//                    }
                    $total = count($founds);
                    $size = 10;
                    $start = $page_num * $size;
                    $i = 0;
                    $disp = 0;
                    foreach($founds as $found){
                        if($start > $i)
                        {
                            $i++;
                            continue;
                        }elseif( $i < $start +10) {
                        include 'pages/elements/Search_Magazine_Table_Items.php';
                            $disp++;
                        $i++;
                    }else{
                        break;
                    }
                    }

                    ?>
                    </tbody>
                </table>
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr style="background: #ececec">
                        <th>Displayed: <?php echo $disp; ?></th>
                    </tr>
                </table>
            </div>
            <div class="table table-responsive">
                <div class="well">
                    <form action="?page=search_magazine" method="get" id="pagination">
                        <input type="hidden" name="page" value="search_magazine">
                        <input type="hidden" name="from" value="<?php if(isset($_POST['from'])) { echo $_POST['from'];}else{ echo $from;}?>">
                        <input type="hidden" name="cat_id" value="<?php if(isset($_POST['cat_id'])) { echo $_POST['cat_id'];}else{ echo $cat_id;}?>">
                        <input type="hidden" name="hint" value="<?php if(isset($_POST['hint'])) { echo $_POST['hint'];}else{ echo $hint;}?>">
                        <input type="hidden" name="type" value="<?php if(isset($_POST['type'])) { echo $_POST['type'];}else{ echo $type;}?>">
                        <span class="alert-info" ><?php echo $i." of ".$total; ?></span>
                        <div class="row pull-right">
                            <?php
                            $btns = ($total - ($total % 10))/10 + 1;
                            for($i = 0; $i < $btns; $i++) {
                                ?>
                                <input class="btn btn-small" name="page_num" type="submit" value="<?php echo $i; ?>"
                                       style="margin-top: 10px">
                            <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3" style="position: fixed; right:20px;" >
            <form class="form-horizontal"  method="post" action="Librarian.php?page=search_magazine">
                <div class="col-lg-12">
                    <label class="label label-success"> Search From: </label>
                    <select class="form-control" name="from" id="from">
                        <?php

                        echo "<option value=\"$from\">".$from.'</option>';

                        ?>
                        <option value="All">All</option>
                        <option value="Shelf">Shelf</option>
                        <option value="Store">Store</option>
                    </select>
                </div>

                <div class="col-lg-12"><br>
                    <label class="label label-success">Search Category: </label>
                    <select class="form-control" name="cat_id" id="cat_id">
                        <?php
                        require_once 'private/LMS_Engine.php';
                        $engine = new LMS_Engine();
                        $vals = $engine->get_all_mag_categories();
                        if(isset($cat_id)){
                            echo '<option value='.$cat_id.'>'.$engine->get_book_cat_name($cat_id)['name'].'</option>';
                        }
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-12">
                    <br>
                    <label class="label label-success">Search hint: </label>
                    <input type="text" class="form-control" name="hint" placeholder="Search" value="<?php if(isset($_POST['hint'])){echo $_POST['hint'];}?>"><br>
                </div>
                <div class="col-lg-2">
                    <input class="btn btn-primary btn-default" name="Search_Items" type="submit" value="Search Book" style="margin-top: 10px">

                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<br>
<br>
<br>
