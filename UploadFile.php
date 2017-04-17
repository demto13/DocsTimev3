<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/16/2017
 * Time: 2:41 PM
 */
require_once "class/DB_Connect.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Doctor.php";
require_once "class/Patient.php";

session_start();

$dbh = new DB_Handler();

if(isset($_POST['submitPhoto']))
{
    $file = $_FILES['userPic'];

    if(isset($_SESSION['userID']))
    {
        if($_SESSION['type'] == "doctor")
        {
            $docUpload = new Doctor($dbh);

            $docUpload->uploadFiles($file, $_SESSION['userID']);
        }
        else
        {
            $patUpload = new Patient($dbh);

            $patUpload->uploadFiles($file, $_SESSION['userID']);
        }
    }


}