<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
if(isset($_POST)){
    if(isset($_POST['Add_New_Admin'])) {
        if(strlen($_POST['Full_Name'])>5 && strlen($_POST['User_Name'])>2 && strlen($_POST['User_Pass'])>2){
            $engine->add_new_admin($_POST['Full_Name'],$_POST['User_Name'],$_POST['User_Pass']);
        }else{

        }
    }
}
?>
<div class="container" id="main">
    <br>
    <br>
    <h2><strong>Saint Joseph School</strong> </h2>
    <hr>
    <label class="form-control">Admins</label>
    <hr>
    <div  class="row" id="contact">
        <div class="col-md-3 col-lg-8"  >
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <div class="table table-responsive ">
                <table class="table table-bordered ">
                    <thead>
                    <tr style="background: #ececec">
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Reg. Date</th>
                        <th></th>
                    </tr>
                    </thead class="table table-condensed">
                    <tbody >
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
                    $found = $engine->get_all_admin();
                    foreach($found as $found){
                        $User_Table = $found;
                        include 'pages/elements/Librarian_Users_Table_Items.php';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-3 col-lg-3" style="margin-left: 50px" >
            <form class="form-vertical" role="form" method="post" action="">
                <label class="control-label">Add New Admin: </label>
                <hr>
                <input type="text" class="form-control" name="Full_Name" placeholder="Full Name"><br>
                <input type="text" class="form-control" name="User_Name" placeholder="User Name"><br>
                <input type="password" class="form-control" name="User_Pass" placeholder="Password"><br>
                <button class="btn btn-primary btn-lg"  name="Add_New_Admin" id="Add_New_Admin" type="submit"><strong> Register </strong> </button>
            </form>
        </div>
    </div>
    <div class="row">
        <hr>

    </div>
</div>