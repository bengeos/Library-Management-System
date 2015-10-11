<tr>
    <td><strong><?php echo $found['title']?></strong></td>
    <?php
    if(isset($found['author'])){
        echo '<td>'.$found['author'].'</td>';
    }else{
        echo '<td>'.$found['subject'].'</td>';
    }
    ?>
    <td><?php echo $found['publisher']?></td>

</tr>