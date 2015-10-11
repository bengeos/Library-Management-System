<tr>
    <td><?php echo $found['title']?></td>
    <td><?php echo $found['subject']?></td>
    <td><?php echo $found['publisher']?></td>
    <td><?php echo $found['publish_date']?></td>
    <td>
        <form  class="form-vertical" method="POST"  action="Librarian.php">
            <input type="text" hidden="hidden" name="Mag_ID" value="<?php echo $found['id']?>">
            <button  class="form-control btn-small" type="submit" value="<?php echo $found['id']?>" name="make_magazine_issue">Issue </strong> </button>
        </form>
    </td>
</tr>