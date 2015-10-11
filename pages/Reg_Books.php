
<div class="container">
    <hr>
    <div class="row">
        <div class="container">
            <div  class="row">
                <div class="col-md-6 col-lg-4 ">

                </div>
                <div class="col-md-6 col-lg-4 pull-right ">

                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-4 col-lg-5 ">
            <h3>Add New Book</h3>
            <div class="container">
                <div  class="row" id="contact">
                    <form class="form-horizontal" method="post" action="includes/Pages_Func.php"  >
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="UName">Category: </label>
                            <div class="col-lg-10">
                                <select name="cat_id" class="form-control"  width="30px" style="margin-bottom: 5px" >
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
                            <label class="col-lg-2 control-label" for="UName">Title: </label>
                            <div class="col-lg-10"><input class="form-control" name="title" id="title" placeholder="Enter Book Title" type="text" width="40" style="margin-bottom: 5px"> </div>
                            <label class="col-lg-2 control-label" for="UName">Author: </label>
                            <div class="col-lg-10"><input class="form-control" name="author" id="author" placeholder="Enter Book Author" type="text" width="40"style="margin-bottom: 5px"> </div>
                            <label class="col-lg-2 control-label" for="UName">Publisher: </label>
                            <div class="col-lg-10"><input class="form-control" name="publisher" id="publisher" placeholder="Enter Book Publisher" type="text" width="40"style="margin-bottom: 5px"> </div>
                            <label class="col-lg-2 control-label" for="UName">Year: </label>
                            <div class="col-lg-10"><input class="form-control" name="publish_year" id="publish_year" placeholder="Enter Book Publish Year" type="text" width="40"style="margin-bottom: 5px"> </div>
                            <label class="col-lg-2 control-label" for="UName">Address: </label>
                            <div class="col-lg-10"><input class="form-control" name="publish_address" id="publish_address" placeholder="Enter Book Publish Address" type="text" width="40"style="margin-bottom: 5px"> </div>
                            <label class="col-lg-2 control-label" for="UName">Call ID: </label>
                            <div class="col-lg-10"><input class="form-control" name="call_id" id="call_id" placeholder="Enter Book Call ID" type="text" width="40" style="margin-bottom: 5px"> </div>
                            <label class="col-lg-2 control-label" for="UName">Copy Number: </label>
                            <div class="col-lg-10"><input class="form-control" name="copy_num" id="copy_num" placeholder="Enter Book Copy Number" type="number" width="40" style="margin-bottom: 5px"> </div>
                            <label class="col-lg-2 control-label" for="UName">Save to: </label>
                            <div class="col-lg-10">
                                <select name="shelf_or_store" class="form-control"  width="30px" style="margin-bottom: 5px" >
                                    <option>shelf</option>
                                    <option>store</option>
                                </select>
                            </div>
                            <br><br>
                        </div>
                        <button class="btn btn-default" type="submit" name="Reg_Items" id="Reg_Items"><strong> Register </strong> </button>
                    </form>
                </div>
                <div class="row">
                    <form class="form-horizontal" method="post" action=""  >
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="UName">Remove: </label>
                            <div class="col-lg-3"><input class="form-control" id="UName" placeholder="ID" type="text" > </div>
                            <button class="btn btn-primary btn-lg" type="submit"><strong> Remove Book </strong> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <h3>Registered Books</h3>
            <hr>
            <form class="form-inline" method="post" role="form" action="">
                <div class="form-group">
                    <label class="sr-only" for="name">From</label>
                    <select class="form-control" name="from" id="from" style="width: 90px; margin-right: 5px">
                        <option>All</option>
                        <option>shelf</option>
                        <option>store</option>
                    </select>
                    <label>Category</label>
                    <select class="form-control" name="cat_id" id="cat_id" style="width: 120px; margin-right: 5px">
                        <?php
                        require_once 'private/LMS_Engine.php';
                        $engine = new LMS_Engine();
                        $vals = $engine->get_all_book_categories();
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                    <input type="text" class="form-control" id="hint" name="hint"
                           placeholder="Search" style="width: 160px">
                    <input type="submit" value="Search" name="Search_Items" id="Search_Items" class="btn btn-primary btn-lg" width="50px" >
                </div
            </form>
            <hr>
            <div class="table-responsive ">
                <table class="table table-hover">
                    <thead>
                    <tr style="background: #808080">
                        <th>Title</th>
                        <th>Author</th>
                        <th>Shelf or Store</th>
                        <th>Call ID</th>
                        <th>C.Num.</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
                    $founds = "";
                    if(isset($_POST['Search_Items'])) {

                        $founds = $engine->search_book($_POST['hint'], $_POST['from'], $_POST['cat_id']);
                    }else {
                       $founds = $engine->search_book(null, null, 1);
                    }
                    foreach($founds as $found){
                        include 'pages/elements/Add_Items_Table_Items.php';
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>