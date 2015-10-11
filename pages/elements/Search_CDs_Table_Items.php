<tr>
    <td><?php echo $found['title']?></td>
    <td><?php echo $found['subject']?></td>
    <td><?php echo $found['publisher']?></td>
    <td>
        <form  class="form-vertical" method="POST"  action="">
            <?php
            require_once 'private/LMS_Engine.php';
            $engine = new LMS_Engine();
            $state = $engine->is_issuedBook($found['id']);
            if($state){
                $cond = '';
            }else{
                $cond = 'hidden="hidden"';
            }
            ?>
            <input type="text" hidden="hidden" name="CDs_ID" value="<?php echo $found['id']?>">
            <button  class="form-control btn-small" type="submit" value="<?php echo $found['id']?>" name="make_cd_issue">Issue </strong> </button>
        </form>
    </td>
</tr>