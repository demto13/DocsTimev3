<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 3:57 PM
 */
require_once "../class/DB_Connect.php";
require_once "../class/DB_Handler.php";
require_once "../class/User_class.php";
require_once "../class/Doctor.php";

$dbh = new DB_Handler();

$doctor = new Doctor($dbh, 'valaki', 'Password1', 'Ez valaki neve', '12/12/1980', 'Photo1', 'Head of department', 'ARI', 10, 'I am a doctor and I am ace');

//$params=['null', '12/12/1980', 'NameOfDoctor', 'Head of department',
        //'ARI', 10, 'I am a doctor and I am ace', 'Photo1', 'unDocdoc',
        //'Password1'];
//$doc2 = $doctor->insert($params);
//$params = ['null', $doctor->dob, $doctor->name, $doctor->areaOfPractice, $doctor->baseClinic, $doctor->yearsOfPractice,
   // $doctor->aboutMe, $doctor->photo, $doctor->userName, $doctor->password];

//$doctor->insert($params);
$doctor->createProfile();

$doctor->login('valaki', 'valami');

?>