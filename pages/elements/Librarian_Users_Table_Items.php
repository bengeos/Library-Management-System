<tr>
    <?php
        if(isset($Staff_Table)){
            echo '<td><strong>'.$Staff_Table['name'].'</strong></td>';
            echo '<td><strong>'.$User_Table['username'].'</strong></td>';
            echo '<td><strong>'.$User_Table['created'].'</strong></td>';
            $request = "Remove_Librarian";
        }else{
            echo '<td><strong>'.$User_Table['full_name'].'</strong></td>';
            echo '<td><strong>'.$User_Table['user_name'].'</strong></td>';
            echo '<td><strong>'.$User_Table['created_time'].'</strong></td>';
            $request = "Remove_Admin";
        }
    ?>
    <td>
        <form method="post" action="">
            <input type="text" hidden="hidden" name="User_ID" value="<?php echo $User_Table['id']?>">
            <input class="form-control" type="submit" name="<?php echo $request?>" value="Remove">
        </form>
    </td>
</tr>