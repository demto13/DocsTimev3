<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/12/2017
 * Time: 7:14 AM
 */

require_once "class/DB_Connect.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Doctor.php";
require_once "class/Patient.php";
require_once "class/Hash_Pwd.php";

$dbh = new DB_Handler();

if(isset($_POST['type']) &&
   isset($_POST['userName']) &&
   isset($_POST['pwd']))
{
    if($_POST['type'] == "doctor")
    {
        $loginDoc = new Doctor($dbh);

        // echo"{$_POST['userName']}, {$_POST['pwd']}";

        if($loginDoc->login($_POST['userName'], $_POST['pwd']))
        {
            header("location: MainPage.php");
        }
    }
    else
    {
        $loginPat = new Patient($dbh);

        // echo"{$_POST['userName']}, {$_POST['pwd']}";

        if($loginPat->login($_POST['userName'], $_POST['pwd']))
        {
            header("location: MainPage.php");
        }
    }

}
?>