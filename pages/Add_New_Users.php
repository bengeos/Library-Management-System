<div class="container" id="main">
    <div  class="row" id="contact">
        <div class="page-header">
        </div>
        <div class="col-md-3 col-lg-8"  >
            <div class="table-responsive ">
                <table class="table table-hover">
                    <thead>
                    <tr style="background: #808080">
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>Pocket ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
                    if(isset($_POST['Search_Items'])) {
                        $founds = $engine->search_stu_and_tea($_POST['from'],$_POST['full_name']);
                    }else {
                        $founds = $engine->search_stu_and_tea("Student","");
                    }
                    foreach($founds as $found){
                        include 'pages/elements/Users_Table_Lists.php';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-3 col-lg-3" style="margin-left: 50px" >
            <form class="form-vertical" role="form" method="post" action="private/Page_Func.php" enctype="multipart/form-data">
                <label>Register User</label>
                <hr>
                <label class="control-label">User Type: </label>
                <select class="form-control" name="user_type">
                    <option value="student">Student</option>
                </select>
                <label class="control-label">Full Name: </label>
                <input type="text" class="form-control" name="full_name" placeholder="Type Full Name Here">
                <label class="control-label">Grade: </label>
                <input type="text" class="form-control" name="grade" placeholder="Type Grade Here">
                <label class="control-label">Section: </label>
                <input type="text" class="form-control" name="section" placeholder="Type Section Here">
                <label class="control-label">Photo: </label>
                <input class="form-control" type="file" name="upload_image" id="upload_image"><br>
                <button class="btn btn-primary btn-lg"  name="reg_user" id="reg_user" type="submit"><strong> Register </strong> </button>
            </form>
        </div>
    </div>
    <div class="row">
        <hr>

    </div>
</div>