<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/11/2017
 * Time: 3:27 PM
 */
require_once "class/DB_Connect.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Doctor.php";
require_once "class/Patient.php";
require_once "class/Hash_Pwd.php";

$hashPwd = new Hash_Pwd();
$dbh = new DB_Handler();

if(isset($_POST['typeReg']))
{
    if($_POST['typeReg'] == "doctor")
    {
        if (isset($_POST['typeReg']) &&
            isset($_POST['userNameReg']) &&
            isset($_POST['pwdReg']) &&
            isset($_POST['aboutMeReg']) &&
            isset($_POST['aopReg']) &&
            isset($_POST['baseReg']) &&
            isset($_POST['dobReg']) &&
            isset($_POST['nameReg']) &&
            isset($_POST['yopReg'])) //&&
            //isset($_POST['photoReg']))
        {

            $token = $hashPwd->hashPwd($_POST['pwdReg']);
            // (Doctor) public function __construct($un, $pwd, $name, $dob, $photo, $aop, $baseClinic, $yop, $aboutMe)
            $newDoc = new Doctor($dbh);

            /*public function createProfile
            ($dbh, $un, $pwd, $name, $dob, $photo,
            $aop, $baseClinic, $yop, $aboutMe)*/
            $newDoc->createProfile(
                $_POST['userNameReg'],
                $token,
                $_POST['nameReg'],
                $_POST['dobReg'],
                $_POST['photoReg'],
                $_POST['aopReg'],
                $_POST['baseReg'],
                $_POST['yopReg'],
                $_POST['aboutMeReg']);

            $newDoc->getDbh()->disconnect();
            $newDoc = null;

            header("Location: Index.php?reg=succ");
        }
        else
        {
            header("location: Index.php?err=noFill");
        }
    }
    else
    {
        if (isset($_POST['typeReg']) &&
            isset($_POST['userNameReg']) &&
            isset($_POST['pwdReg']) &&
            isset($_POST['addressReg']) &&
            isset($_POST['dobReg']) &&
            isset($_POST['emailReg']) &&
            isset($_POST['nameReg']) &&
            isset($_POST['phoneReg']))// &&
            //isset($_POST['photo']))
        {
            $token = $hashPwd->hashPwd($_POST['pwdReg']);
            // (Patient) public function __construct($un, $pwd, $name, $dob, $photo, $phone, $address, $email, $medicalHistory)
            $newPatient = new Patient($dbh);

            $newPatient->createProfile(
                $_POST['userNameReg'],
                $token,
                $_POST['nameReg'],
                $_POST['dobReg'],
                $_POST['photoReg'],
                $_POST['phoneReg'],
                $_POST['addressReg'],
                $_POST['emailReg']);

            $newPatient->getDbh()->disconnect();
            $newPatient = null;

            header("Location: Index.php?reg=succ");
        }
        else
        {
            header("location: Index.php?err=noFill");
        }
    }
}
else
{
    header("Location: Index.php?err=unsetType");
}

?>