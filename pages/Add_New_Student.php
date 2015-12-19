<?php

$page_num = null;
$grade = null;
$section =null;
$hint = null;

if(!isset($_GET['page_num']))
{
    $page_num = 0;
    if(isset($_POST['Search_Items']))
    {
        $grade = $_POST['grade'];
        $hint = $_POST['hint'];
        $section = $_POST['section'];
    }
}else{
    $page_num = $_GET['page_num'];
    $grade = $_GET['grdae'];
    $hint = $_GET['hint'];
    $section = $_GET['section'];
}
?>
<div class="container" id="main">
    <div  class="row" id="contact">
        <hr>
        <div class="page-header" style="margin-bottom: 20px">
            <h3>Manage Library Students </h3>
        </div>
        <div class="col-md-12 col-lg-12" style="margin-left: 5px" >
            <form class="form-horizontal"  method="post" action="">
                <div class="col-lg-2">
                    <label class="label label-success"> Grade: </label>
                    <select class="form-control" name="grade" id="grade">
                        <?php
                        $vals = $engine->get_all_grades_();
                        if($grade == null)
                        {
                            echo "<option value=\"All\">All</option>";
                        }else{
                            echo "<option value='{$grade}'>{$grade}</option>";
                            echo "<option value=\"All\">All</option>";
                        }

//                        }
                        foreach($vals as $values){
                            echo "<option value='{$values['grade']}'>{$values['grade']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label class="label label-success">Section: </label>
                    <select class="form-control" name="section" id="section">
                        <?php
                        $vals = $engine->get_all_sections_();
                        if($section == null) {
                                echo "<option value=\"All\">All</option>";
                        }else{
                            echo "<option value='{$section}'>{$section}</option>";
                            echo "<option value=\"All\">All</option>";
                        }
                        foreach($vals as $values){
                            echo "<option value='{$values['section']}'>{$values['section']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label class="label label-success">Search hint: </label>
                    <input type="text" class="form-control" name="hint" placeholder="Search"><br>
                </div>
                <div class="col-lg-2">
                    <input class="btn btn-primary btn-default" name="Search_Items" type="submit" value="Search Student" style="margin-top: 10px">
                </div>
            </form>
        </div>
    </div>
    <div class="row" id="contact">
        <hr>
        <div class="col-lg-9" style="margin-bottom: 20px"  >
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <thead>
                    <tr  style="background:#ececec">
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>Pocket ID</th>
                        <th>Grade</th>
                        <th>Section</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
//                    if(isset($_POST['Search_Items'])) {

                    $founds = $engine->search_Student($hint,$grade,$section);
//                    }else {
//                        $founds = $engine->search_Student(null,null,null);
//                    }
                    $founds = array_reverse($founds,null);
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
                        include 'pages/elements/Students_Table_Items.php';
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
        <div class="col-lg-3" style="position: fixed; right: 20px; top: 250px;" >
            <h4>Add New Students </h4>
            <form class="form-vertical" role="form" method="post" action="private/Page_Func.php" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px">
                    <input type="text" hidden="hidden" name="user_type" value="student">
                    <label> Full Name: </label>
                    <input class="form-control" name="full_name" type="text">
                </div>
                <div class="col-lg-12">
                    <label> Grade: </label>
                    <input class="form-control" name="grade" type="number" min="1" max="12">
                </div>
                <div class="col-lg-12">
                    <label>Section: </label>
                    <input class="form-control" name="section" type="text">
                </div>
                <div class="col-lg-12">
                    <label>Photo: </label>
                    <input type="file" name="upload_image" id="upload_image"><br>
                </div>
                <div class="col-lg-12">
                    <input class="form-control btn-primary" type="submit" name="reg_user" value="Register">
                </div>
            </form>
        </div></div>
        <div class="well">
            <form action="Librarian.php?page=add_new_student" method="get" id="pagination">
                <input type="hidden" name="page" value="add_new_student">
                <input type="hidden" name="grdae" value="<?php if(isset($_POST['grade'])) { echo $_POST['grade'];}else{ echo $grade;}?>">
                <input type="hidden" name="section" value="<?php if(isset($_POST['section'])) { echo $_POST['section'];}else{ echo $section;}?>">
                <input type="hidden" name="hint" value="<?php if(isset($_POST['hint'])) { echo $_POST['hint'];}else{ echo $hint;}?>">
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

</div>
<hr>