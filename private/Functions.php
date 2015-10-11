<?php
function upload_image($file){
    $target_dir = '../images/';
    $file_name = get_rand(30).".png";
    $target_file = $target_dir . $file_name;
    $response = "";
    $size = $file['size'];
    if($size !==false){
        if(move_uploaded_file($file['tmp_name'],$target_file)){
            $response = $file_name;
        }
    }
    return $response;
}
function upload_file($file){
    $target_dir = '../files/';
    $file_name = get_rand(30).".xls";
    $target_file = $target_dir . $file_name;
    $response = "";
    $size = $file['size'];
    if($size !==false){
        if(move_uploaded_file($file['tmp_name'],$target_file)){
            $response = $file_name;
        }
    }
    return $response;
}
function get_rand($num){
    $const = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $data = "";
    for($i=0;$i<$num;$i++){
        $data = $data.$const[rand(0,35)];
    }
    return $data;
}
?>