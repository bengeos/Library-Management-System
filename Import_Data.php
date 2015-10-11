<?php
function import_Books($file){
    set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
    include 'PHPExcel/IOFactory.php';
    require_once 'private/LMS_Engine.php';
    $engine = new LMS_Engine();
    try {
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        $Total_Sheet = $objPHPExcel->getSheetCount();
        for($num=0;$num<$Total_Sheet;$num++){
            $Sheet = $objPHPExcel->getSheet($num)->toArray(null,true,true,true);
            $Row = count($Sheet);
            for($pos=3; $pos<$Row;$pos++){
                $Title = trim($Sheet[$pos]['B']);
                $Author = trim($Sheet[$pos]['C']);
                $Publisher = trim($Sheet[$pos]['D']);
                $Pub_Year = trim($Sheet[$pos]['E']);
                $Pub_Add = trim($Sheet[$pos]['F']);
                $Call_ID = trim($Sheet[$pos]['G']);
                $Copy_Num = trim($Sheet[$pos]['H']);
                $Category = trim($Sheet[$pos]['I']);
                $Shelf_Store = trim($Sheet[$pos]['J']);
                $engine->add_new_book($Title,1,$Author,$Publisher,$Pub_Year,$Pub_Add,$Call_ID,$Copy_Num,$Shelf_Store);
            }
        }
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($file,PATHINFO_BASENAME).'": '.$e->getMessage());
    }
}
?>