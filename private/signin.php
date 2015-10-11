<?php
/**
 * Created by PhpStorm.
 * User: Robel
 * Date: 3/24/2015
 * Time: 6:47 AM
 */
require_once "LMS_Engine.php";
$eng = new LMS_Engine();
$username = "";
$password = "";
if(isset($_POST['username']))
{
    $username = $_POST['username'];
}
if(isset($_POST['password']))
{
    $password = $_POST['password'];
}
if($eng->is_admin($username, $password))
{
    header("Location: ../public/admin/");
    exit;
}
else
{

}
?>