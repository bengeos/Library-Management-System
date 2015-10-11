<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
if(isset($user_id)){
    $Student = $engine->get_student($user_id);
}
?>
<div class="container">
    <br>
    <br>
    <br>
    <div class="row">
        <h3>Edit Student Parameters</h3>
        <hr>
        <form class="form-horizontal"  method="post" action="private/Page_Func.php" enctype="multipart/form-data">
            <div class="col-sm-3 col-md-3 col-lg-3" >
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px; margin-right: 20px">
                    <label class="label label-success">Photo: </label>
                    <img class="img-rounded" src="images/<?php echo $Student['photo']?>" width="120px" height="180px"><br><br>
                    <div class="col-sm-12 col-md-12 col-lg-12"">
                        <label class="label label-success">Photo: </label>
                        <input class="form-control" type="file" name="upload_image" id="photo" value="<?php echo $Student['photo']?>"><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Full Name: </label>
                    <input  hidden="hidden" type="text" name="STD_id" value="<?php echo $Student['id']?>">
                    <input class="form-control" type="text" name="name" value="<?php echo $Student['name']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Pocket ID: </label>
                    <input class="form-control" type="text" name="pocket_id" value="<?php echo $Student['pocket_id']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 10px">
                    <label class="label label-success">Grade: </label>
                    <input class="form-control" type="text" name="grade" value="<?php echo $Student['grade']?>">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12"style="margin: 10px">
                    <label class="label label-success">Section: </label>
                    <input class="form-control" type="text" name="section" value="<?php echo $Student['section']?>">
                </div>

            </div>


            <div class="col-sm-4 col-md-4 col-lg-4" >
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
                    <input class="form-control btn-primary"name="Update_Student" type="submit" value="Save Changes">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
                    <input class="form-control btn-primary"name="Delete_Student" type="submit" value="Delete Student">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
                    <input class="form-control btn-primary"name="Go_Back" type="submit" value="Go To Students">
                </div>
            </div>
        </form>
    </div>
</div>
