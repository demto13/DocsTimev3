<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/17/2017
 * Time: 2:30 PM
 */
echo <<<__END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="" type="text/css" rel="stylesheet">
        <title>Home Page</title>
    </head>
    <body>
        <div class="container-fluid header">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand" style="display: inline;">
                        <h1>D</h1><h2>ocs</h2><h1>T</h1><h2>ime</h2>
                    </p>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <form action="MainPage.php" method="post">
                            <li><button class="btn" type="submit" name="logout"><span class="glyphicon glyphicon-log-out"></span> Sign out</button></li>
                        </form>
                    </ul>
                </div>
            </nav><br /><br />
        </div>
        <div class="container main">
            <p class="welcome"><span class="glyphicon glyphicon-user"></span> Welcome {$_SESSION['userName']}</p>
            <div class="row">
                <div class="col-pics col-sm-3">
                    
__END;

if ($_SESSION['photo'] != null)
{
        echo "<img class='responsive' src='uploads/pics/doctor/{$_SESSION['searchDocResultPhoto']} ' alt='profile picture'>"; // need to code this into search page to set this session var at click

}
elseif($_SESSION['photo'] == null)
{
    echo "<img class='responsive' src='uploads/pics/defaultimg.jpg' alt='profile picture'>";
}

echo<<<__END
                </div>
                <div class="col-md-4 colInfo"> // need to code to have a session variables for searched doc name etc for below
                    <div class="docInfo">
                            <h3>My Profile</h3>
                            <table class="table">
                                <tr><th>Name</th><td>John</td></tr>
                                <tr><th>Date of Birth</th><td>01/01/1999</td></tr>
                                <tr><th>Area of Practice</th><td>Smith</td></tr>                                
                                <tr><th>Base Clinic</th><td>student@campus.com</td></tr>
                                <tr><th>Years of Practice</th><td>190</td></tr>                                    
                            </table>
                    </div>
                </div>
                <div class="col-md-5 colAbout">
                    <h3>About me</h3>
                    <h4>My interests and hobbies</h4>
                    <p>I like sports and music and many many other things which you can find
                       out if we can meet up for a drink or two!</p>
                    <h4>I am looking for</h4>
                    <p>A nice looking young person with a fun personality and
                       great attitude. That person must be sporty and play music too.</p>
                </div>
            </div>
        </div>

__END;


?>