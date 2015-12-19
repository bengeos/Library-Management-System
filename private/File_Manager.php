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
                if(trim($Sheet[1]['E']) == 'Saint Joseph School Library Books List'  && trim($Sheet[2]['A']) == 'No' && trim($Sheet[2]['B']) == 'Title' && trim($Sheet[2]['C']) == 'Author' && trim($Sheet[2]['D']) == 'Publisher' && trim($Sheet[2]['E']) == 'Publish Year' && trim($Sheet[2]['F']) == 'Publish Address' && trim($Sheet[2]['G']) == 'Call ID' && trim($Sheet[2]['H']) == 'Copy Number' && trim($Sheet[2]['I']) == 'Category' && trim($Sheet[2]['J']) == 'Shelf | Store') {
                    for ($pos = 3; $pos <= $Row; $pos++) {
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
                        if ($cat_id == 0) {
                            $engine->add_new_book_category($Category);
                        }
                        $engine->add_new_book($Title, $engine->get_book_cat_id($Category), $Author, $Publisher, $Pub_Year, $Pub_Add, $Call_ID, $Copy_Num, $Shelf_Store);
                    }
                }else{
                    die('<br><h2>Error loading file!</h2> <br><h3> The Books List Format is incorrect</h3>');
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
                if(trim($Sheet[1]['E']) == 'Saint Joseph School Library CDs List'  && trim($Sheet[2]['A']) == 'No' && trim($Sheet[2]['B']) == 'Title' && trim($Sheet[2]['C']) == 'Subject' && trim($Sheet[2]['D']) == 'Publisher' && trim($Sheet[2]['E']) == 'Category' && trim($Sheet[2]['F']) == 'Number of CDs' && trim($Sheet[2]['G']) == 'Call ID' && trim($Sheet[2]['H']) == 'Copy Number' && trim($Sheet[2]['I']) == 'Shelf | Store'){
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
                }else{
                    die('<br><h2>Error loading file!</h2> <br><h3> The CDs List Format is incorrect</h3>');
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
                if(trim($Sheet[1]['E']) == 'Saint Joseph School Library Magazines List'  && trim($Sheet[2]['A']) == 'No' && trim($Sheet[2]['B']) == 'Title' && trim($Sheet[2]['C']) == 'Subject' && trim($Sheet[2]['D']) == 'Publisher' && trim($Sheet[2]['E']) == 'Number of Pages' && trim($Sheet[2]['F']) == 'Publish Date' && trim($Sheet[2]['G']) == 'Call ID' && trim($Sheet[2]['H']) == 'Copy Number' && trim($Sheet[2]['I']) == 'Shelf | Store' && trim($Sheet[2]['J']) == 'Category'){
                    for ($pos = 3; $pos <= $Row; $pos++) {
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
                        if ($cat_id == 0) {
                            $engine->add_new_mag_category($Category);
                        }
                        $engine->add_new_magazine($Title, $Author, $Publisher, $Num_Pages, $Pub_Date, $Call_ID, $Copy_Num, $Shelf_Store, $cat_id);
                    }
                }else{
                    die('<br><h2>Error loading file!</h2> <br><h3> The Magazines List Format is incorrect</h3>');
                }
            }
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($file,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
}
?>