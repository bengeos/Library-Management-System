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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once 'private/LMS_Engine.php';
                    $engine = new LMS_Engine();
                    if(isset($_POST['Search_Items'])) {
                        $founds = $engine->search_stu_and_tea($_POST['from'],$_POST['full_name']);
                    }else {
                        $founds = $engine->search_stu_and_tea("All","");
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
            <form class="form-vertical" role="form" method="post" action="">
                <label class="control-label">User Type: </label>
                <select class="form-control" name="from" >
                    <option value="All">All</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                </select>
                <label class="control-label">Search by: </label>
                <input type="text" class="form-control" name="full_name" placeholder="Search" value="<?php if(isset($_POST['full_name'])) echo $_POST['full_name'];?>"><br>
                <button class="btn btn-primary btn-lg"  name="Search_Items" id="Search_Items" type="submit"><strong> Search </strong> </button>
            </form>
        </div>
    </div>
    <div class="row">
        <hr>

    </div>
</div>