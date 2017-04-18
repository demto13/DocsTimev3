<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/18/2017
 * Time: 12:00 PM
 */
session_start();

if ($_SESSION['searchDocResultPhoto'] != null)
{
    $photoDisplay  ="<img class='responsive' src='uploads/pics/doctor/{$_SESSION['searchDocResultPhoto']} ' alt='profile picture'>";

}
elseif($_SESSION['photo'] == null)
{
    $photoDisplay = "<img class='responsive' src='uploads/pics/defaultimg.jpg' alt='profile picture'>";
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
    <link href="ProfilePageDesign.css" type="text/css" rel="stylesheet">
    <title>Profile Page</title>
</head>
<body>
    <div class="container-fluid header">
        <p class="navbar-brand">
        <h1>D</h1><h2>ocs</h2><h1>T</h1><h2>ime</h2>
        </p>
        <form action="SearchDoc.php" method="post">
            <button class="btn" type="submit" name="logout"><span class="glyphicon glyphicon-log-out"></span> Back</button></li>
        </form>
    </div>
</body>
</html>