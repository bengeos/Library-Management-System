<tr>
    <td><strong><?php echo $Staff_Table['name'];?></strong></td>
    <td><?php echo $Staff_Table['department'];?></td>
    <td><?php echo $User_Table['username']?></td>
    <td><?php echo $User_Table['created']?></td>
    <td>
        <form method="post" action="">
            <input type="text" hidden="hidden" name="User_ID" value="<?php echo $User_Table['id']?>">
            <input class="form-control" type="submit" name="Remove_Teacher" value="Remove">
        </form>
    </td>
