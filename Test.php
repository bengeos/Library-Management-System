<?php
require_once 'private/LMS_Engine.php';
$engine = new LMS_Engine();
$val = $engine->search_book_not_issued(null, null, 0);
foreach($val as $book)
{
    if(is_array($book))
    {
        print_r($book);
    }else{
        echo $book;
    }
    echo "<hr>";
}
?>