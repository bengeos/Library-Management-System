<?php
include 'Classes/PHPExcel/IOFactory.php';
require_once 'LMS_Engine.php';
class File_Manager{
    public function __construct(){
        global $engine;
        $engine = new LMS_Engine();
    }
    public function Upload_Books($file){
        global $engine;
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            $Total_Sheet = $objPHPExcel->getSheetCount();
            for($num=0;$num<$Total_Sheet;$num++){
                $Sheet = $objPHPExcel->getSheet($num)->toArray(null,true,true,true);
                $Row = count($Sheet);
                for($pos=3; $pos<=$Row;$pos++){
                    $Title = trim($Sheet[$pos]['B']);
                    $Author = trim($Sheet[$pos]['C']);
                    $Publisher = trim($Sheet[$pos]['D']);
                    $Pub_Year = trim($Sheet[$pos]['E']);
                    $Pub_Add = trim($Sheet[$pos]['F']);
                    $Call_ID = trim($Sheet[$pos]['G']);
                    $Copy_Num = trim($Sheet[$pos]['H']);
                    $Category = trim($Sheet[$pos]['I']);
                    $Shelf_Store = trim($Sheet[$pos]['J']);
                    $cat_id = $engine->get_book_cat_id($Category);
                    if($cat_id == 0){
                        $engine->add_new_book_category($Category);
                    }
                    $engine->add_new_book($Title,$engine->get_book_cat_id($Category),$Author,$Publisher,$Pub_Year,$Pub_Add,$Call_ID,$Copy_Num,$Shelf_Store);
                }
            }
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($file,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
    public function Upload_CDs($file){
        global $engine;
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            $Total_Sheet = $objPHPExcel->getSheetCount();
            for($num=0;$num<$Total_Sheet;$num++){
                $Sheet = $objPHPExcel->getSheet($num)->toArray(null,true,true,true);
                $Row = count($Sheet);
                for($pos=3; $pos<=$Row;$pos++){
                    $Title = trim($Sheet[$pos]['B']);
                    $Subject = trim($Sheet[$pos]['C']);
                    $publisher = trim($Sheet[$pos]['D']);
                    $Category = trim($Sheet[$pos]['E']);
                    $Num_CDs = trim($Sheet[$pos]['F']);
                    $Call_ID = trim($Sheet[$pos]['G']);
                    $Copy_Num = trim($Sheet[$pos]['H']);
                    $Shelf_Store = trim($Sheet[$pos]['I']);
                    $cat_id = $engine->get_cds_cat_id($Category);
                    if($cat_id == 0){
                        $engine->add_new_cd_category($Category);
                    }
                    
                    $engine->add_new_cds($Title,$Subject,$Num_CDs,$Copy_Num,$publisher,$engine->get_cds_cat_id($Category),$Call_ID,$Shelf_Store);
                }
            }
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($file,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
    public function Upload_Magazines($file){
        global $engine;
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            $Total_Sheet = $objPHPExcel->getSheetCount();
            for($num=0;$num<$Total_Sheet;$num++){
                $Sheet = $objPHPExcel->getSheet($num)->toArray(null,true,true,true);
                $Row = count($Sheet);
                for($pos=3; $pos<=$Row;$pos++){
                    $Title = trim($Sheet[$pos]['B']);
                    $Author = trim($Sheet[$pos]['C']);
                    $Publisher = trim($Sheet[$pos]['D']);
                    $Num_Pages = trim($Sheet[$pos]['E']);
                    $Pub_Date = trim($Sheet[$pos]['F']);
                    $Call_ID = trim($Sheet[$pos]['G']);
                    $Copy_Num = trim($Sheet[$pos]['H']);
                    $Shelf_Store = trim($Sheet[$pos]['I']);
                    $Category = trim($Sheet[$pos]['J']);

                    $cat_id = $engine->get_mag_cat_id($Category);
                    if($cat_id == 0){
                        $engine->add_new_cd_category($Category);
                    }
                    $engine->add_new_magazine($Title,$Author,$Publisher,$Num_Pages,$Pub_Date,$Call_ID,$Copy_Num,$Shelf_Store,$cat_id);
                }
            }
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($file,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
}
?>