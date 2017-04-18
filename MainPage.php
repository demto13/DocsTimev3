<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/12/2017
 * Time: 8:43 AM
 */
session_start();

require_once "class/DB_Connect.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Doctor.php";
require_once "class/Patient.php";
require_once "class/Hash_Pwd.php";

if($_SESSION['userID'] != null)
{
    $dbh = new DB_Handler();
    $user = new Doctor($dbh);
    $type = $_SESSION['type'];

    echo "Welcome {$_SESSION['userID']} - {$_SESSION['userName']} - you are a : {$_SESSION['type']} Photo: {$_SESSION['photo']}:  you are logged in";
}
else
{
    header("Location: Index.php");
}

echo <<<__END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="MainPageStyle.css" type="text/css" rel="stylesheet">
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
            <p style="display:inline;" class="welcome"><span class="glyphicon glyphicon-user"></span> Welcome {$_SESSION['name']}</p>
            <div class="row">
                <div class="col-pics col-sm-3">
                    
__END;

                    if ($_SESSION['photo'] != null)
                    {
                        if ($type == "doctor")
                        {
                            echo "<img class='responsive' src='uploads/pics/doctor/{$_SESSION['photo']} ' alt='profile picture'>";
                        }
                        else
                        {
                            echo "<img class='responsive' src='uploads/pics/patient/{$_SESSION['photo']} ' alt='profile picture'>";
                        }
                    }
                    elseif($_SESSION['photo'] == null)
                    {
                        echo "<img class='responsive' src='uploads/pics/defaultimg.jpg' alt='profile picture'>";
                    }

echo <<<__END
                    <form action="UploadFile.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="userPic">
                        <button type="submit" name="submitPhoto">Submit photo!</button>
                    </form>
                </div>
