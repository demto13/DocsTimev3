<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/18/2017
 * Time: 4:36 PM
 */
session_start();

require_once "class/DB_Connect.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Doctor.php";
require_once "class/Patient.php";
require_once "class/Hash_Pwd.php";


$dbh = new DB_Handler();
$userDoc = new Doctor($dbh);
$userPat = new Patient($dbh);

$date = $_POST['date'];
$time = $_POST['time'];




?>