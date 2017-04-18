<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/18/2017
 * Time: 12:00 PM
 */
session_start();

if ($_SESSION['searchDocResultPhoto'] != "null")
{
    $photoDisplay = "'uploads/pics/doctor/{$_SESSION['searchDocResultPhoto']}'";
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
    <title>Profile Page</title>
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
                <form action="ProfilePagev2.php" method="post">
                    <button class="btn" name="book">Book an Appointment with me!</button>
                </form>
            </div>
            <div class="col-md-4 tableDoc">
                <h4>My Details</h4>
                <table class="table ">
                    <?PHP echo"<tr><th>Name</th><td>{$_SESSION['searchDocResultName']}</td></tr>";
                          echo"<tr><th>Area of Practice</th><td>{$_SESSION['searchDocResultAop']}</td></tr>";
                          echo"<tr><th>Base Clinic</th><td>{$_SESSION['searchDocResultBase']}</td></tr>";
                          echo"<tr><th>Years of Practice</th><td>{$_SESSION['searchDocResultYop']}</td></tr>";?>
                </table>
            </div>
            <div class="col-md-4 about">
                <h4>About me</h4>
                <?php echo"<p>{$_SESSION['searchDocResultAboutMe']}</p>"; ?>

            </div>
        </div>
    </div>

</body>
</html>

<?PHP
    if(isset($_POST['book']))
    {
        header("Location: MainPage.php?doc={$_SESSION['searchDocResultID']}");
    }
?>