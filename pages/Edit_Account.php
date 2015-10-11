<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
$msg = "";
if(isset($_POST) && isset($_POST['update_profile'])){
    if($engine->is_librarian($_POST['cr_user_name'],$_POST['cr_user_pass'])){
        if(strlen($_POST['nw_full_name'])>3 && strlen($_POST['nw_user_name'])>3 && strlen($_POST['nw_user_pass'])>3){
            if(!$engine->is_librarian($_POST['nw_user_name'],$_POST['nw_user_pass'])){
                $con = $engine->add_new_librarian($_POST['nw_full_name'],$_POST['nw_user_name'],$_POST['nw_user_pass']);
                if($con){
                    $user_id = $engine->get_user_id_by($_POST['cr_user_name'],$_POST['cr_user_pass']);
                    $engine->remove_user_by($user_id);
                    $engine->add_new_librarian($_POST['nw_full_name'],$_POST['nw_user_name'],$_POST['nw_user_name']);
                    $msg = "Your profile is successfully updated!";
                }else{
                    $msg = "The system cannot update your profile! please notify to the Admin";
                }
            }else{
                $msg = "Your new user name and password are not valid. please use another one";
            }
        }else{
            $msg = "Your new user name and password character length is so short. please use 4 characters and more";
        }
    }else{
        $msg = "Your current user name and password are not valid";
    }
}
?>
<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header">
            <h3>Edit Profile settings</h3>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12" style="margin-left: 5px" >
            <form method="post" action="?page=update_profile">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h4>Please enter your current information</h4>
                    <hr>
                    <label class="label label-success">current user name</label>
                    <input class="form-control" type="text" name="cr_user_name"><br>
                    <label class="label label-success">current password</label>
                    <input class="form-control" type="password" name="cr_user_pass">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h4>Please enter your New information</h4>
                    <hr>
                    <label class="label label-success">New Full Name</label>
                    <input class="form-control" type="text" name="nw_full_name"><br>
                    <label class="label label-success">New user name</label>
                    <input class="form-control" type="text" name="nw_user_name"><br>
                    <label class="label label-success">New password</label>
                    <input class="form-control" type="password" name="nw_user_pass">
                    <hr>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h4>.</h4>
                    <hr>
                    <br>
                    <br>
                    <h3 style="text-align: center; color: red"><?php echo $msg?></h3>

                </div>

                <br>
                <br>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="col-sm-4 col-md-4 col-lg-4">
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input class="form-control btn-primary" name="update_profile" type="submit" value="Save changes">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                </div>
            </div>


            </form>

        </div>

    </div>
</div>
<br>
<br>
<br>
<br>