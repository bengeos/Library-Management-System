<tr>
    <td><?php echo $found['title']?></td>
    <td><?php echo $found['author']?></td>
    <td><?php echo $found['publisher']?></td>
    <td><?php echo $found['publish_year']?></td>
    <td>
        <form  class="form-vertical" method="POST"  action="Librarian.php">
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
            <input type="text" hidden="hidden" name="book_id" value="<?php echo $found['id']?>">
            <button  class="form-control btn-small" type="submit" value="<?php echo $found['id']?>" name="make_book_issue">Issue </strong> </button>
        </form>
    </td>
</tr>