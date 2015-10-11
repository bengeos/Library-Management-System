<tr>
    <td>
        <img class="img-rounded" src="images/<?php echo $found['photo']?>" width="70px" height="90px">
        </td>
    <td><?php echo $found['name']?></td>
    <td><?php echo $found['pocket_id']?></td>
    <td>
        <form  class="form-vertical" method="POST"  action="Librarian.php?page=student_detail">
            <button class="form-control btn-small" type="submit" value="<?php echo $found['id'];?>" name="user_id"><strong> Detail </strong> </button>
        </form>
    </td>
</tr>