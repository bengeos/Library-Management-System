<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
if(isset($_POST['add_new_cd_dvd'])){
    $state = $engine->add_new_cds($_POST['title'],$_POST['subject'],$_POST['cd_number'],$_POST['copy_number'],$_POST['publisher'],$_POST['cat_id'],$_POST['call_number']);
}
$page_num = null;
$from = "All";
$hint = "";
$cat_id = 1;
if(!isset($_GET['page_num']))
{
    $page_num = 0;
    if(isset($_POST['upload_cds']))
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
            <h3>Manage Library CD-DVDs </h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <form class="form-horizontal"  method="post" action="Librarian.php?page=library_cd_dvd">
                <div class="col-md-2 col-lg-2">
                    <label class="label label-success" >From: </label>
                    <select class="form-control" name="from" id="from">
                        <?php
                        echo "<option value=\"$from\">".$from.'</option>';
                        ?>
                        <option value="All">All</option>
                        <option value="Shelf">Shelf</option>
                        <option value="Store">Store</option>
                    </select>
                </div>
                <div class="col-md-2 col-lg-2">
                    <label class="label label-success">Category: </label>
                    <select class="form-control" name="cat_id" id="cat_id">
                        <?php
                        $vals = $engine->get_all_cd_categories();
                       // if(isset($cat_id)){
                            echo '<option value='.$cat_id.'>'.$engine->get_book_cat_name($cat_id)['name'].'</option>';
                        //}
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label class="label label-success">Search hint: </label>
                    <input type="text" class="form-control" name="hint" placeholder="Search" value="<?php echo $hint; ?>"><br>
                </div>
                <div class="col-md-2 col-lg-2">
                    <input class="btn btn-primary btn-default" name="upload_cds" type="submit" value="Search CDs" style="margin-top: 10px">

                </div>
            </form>
        </div>
    </div>
    <div class="row" id="contact">
        <hr>
        <div class="col-sm-9 col-md-9 col-lg-9"  >
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr style="background: #ececec">
                        <th>Title</th>
                        <th>Subject</th>
                        <th>publisher</th>
                        <th>Shelf/Store</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead class="table table-condensed">
                    <tbody >
                    <?php
//                    if(isset($_POST['Search_Items'])) {
                        $founds = $engine->search_cds($hint, $from, $cat_id);
//                    }elseif(isset($_POST['from']) && isset($_POST['cat_id']) && isset($_POST['hint'])){
//
//                        $founds = $engine->search_cds($_POST['hint'], $_POST['from'], $_POST['cat_id']);
//                    }else {
//                        $founds = $engine->get_all_CDS();
//                    }
                    $founds = array_reverse($founds,null);
                    $total = count($founds);
                    $size = 20;
                    $start = $page_num * $size;
                    $i = 0;
                    $disp = 0;
                    foreach($founds as $found) {
                    if ($start > $i) {
                        $i++;
                        continue;
                    } elseif ($i < $start + 20) {
                        include 'pages/elements/Library_CD_Table_Items.php';
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
        </div>
        <div class="col-lg-3 pull-right" >
            <h4>Add New CD-DVDs ... </h4>
            <form class="form-horizontal"  method="post" action="">
                <div class="col-lg-12">
                    <label>Title: </label>
                    <input class="form-control" name="title" type="text">
                </div>
                <div class="col-lg-12">
                    <label>Subject: </label>
                    <input class="form-control" name="subject" type="text">
                </div>
                <div class="col-lg-12">
                    <label>Publisher: </label>
                    <input class="form-control" name="publisher" type="text">
                </div>

                <div class="col-lg-12">
                    <label>Number of CDs: </label>
                    <input class="form-control" name="cd_number" type="text">
                </div>
                <div class="col-lg-12">
                    <label>Copy Number: </label>
                    <input class="form-control" name="copy_number" type="text">
                </div>
                <div class="col-lg-12">
                    <label>Call Number: </label>
                    <input class="form-control" name="call_number" type="text">
                </div>
                <div class="col-lg-12">
                    <label>Category: </label>
                    <select class="form-control"  name="cat_id" id="cat_id">
                        <?php
                        $vals = $engine->get_all_cd_categories();
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-12" style="margin-top: 20px">
                    <input class="form-control btn-primary" type="submit" name="add_new_cd_dvd" value="Register">
                </div>
            </form>
            <div class="col-lg-12" style="margin-top: 30px;">
                <form class="form-horizontal" method="post" action="private/Page_Func.php" enctype="multipart/form-data">
                    <label>Import CD-DVDs: </label>
                    <input name="upload_file" type="file">
                    <input class="form-control btn-primary" type="submit"  name="upload_cds" value="Import" style="margin-top: 10px">
                </form>
            </div>
        </div>
    <div class="col-lg-9 well ">
            <form action="?page=search_cd_dvd" method="get" id="pagination">
                <input type="hidden" name="page" value="library_cd_dvd">
                <input type="hidden" name="from" value="<?php if(isset($_POST['from'])) { echo $_POST['from'];}else{ echo $from;}?>">
                <input type="hidden" name="cat_id" value="<?php if(isset($_POST['cat_id'])) { echo $_POST['cat_id'];}else{ echo $cat_id;}?>">
                <input type="hidden" name="hint" value="<?php if(isset($_POST['hint'])) { echo $_POST['hint'];}else{ echo $hint;}?>">
                <span class="alert-info" ><?php echo $i." of ".$total; ?></span>
                <div class="row pull-right">
                    <?php
                    if($total % 20 > 0)
                    {
                        $btns = ($total - ($total % 20))/20 + 1;
                    }else{
                        $btns = $total/20;
                    }

                    for($i = 0; $i < $btns; $i++) {
                        ?>
                        <input class="btn btn-small" name="page_num" type="submit" value="<?php echo $i; ?>"
                               style="margin-top: 10px">
                    <?php
                    }
                    ?>
                </div>
            </form>
        <br><br>
    </div>
    </div>
    <hr>