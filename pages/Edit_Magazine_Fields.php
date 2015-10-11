<?php
if(isset($_POST['Update_Magazine'])){
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
    $engine->update_magazine($_POST['lib_meg_id'],$_POST['title'],$_POST['subject'],$_POST['publisher'],$_POST['page_num'],$_POST['publish_date'],$_POST['call_num'],$_POST['copy_num'],$_POST['shelf_store'],$_POST['cat_id']);
    $The_Mag = $engine->get_magazine($_POST['lib_meg_id']);
}
?>

<div class="container"><br>
    <div class="row">
        <form class="form-horizontal"  method="post" action="Librarian.php?page=library_magazine">
            <div class="col-lg-4" >
            </div>
            <div class="col-lg-4" >
            </div>
            <div class="col-lg-4t" >
                <div class="col-lg-4 pull-right" style="margin-top: 10px">
                    <input class="form-control btn-"name="Go_To_Library" type="submit" value="Go To Library"><br>
                </div>
            </div>
        </form>
        </div>
    <div class="row">
        <h3>Edit Magazine Parameters</h3>
        <hr>
        <form class="form-horizontal"  method="post" action="">
            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Title: </label>
                    <input  hidden="hidden" type="text" name="lib_meg_id" value="<?php echo $The_Mag['id']?>">
                    <input class="form-control" type="text" name="title" value="<?php echo $The_Mag['title']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Subject: </label>
                    <input class="form-control" type="text" name="subject" value="<?php echo $The_Mag['subject']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Publisher: </label>
                    <input class="form-control" type="text" name="publisher" value="<?php echo $The_Mag['publisher']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Publish Date: </label>
                    <input class="form-control" type="date" name="publish_date" value="<?php echo $The_Mag['publish_date']?>">
                </div>
            </div>


            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Number of Pages: </label>
                    <input class="form-control" type="number" name="page_num" value="<?php echo $The_Mag['page_number']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Call ID: </label>
                    <input class="form-control" type="text" name="call_num" value="<?php echo $The_Mag['call_number']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Copy Number: </label>
                    <input class="form-control" type="text" name="copy_num" value="<?php echo $The_Mag['copy_number']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Registered Date: </label>
                    <input class="form-control" type="text" name="createdd" value="<?php echo $The_Mag['created']?>">
                </div>
            </div>



            <div class="col-sm-4 col-md-4 col-lg-4" >

                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px;">
                    <label class="label label-success">Shelf or Store: </label>
                    <select class="form-control" name="shelf_store" id="cat_id">
                        <?php
                        if(isset($The_Book['shelf_or_store'])){
                            echo '<option>'.$The_Mag['shelf_or_store'].'</option>';
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
                        echo '<option value='.$The_Mag['cat_id'].'>'.$engine->get_book_cat_name($The_Mag['cat_id'])['name'].'</option>';
                        foreach($vals as $values){
                            echo "<option value='{$values['id']}'>{$values['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-8"></div>
                <div class="col-lg-4" style="margin-top: 150px">
                    <input class="form-control btn-primary"name="Update_Magazine" type="submit" value="Save"><br>
                </div>
            </div>
        </form>
    </div>

</div>