__END;

                if($_SESSION['type'] == "patient") {
                    echo <<<__END
                <div class="col-md-7 colTab">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                        <li><a data-toggle="tab" href="#menu1">My Profile</a></li>
                        <li><a data-toggle="tab" href="#menu2">Search for doctor</a></li>
                        <li><a data-toggle="tab" href="#menu3">Book Appointment</a></li>
                        <li><a data-toggle="tab" href="#menu4">Manage appointments</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h3>HOME</h3>
                            <p>Welcome {$_SESSION['name']} at DocsTime the ultimate doctors appointment booking system. Hope you will find it useful!</p>
                            <p>There are doctors and patients registering every day so if you do not find what you are after, please check back later!</p>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>My Profile</h3>
                            <table class="table">
                                <tr><th>Name</th><td>{$_SESSION['name']}</td></tr>
                                <tr><th>Date of Birth</th><td>{$_SESSION['dob']}</td></tr>
                                <tr><th>Email</th><td>{$_SESSION['email']}</td></tr>
                                <tr><th>Phone</th><td>{$_SESSION['phone']}</td></tr>
                                <tr><th>Username</th><td>{$_SESSION['userName']}</td></tr>
                            </table>
                            <button value="update" class="btn">Update</button>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3></h3>
                            <form action="SearchDoc.php" method="post">
                                <div class="form-group">
                                    <h1>Search our doctors</h1>
                                    <label for="nameSearch">Name</label>
                                    <input class="form-control" type="text" name="nameSearch" id="nameSearch">
                                    <label for="aopSearch">Area of Practice</label>
                                    <select id="aopSearch" class="form-control" name="aopSearch">
                                        <option value=""></option>
                                        <option value="rad">Radiology</option>
                                        <option value="card">Cardiology</option>
                                        <option value="gen">General Practicioner</option>
                                        <option value="ent">Ear Nose and Throat(ENT)</option>
                                        <option value="surg">Surgery</option>
                                        <option value="old">Elderly services</option>
                                        <option value="kids">Children specialist</option>
                                    </select>
                                    <label for="baseSearch">Base Clinic</label>
                                    <select id="baseSearch" class="form-control" name="baseSearch">
                                        <option value=""></option>
                                        <option value="ari">Aberdeen Royal Infirmary</option>
                                        <option value="amh">Aberdeen Maternity Hospital</option>
                                        <option value="rch">Royal Cornhill Hospital</option>
                                        <option value="rach">Royal Aberdeen Children Hospital</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn" value="Search!">
                            </form>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <h3>About me</h3>
                                <h4>My interests and hobbies</h4>
                                <p>I like sports and music and many many other things which you can find
                                out if we can meet up for a drink or two!</p>
                                <h4>I am looking for</h4>
                                <p>A nice looking young person with a fun personality and
                                great attitude. That person must be sporty and play music too.</p>
                                <button value="update" class="btn">Update</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row topics-box">
                        <div class="topics">
                            <h3>Quick Links</h3>
                            <a href="http://www.bbc.co.uk/sport"><p>Sports</p></a>
                            <a href="https://www.bbc.co.uk/music/news"><p>Music</p></a>
                            <a href="http://www.imdb.com/"><p>Movies</p></a>
                            <a href="http://www.rgu.ac.uk/news-and-events"><p>Campus news and events</p></a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        
__END;
                }
                else
                {
                    echo<<<__END
                    <div class="col-md-7 colTab">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                        <li><a data-toggle="tab" href="#menu1">My Profile</a></li>
                        <li><a data-toggle="tab" href="#menu2">Search for doctor</a></li>
                        <li><a data-toggle="tab" href="#menu3">Manage Appointments</a></li>
                        <li><a data-toggle="tab" href="#menu4">View Diary</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h3>HOME</h3>
                            <p>Welcome {$_SESSION['name']} at DocsTime the ultimate doctors appointment booking system. Hope you will find it useful!</p>
                            <p>There are doctors and patients registering every day so if you do not find what you are after, please check back later!</p>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>My Profile</h3>
                            <table class="table">
                                <tr><th>Name</th><td>{$_SESSION['name']}</td></tr>
                                <tr><th>Area of Practice</th><td>{$_SESSION['aop']}</td></tr>
                                <tr><th>Base Clinic</th><td>{$_SESSION['base']}</td></tr>
                                <tr><th>Years of Practice</th><td>{$_SESSION['yop']}</td></tr>
                                <tr><th>Username</th><td>{$_SESSION['userName']}</td></tr>
                            </table>
                            <button value="update" class="btn">Update</button>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3></h3>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <h1>Search our singles</h1>
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="form-control">
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                    <label for="age">Age group</label>
                                    <select id="age" class="form-control" name="age">
                                        <option value="18-20">18-20</option>
                                        <option value="21-25">21-25</option>
                                        <option value="26-30">26-30</option>
                                        <option value="30+">30+</option>
                                    </select>
                                    <label for="ethnicity">Ethnicity</label>
                                    <select id="ethnicity" class="form-control" name="ethnicity">
                                        <option value="white">White</option>
                                        <option value="Black">Black</option>
                                        <option value="Black">Asian</option>
                                        <option value="Black">Indian</option>
                                        <option value="Black">Other</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn" value="Search!">
                            </form>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <h3>About me</h3>
                                <h4>My interests and hobbies</h4>
                                <p>I like sports and music and many many other things which you can find
                                out if we can meet up for a drink or two!</p>
                                <h4>I am looking for</h4>
                                <p>A nice looking young person with a fun personality and
                                great attitude. That person must be sporty and play music too.</p>
                                <button value="update" class="btn">Update</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row topics-box">
                        <div class="topics">
                            <h3>Quick Links</h3>
                            <a href="http://www.bbc.co.uk/sport"><p>Sports</p></a>
                            <a href="https://www.bbc.co.uk/music/news"><p>Music</p></a>
                            <a href="http://www.imdb.com/"><p>Movies</p></a>
                            <a href="http://www.rgu.ac.uk/news-and-events"><p>Campus news and events</p></a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </body>
    </html>
__END;

                }


    if(isset($_POST['logout']))
    {
        $user->logout();
        header("location: Index.php");
    }



?>