<?php
if(isset($_POST['Update_Book'])){
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
    $engine->update_cd($_POST['lib_cd_id'],$_POST['title'],$_POST['subject'],$_POST['publisher'],$_POST['cat_id'],$_POST['num_cd'],$_POST['copy_num'],$_POST['call_num'],$_POST['shelf_store']);
    $The_CD = $engine->get_CDs($_POST['lib_cd_id']);
}
?>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <form class="form-horizontal"  method="post" action="Librarian.php?page=library_cd_dvd">
            <div class="col-lg-4" >
            </div>
            <div class="col-lg-4" >
            </div>
            <div class="col-lg-4T" >
                <div class="col-lg-4 pull-right" style="margin-top: 10px">
                    <input class="form-control btn-"name="Go_To_Library" type="submit" value="Go To Library"><br>
                </div>
            </div>
        </form>
        </div>
        </div>

        <h3>Edit Book Parameters</h3>
        <hr>
        <form class="form-horizontal"  method="post" action="">
            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Title: </label>
                    <input  hidden="hidden" type="text" name="lib_cd_id" value="<?php echo $The_CD['id']?>">
                    <input class="form-control" type="text" name="title" value="<?php echo $The_CD['title']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Subject: </label>
                    <input class="form-control" type="text" name="subject" value="<?php echo $The_CD['subject']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Publisher: </label>
                    <input class="form-control" type="text" name="publisher" value="<?php echo $The_CD['publisher']?>">
                </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Number Of CDs: </label>
                    <input class="form-control" type="text" name="num_cd" value="<?php echo $The_CD['number_cd']?>">
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Call Number: </label>
                    <input class="form-control" type="text" name="call_num" value="<?php echo $The_CD['call_number']?>">
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Copy Number: </label>
                    <input class="form-control" type="number" name="copy_num" value="<?php echo $The_CD['copy_number']?>">
                </div>


            </div>
            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                        <label class="label label-success">Category: </label>
                        <select class="form-control" name="cat_id" id="cat_id">
                            <?php
                            require_once 'private/LMS_Engine.php';
                            $engine = new LMS_Engine();
                            $vals = $engine->get_all_book_categories();
                            echo '<option value='.$The_CD['cat_id'].'>'.$engine->get_book_cat_name($The_CD['cat_id'])['name'].'</option>';
                            foreach($vals as $values){
                                echo "<option value='{$values['id']}'>{$values['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                        <label class="label label-success">From: </label>
                        <select class="form-control" name="shelf_store" id="shelf_store">
                            <?php
                            if(isset($The_CD['shelf_or_store'])){
                                echo '<option>'.$The_CD['shelf_or_store'].'</option>';
                            }
                            ?>
                            <option>Shelf</option>
                            <option>Store</option>
                        </select>
                    </div>
                    <div class="col-sm-8"></div>
                    <div class="col-lg-4" style="margin-top: 150px">
                        <input class="form-control btn-primary"name="Update_Book" type="submit" value="Save"><br>
                    </div>


                </div>
            </div>
        </form>
    </div>

</div>