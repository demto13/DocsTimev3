<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/19/2017
 * Time: 1:23 AM
 */

session_start();

require_once "class/DB_Connect.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Doctor.php";
require_once "class/Patient.php";
require_once "class/Hash_Pwd.php";


    $dbh = new DB_Handler();
    $user = new Doctor($dbh);

if(isset($_POST['delete']))
{
    $deleteApp = $_POST['appNum'];

    $query = "delete from docstime.appointments where appid = ?";
    $values = array("$deleteApp");

    if($stmt = $dbh->runQuery($query, $values))
    {
        header("Location: MainPage.php?delete=succ");
    }
    else
    {
        header("Location: MainPage.php?delete=err");
    }

}

?>