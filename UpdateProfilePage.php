<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/20/2017
 * Time: 8:55 PM
 */
require_once "class/DB_Connect.php";
require_once "class/DB_Handler.php";

session_start();

$dbh = new DB_Handler();

echo <<<__END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="UpdatePageStyle.css" type="text/css" rel="stylesheet">
        <title>Update Profile Page</title>
    </head>
    <body>
        <a style="float: right; color:deeppink; font-size: 1.5em" href="MainPage.php"> <<< Back to Main Page</a>
__END;

    if($_SESSION['type'] == "patient")
        {
            echo <<<__END
        <form action="UpdateProfileHelp.php" method="post">
                    <div class="form-group">
                        <h2>Updating details as Patient</h2>
                        <label for="userNameUp">UserName</label>
                        <input class="form-control" type="text" id="userNameUp" name="userNameUp">
                        <label for="pwdUp">Password</label>
                        <input class="form-control" type="password" id="pwdUp" name="pwdUp">
                        <label for="emailUp">E-mail</label>
                        <input class="form-control" type="text" id="emailUp" name="emailUp">
                        <label for="addressUp">Address</label>
                        <input class="form-control" type="text" id="addressUp" name="addressUp">
                        <label for="phoneUp">Phone</label>
                        <input class="form-control" type="text" id="phoneUp" name="phoneUp">
                        <label for="dobUp">Date of Birth</label>
                        <input class="form-control" type="date" id="dobUp" name="dobUp">
                        <label for="nameUp">Name</label>
                        <input class="form-control" type="text" id="nameUp" name="nameUp">
                        <input class="btn" type="submit" value="Submit">
                    </div>
        </form>
__END;
        }
    else
        {
            echo <<<__END
            <form action="UpdateProfileHelp.php" method="post">
                    <div class="form-group">
                        <h2>Updating details as Doctor</h2>
                        <label for="userNameUp">UserName</label>
                        <input class="form-control" type="text" id="userNameUp" name="userNameUp">
                        <label for="pwdUp">Password</label>
                        <input class="form-control" type="password" id="pwdUp" name="pwdUp">
                        <label for="aboutMeUp">About me</label>
                        <input class="form-control" type="text" id="aboutMeUp" name="aboutMeUp">
                        <label for="aopUp">Area of Practice</label>
                        <select class="form-control" id="aopUp" name="aopUp">
                            <option value=""></option>
                            <option value="rad">Radiology</option>
                            <option value="card">Cardiology</option>
                            <option value="gen">General Practicioner</option>
                            <option value="ent">Ear Nose and Throat (ENT)</option>
                            <option value="sur">Surgery</option>
                            <option value="old">Elderly Services</option>
                            <option value="kids">Children Specialist</option>
                        </select>
                        <label for="baseUp">Base Clinic</label>
                        <select class="form-control" id="baseUp" name="baseUp">
                            <option value=""></option>
                            <option value="ari">Aberdeen Royal Infirmary</option>
                            <option value="amh">Aberdeen Maternity Hospital</option>
                            <option value="rch">Royal Cornhill Hospital</option>
                            <option value="rach">Royal Aberdeen Children Hospital</option>
                        </select>
                        <label for="dobUp">Date of Birth</label>
                        <input class="form-control" type="date" id="dobUp" name="dobUp">
                        <label for="nameUp">Name</label>
                        <input class="form-control" type="text" id="nameUp" name="nameUp">
                        <label for="yopUp">Years of Practice</label>
                        <input class="form-control" type="text" id="yopUp" name="yopUp">
                        <input class="btn" type="submit" value="Submit">
                    </div>
                </form>
__END;
        }// else ends here

echo <<<__END
        
    </body>
    </html>
__END;




?>