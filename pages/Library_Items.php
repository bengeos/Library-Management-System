<hr>
<div class="container" id="main">
    <div  class="row" id="contact">
        <div class="page-header">
            <h3>Library Items.. </h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <form class="form-horizontal"  method="post" action="">
                <div class="col-md-2 col-lg-2">
                    <label class="label label-success" >From: </label>
                    <select class="form-control" name="from" id="from">
                        <option>All</option>
                        <option>Shelf</option>
                        <option>Store</option>
                    </select>
                </div>
                <div class="col-md-2 col-lg-2">
                    <label class="label label-success">Category: </label>
                    <select class="form-control" name="cat_id" id="cat_id">
                        <?php
                        require_once 'private/LMS_Engine.php';
                        $engine = new LMS_Engine();
                        $vals = $engine->get_all_book_categories();
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label class="label label-success">Search hint: </label>
                    <input type="text" class="form-control" name="hint" placeholder="Search"><br>
                </div>
                <div class="col-md-2 col-lg-2" style="margin-top: 10px">
                    <input class="btn btn-primary btn-default" type="submit" value="Search Items" style="margin-top: 10px">

                </div>
            </form>
        </div>
    </div>
    <div class="row" id="contact">
        <hr>
        <div class="col-sm-8 col-md-8 col-lg-8"  >
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr style="background: #ececec">
                        <th>Title</th>
                        <th>Author</th>
                        <th>Type</th>
                        <th>Shelf/Store</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead class="table table-condensed">
                    <tbody >
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
                    if(isset($_POST['Search_Items'])) {
                        $founds = $engine->search_book_not_issued($_POST['hint'], $_POST['from'], $_POST['cat_id']);
                    }else {
                        $founds = $engine->search_book_not_issued(null, null, 1);
                    }
                    foreach($founds as $found){
                        include 'pages/elements/Search_Table_Items.php';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4" >
            <h4>Add New Items.. </h4>
            <form class="form-horizontal"  method="post" action="">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="label label-success">Title: </label>
                    <input class="form-control" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="label label-success">Author: </label>
                    <input class="form-control" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="label label-success">Publisher: </label>
                    <input class="form-control" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="label label-success">Publish Year: </label>
                    <input class="form-control" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="label label-success">Publish Address: </label>
                    <input class="form-control" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="label label-success">Call ID: </label>
                    <input class="form-control" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="label label-success">Number of Copies: </label>
                    <input class="form-control" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="label label-success">Category: </label>
                    <select class="form-control" name="cat_id" id="cat_id">
                        <?php
                        require_once 'private/LMS_Engine.php';
                        $engine = new LMS_Engine();
                        $vals = $engine->get_all_book_categories();
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
                    <input class="form-control btn-primary" type="submit" value="Register">
                </div>
            </form>
        </div>

    </div>
</div>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>