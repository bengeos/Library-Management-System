<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
if(isset($_POST)){
    if(isset($_POST['Add_New_Teacher'])) {
        if(strlen($_POST['Full_Name'])>2 && strlen($_POST['User_Name'])>2 && strlen($_POST['User_Pass'])>2){
            $engine->add_new_teacher($_POST['Full_Name'],$_POST['User_Name'],$_POST['User_Pass'],$_POST['Department']);
        }else{

        }
    }elseif(isset($_POST['Remove_Teacher']) AND $_POST['Remove_Teacher'] == "Remove")
    {
        $engine->remove_user_by($_POST['User_ID']);
    }
}
if(isset($_GET['page_num']))
{
    $page_num = $_GET['page_num'];
}else{
    $page_num = 0;
}
?>
?>
<div class="container" id="main"><br>
    <h3><strong>Registered School Teachers</strong> </h3><hr>
    <div  class="row" id="contact">
        <div class="col-md-3 col-lg-8"  >
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <div class="table table-responsive ">
                <table class="table table-bordered ">
                    <thead>
                    <tr style="background: #ececec">
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>User Name</th>
                        <th>Reg. Date</th>
                        <th></th>
                    </tr>
                    </thead class="table table-condensed">
                    <tbody >
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
                    $founds = $engine->get_all_teachers();
                    $total = count($founds);
                    $size = 10;
                    $start = $page_num * $size;
                    $i = 0;
                    $disp = 0;
                    foreach($founds as $found) {
                        if ($start > $i) {
                            $i++;
                            continue;
                        } elseif ($i < $start + 10) {
                        $User_Table = $found;
                        $Staff_Table = $engine->get_staff_by($found['id']);
                        include 'pages/elements/Teacher_Users_Table_Items.php';
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
                        <th>Displayed: <?php echo $disp;?></th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-lg-3" style="position:fixed; left:980px; top: 120px">
            <form class="form-vertical" role="form" method="post" action="">
                <label>Add New Teacher: </label><br>
                <label>Full Name: </label>
                <input type="text" class="form-control" name="Full_Name" placeholder="Full Name">
                <input type="hidden" class="form-control" name="Department" value="Teacher" >
                <label>Username: </label>
                <input type="text" class="form-control" name="User_Name" placeholder="User Name"><br>
                <label>Password: </label>
                <input type="password" class="form-control" name="User_Pass" placeholder="Password"><br>
                <button class="btn btn-primary" name="Add_New_Teacher" id="Add_New_Teacher" type="submit"><strong> Register </strong> </button>
            </form>
        </div>
    </div>
    <div class="well">
        <form action="?page=search_cd_dvd" method="get" id="pagination">
            <input type="hidden" name="page" value="library_books">
            <span class="alert-info" ><?php echo $i." of ".$total; ?></span>
            <div class="row pull-right">
                <?php
                if($total % 10 > 0)
                {
                    $btns = ($total - ($total % 10))/10 + 1;
                }else{
                    $btns = $total/10;
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
    </div>
    <div class="row">
        <hr>

    </div>
</div>