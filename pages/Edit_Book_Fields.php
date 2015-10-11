<?php
if(isset($_POST['Update_Book'])){
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
    $engine->update_book($_POST['lib_book_id'],$_POST['title'],$_POST['author'],$_POST['publisher'],$_POST['publish_year'],$_POST['publish_address'],$_POST['call_id'],$_POST['copy_number'],$_POST['shelf_store'],$_POST['cat_id']);
    $The_Book = $engine->get_book($_POST['lib_book_id']);
}elseif($_POST['Delete_Book']){
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
    $engine->delete_book($_POST['lib_book_id']);
}
?>

<div class="container">
    <br>
    <div class="row"><div class="col-lg-12">
        <form class="form-horizontal"  method="post" action="Librarian.php?page=library_books">
            <div class="pull-right"style="margin-top: 20px" >
                    <input class="form-control btn-primary"name="Go_To_Library" type="submit" value="Go To Library"><br>
                </div>
            <br>
            </div>
        </form>
        <hr>
        </div>
        <h3>Edit Book Parameters</h3>
        <hr>
        <form class="form-horizontal"  method="post" action="">
            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Title: </label>
                    <input  hidden="hidden" type="text" name="lib_book_id" value="<?php echo $The_Book['id']?>">
                    <input class="form-control" type="text" name="title" value="<?php echo $The_Book['title']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Author: </label>
                    <input class="form-control" type="text" name="author" value="<?php echo $The_Book['author']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Publisher: </label>
                    <input class="form-control" type="text" name="publisher" value="<?php echo $The_Book['publisher']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Publish Year: </label>
                    <input class="form-control" type="text" name="publish_year" value="<?php echo $The_Book['publish_year']?>">
                </div>
            </div>


            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Publish Address: </label>
                    <input class="form-control" type="text" name="publish_address" value="<?php echo $The_Book['publish_address']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Call ID: </label>
                    <input class="form-control" type="text" name="call_id" value="<?php echo $The_Book['call_id']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Number of Copies: </label>
                    <input class="form-control" type="number" name="copy_number" value="<?php echo $The_Book['copy_number']?>">
                </div>


            </div>
            <div class="col-sm-4 col-md-4 col-lg-4" >

                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Shelf or Store: </label>
                    <select class="form-control" name="shelf_store" id="cat_id">
                        <?php
                        if(isset($The_Book['shelf_or_store'])){
                            echo '<option>'.$The_Book['shelf_or_store'].'</option>';
                        }
                        ?>
                        <option>Shelf</option>
                        <option>Store</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Category: </label>
                    <select class="form-control" name="cat_id" id="cat_id">
                        <?php
                        require_once 'private/LMS_Engine.php';
                        $engine = new LMS_Engine();
                        $vals = $engine->get_all_book_categories();
                        echo '<option value='.$The_Book['cat_id'].'>'.$engine->get_book_cat_name($The_Book['cat_id'])['name'].'</option>';
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div >
                <div class="col-sm-5" style="margin-top: 80px">
                    <input class="form-control btn-primary"name="Update_Book" type="submit" value="Save Changes"><br>
                </div>
                <div class="col-sm-5" style="margin-top: 80px">
                    <input class="form-control btn-default"name="Delete_Book" type="submit" value="Delete"><br>
                </div>
                    </div>
            </div>
        </form>
    </div>
</div>
<br>
<br>
<br>
<br>
