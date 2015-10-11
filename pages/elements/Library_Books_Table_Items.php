<tr>
    <td><?php echo $found['title']?></td>
    <td><?php echo $found['author']?></td>
    <td><?php echo $found['publisher']?></td>
    <td><?php echo $found['shelf_or_store']?></td>
    <td>
        <form  class="form-vertical" method="POST"  action="Librarian.php?page=library_books">
            <input type="text" hidden="hidden" name="lib_book_id" value="<?php echo $found['id']?>">
            <input type="text" hidden="hidden" name="from" value="<?php if(isset($from)){echo $from;}?>">
            <input type="text" hidden="hidden" name="cat_id" value="<?php if(isset($cat_id)){echo $cat_id;}?>">
            <input type="text" hidden="hidden" name="hint" value="<?php if(isset($hint)){echo $hint;}?>">
            <input type="text" hidden="hidden" name="Search_Items" value="<?php if(isset($hint)){echo $hint;}?>">
            <button  class="form-control btn-small" type="submit" value="<?php echo $found['id']?>" name="move_book">Move</strong> </button>
        </form>
    </td>
    <td>
        <form  class="form-vertical" method="POST"  action="Librarian.php?page=edit_book">
            <input type="text" hidden="hidden" name="lib_book_id" value="<?php echo $found['id']?>">
            <button  class="form-control btn-small" type="submit" value="<?php echo $found['id']?>" name="edit_book_field">Edit</strong> </button>
        </form>
    </td>
</tr>