<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/18/2017
 * Time: 12:21 PM
 */

session_start();

$docResultID = $_POST['docID'];
$docResultName = $_POST['docName'];
$docResultAop = $_POST['docAop'];
$docResultBase = $_POST['docBase'];
$docResultYop = $_POST['docYop'];
$docResultAboutMe = $_POST['docAboutMe'];
$docResultPhoto = $_POST['docPhoto'];

$_SESSION['searchDocResultID'] = $docResultID;
$_SESSION['searchDocResultPhoto'] = $docResultPhoto;
$_SESSION['searchDocResultName'] = $docResultName;
$_SESSION['searchDocResultAop'] = $docResultAop;
$_SESSION['searchDocResultBase'] = $docResultBase;
$_SESSION['searchDocResultYop'] = $docResultYop;
$_SESSION['searchDocResultAboutMe'] = $docResultAboutMe;

header("Location: ProfilePagev2.php");