<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/20/2017
 * Time: 6:17 PM
 */
session_start(); // start session

require_once "class/DB_Connect.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Doctor.php";
require_once "class/Patient.php";
require_once "class/Hash_Pwd.php";

$dbh = new DB_Handler();
$user = new Patient($dbh);


if ($_SESSION['patient2ViewPhoto'] != "null")
{
    $photoDisplay = "'uploads/pics/patient/{$_SESSION['patient2ViewPhoto']}'";
}
else
{
    $photoDisplay = "'uploads/pics/defaultimg.jpg'";
}

if(isset($_GET['upload']))
{
    if($_GET['upload'] == "succ")
    {
        echo"File uploaded successfully";
    }
    else
    {
        echo"Problem with uploading file. Please try again!";
    }
}

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="ProfilePageStyle.css" type="text/css" rel="stylesheet">
        <title>Patient Profile Page</title>
    </head>
    <body>
    <div class="container">
        <div class="row header">
            <h1>D</h1><h2>ocs</h2><h1>T</h1><h2>ime</h2>
            <a href="MainPage.php">Back to Main Page</a>
        </div>
        <div class="row row2">
            <div class="col-md-2 pic">
                <?PHP echo"<img class='responsive' src={$photoDisplay} alt='profile picture'>"; ?>
            </div>
            <div class="col-md-3 tableDoc">
                <h4>My Details</h4>
                <table class="table ">
                    <?PHP echo"<tr><th>Name</th><td>{$_SESSION['patient2ViewName']}</td></tr>";
                    echo"<tr><th>Address</th><td>{$_SESSION['patient2ViewAddress']}</td></tr>";
                    echo"<tr><th>Date of Birth</th><td>{$_SESSION['patient2ViewDob']}</td></tr>";
                    echo"<tr><th>Email</th><td>{$_SESSION['patient2ViewEmail']}</td></tr>";
                    echo"<tr><th>Phone</th><td>{$_SESSION['patient2ViewPhone']}</td></tr>"?>;
                </table>
            </div>
            <div class="col-md-4 about">
                <h4>View Medical History</h4>
                <?php

                $userFileName = "User" . $_SESSION['patient2ViewID'];
                $query3 = "select * from docstime.info where pid = ? and file like ?";
                $values3 = array("{$_SESSION['patient2ViewID']}", "%{$userFileName}%");
                $stmt3 = $dbh->runQuery($query3, $values3);
                $counter = 0;

                while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC))
                {
                    echo"<fieldset style='border: 1px solid black; background-color: lightgreen'>";
                    echo"<br />";
                    $counter++;
                    echo"<p>{$counter}. input : </p>";
                    echo"<p>{$row3['message']}</p>";
                    echo"<a href='{$row3['file']}'>Uploaded File{$counter}</a>";
                    echo"</fieldset>";
                }

                ?>

            </div>
            <div class="col-md-3 about">
                <h4>Upload Medical History</h4>
                <form action="PatientProfilePage.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea class="form-control" name="infoText" rows=6 cols=28 placeholder="Please leave the date, a note or message if required"></textarea><br />
                    <input type="file" name="infoFile"><br />
                    <button class="btn" type="submit" name="uploadInfo">Upload info</button>(.pdf, .doc, .docx)
                </div>
                </form>
            </div>
        </div>
    </div>

    </body>
    </html>

<?PHP
if(isset($_POST['uploadInfo']))
{

    if($user->uploadMedicalHistory($_FILES['infoFile'], $_POST['infoText'], $_SESSION['patient2ViewID']))
    {
        header("Location: PatientProfilePage.php?upload=succ");
    }
    else
    {
        header("Location: PatientProfilePage.php?upload=err");
    }
}
?>