<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/11/2017
 * Time: 9:35 PM
 */

require_once "../class/DB_Connect.php";
require_once "../class/DB_Handler.php";
require_once "../class/User_class.php";
require_once "../class/Patient.php";

$dbh = new DB_Handler();


// public function __construct($dbh, $un, $pwd, $name, $dob, $photo, $phone, $address, $email)
$patient = new Patient();

//$params=['null', '12/12/1980', 'NameOfDoctor', 'Head of department',
//'ARI', 10, 'I am a doctor and I am ace', 'Photo1', 'unDocdoc',
//'Password1'];
//$doc2 = $doctor->insert($params);
//$params = ['null', $doctor->dob, $doctor->name, $doctor->areaOfPractice, $doctor->baseClinic, $doctor->yearsOfPractice,
// $doctor->aboutMe, $doctor->photo, $doctor->userName, $doctor->password];

//$doctor->insert($params);
$patient->createProfile($dbh, 'unpatpat3', 'Password2', 'NameOfPat', '12/12/1980', 'Photo2', '0123456789', '2 home street city', "pat2@email.com");

?>