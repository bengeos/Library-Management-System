<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
?>
<div class="container" id="main">
    <h3>Search Library Items</h3>
    <div class="row" id="contact">
        <hr>
        <div class="col-lg-9"  >
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <thead>
                    <tr style="background: #ececec">
                        <th>Title</th>
                        <?php
                        if(isset($_POST['s_from']) && $_POST['s_from'] == "Books"){
                            echo '<td>Author</td>';
                        }else{
                            echo '<td>Subject</td>';
                        }
                        ?>
                        <th>Publisher</th>
                    </tr>
                    </thead class="table table-condensed">
                    <tbody >
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
                    if(isset($_POST['Search_Items'])) {
                        if(isset($_POST['s_from']) && $_POST['s_from'] == "Books"){
                            $founds = $engine->search_book_not_issued($_POST['s_hint'], "shelf", $_POST['s_cat_id']);
                        }
                        if(isset($_POST['s_from']) && $_POST['s_from'] == "CD-DVDs"){
                            $founds = $engine->search_cds_not_issued($_POST['s_hint'], "shelf", $_POST['s_cat_id']);
                        }
                        if(isset($_POST['s_from']) && $_POST['s_from'] == "Magazines"){
                            $founds = $engine->search_meg_not_issued($_POST['s_hint'], "shelf", $_POST['s_cat_id']);
                        }

                    }else {
                        $founds = $engine->search_book_not_issued(null, null, 1);
                    }
                    foreach($founds as $found){
                        include 'pages/elements/Search_Table_Items_STD.php';
                    }

                    ?>
                    </tbody>
                </table>
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr style="background: #ececec">
                        <th>Total: <?php echo count($founds)?></th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-lg-3" style="position: fixed; right:98px;" >
            <form class="form-horizontal"  method="post" action="">
                <div class="col-lg-12">
                    <label>Search From: </label>
                    <select class="form-control" name="s_from" id="from">
                        <?php
                        if(isset($_POST['s_from'])){
                            echo '<option>'.$_POST['s_from'].'</option>';
                        }
                        ?>
                        <option>Books</option>
                        <option>CD-DVDs</option>
                        <option>Magazines</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <label>Search Category: </label>
                    <select class="form-control" name="s_cat_id" id="cat_id">
                        <?php
                        require_once 'private/LMS_Engine.php';
                        $engine = new LMS_Engine();
                        $vals = $engine->get_all_book_categories();
                        if(isset($_POST['s_cat_id'])){
                            echo '<option value='.$_POST['s_cat_id'].'>'.$engine->get_book_cat_name($_POST['s_cat_id'])['name'].'</option>';
                        }
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-12">
                    <label>Search hint: </label>
                    <input type="text" class="form-control" name="s_hint" placeholder="Search" value="<?php if(isset($_POST['s_hint'])){echo $_POST['s_hint'];}?>"><br>
                </div>
                <div class="col-md-2 col-lg-2" style="margin-top: 10px">
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
<br>