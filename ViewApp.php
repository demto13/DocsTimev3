<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/20/2017
 * Time: 6:01 PM
 */

session_start();

if(isset($_POST['bkbtn']))
{
    header("Location: MainPage.php");
}

$patient2ViewName = $_POST['patientName'];
$patient2ViewAddress = $_POST['patientAddress'];
$patient2ViewDob = $_POST['patientDob'];
$patient2ViewEmail = $_POST['patientEmail'];
$patient2ViewPhone = $_POST['patientPhone'];
$patient2ViewPhoto = $_POST['patientPhoto'];
$patient2ViewID = $_POST['patientID'];

$_SESSION['patient2ViewName'] = $patient2ViewName;
$_SESSION['patient2ViewAddress'] = $patient2ViewAddress;
$_SESSION['patient2ViewDob'] = $patient2ViewDob;
$_SESSION['patient2ViewEmail'] = $patient2ViewEmail;
$_SESSION['patient2ViewPhone'] = $patient2ViewPhone;
$_SESSION['patient2ViewPhoto'] = $patient2ViewPhoto;
$_SESSION['patient2ViewID'] = $patient2ViewID;

header("Location: PatientProfilePage.php");