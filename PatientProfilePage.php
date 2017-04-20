<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/20/2017
 * Time: 6:17 PM
 */

session_start();



if ($_SESSION['patient2ViewPhoto'] != "null")
{
    $photoDisplay = "'uploads/pics/patient/{$_SESSION['patient2ViewPhoto']}'";
}
else
{
    $photoDisplay = "'uploads/pics/defaultimg.jpg'";
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
            <div class="col-md-3 pic">
                <?PHP echo"<img class='responsive' src={$photoDisplay} alt='profile picture'>"; ?>
            </div>
            <div class="col-md-4 tableDoc">
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
                <h4>Medical History</h4>
                <?php echo"<p>Medical History in here</p>"; ?>

            </div>
        </div>
    </div>

    </body>
    </html>
