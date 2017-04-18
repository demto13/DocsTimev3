<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="IndexDesign.css" type="text/css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
    <?php
    session_start();

    if(isset($_GET['err']))
    {
        if($_GET['err'] == "incorrectLogin")
        {
            echo "<p>Incorrect login credentials</p>";
        }
    }
    if ($_GET['reg'] == "ex")
        {
            echo"<p>UserName already exists!</p>";
        }
    ?>

    <div class="container">
        <div class="row row1">
            <div class="loginBox">
                <div class="col col-left col-md-6">
                    <h1>D</h1><h2>ocs</h2><h1>T</h1><h2>ime</h2>
                </div>
                <div class="col col-right col-md-6">
                    <form action="Authentication.php" method="post">
                        <div class="form-group">
                            <label for="type">Login as</label>
                            <select class="form-control" id="type" name="type">
                                <option value="doctor">Doctor</option>
                                <option value="patient">Patient</option>
                            </select>
                            <label for="userName">UserName</label>
                            <input class="form-control" type="text" id="userName" name="userName" required="required">
                            <label for="pwd">Password</label>
                            <input class="form-control" type="password" id="pwd" name="pwd" required="required">
                            <input class="btn" type="submit" value="Submit">
                        </div>
                    </form><br/>
                    <blockquote>For those who care about their health</blockquote>
                </div>
            </div>
        </div>
        <div class="row row2">
            <?php
            if(isset($_GET['err']))
            {
                if($_GET['err'] == "unsetType")
                {
                    echo"<p>Please select type of user</p>";
                }
                elseif($_GET['err'] == "noFill")
                {
                    echo"<p>Please fill in all the boxes</p>";
                }
            }
            elseif(isset($_GET['reg']))
            {
                $reg = $_GET['reg'];

                if($reg == "succ")
                {
                    echo"<p>Registered successfully</p>";
                }
            }
            ?>
            <div class="docRegBox col-lg-6 col-sm-12">
                <form action="Register.php" method="post">
                    <div class="form-group">
                        <h2>Registering as Doctor</h2>
                        <input class="form-control" type="hidden" name="typeReg" value="doctor">
                        <label for="userNameReg">UserName</label>
                        <input class="form-control" type="text" id="userNameReg" name="userNameReg" required="required">
                        <label for="pwdReg">Password</label>
                        <input class="form-control" type="password" id="pwdReg" name="pwdReg" required="required">
                        <label for="aboutMeReg">About me</label>
                        <input class="form-control" type="text" id="aboutMeReg" name="aboutMeReg" required="required">
                        <label for="aopReg">Area of Practice</label>
                        <select class="form-control" id="aopReg" name="aopReg">
                            <option value="rad">Radiology</option>
                            <option value="card">Cardiology</option>
                            <option value="gen">General Practicioner</option>
                            <option value="ent">Ear Nose and Throat (ENT)</option>
                            <option value="sur">Surgery</option>
                            <option value="old">Elderly Services</option>
                            <option value="kids">Children Specialist</option>
                        </select>
                        <label for="baseReg">Base Clinic</label>
                        <select class="form-control" id="baseReg" name="baseReg">
                            <option value="ari">Aberdeen Royal Infirmary</option>
                            <option value="amh">Aberdeen Maternity Hospital</option>
                            <option value="rch">Royal Cornhill Hospital</option>
                            <option value="rach">Royal Aberdeen Children Hospital</option>
                        </select>
                        <label for="dobReg">Date of Birth</label>
                        <input class="form-control" type="date" id="dobReg" name="dobReg" required="required">
                        <label for="nameReg">Name</label>
                        <input class="form-control" type="text" id="nameReg" name="nameReg" required="required">
                        <label for="yopReg">Years of Practice</label>
                        <input class="form-control" type="text" id="yopReg" name="yopReg" required="required">
                        <input class="form-control" type="hidden" id="photoReg" name="photoReg" value="null">
                        <input class="btn" type="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="patRegBox col-lg-6 col-sm-12">
                <form action="Register.php" method="post">
                    <div class="form-group">
                        <h2>Registering as Patient</h2>
                        <input class="form-control" type="hidden" name="typeReg" value="patient">
                        <label for="userNameReg">UserName</label>
                        <input class="form-control" type="text" id="userNameReg" name="userNameReg" required="required">
                        <label for="pwdReg">Password</label>
                        <input class="form-control" type="password" id="pwdReg" name="pwdReg" required="required">
                        <label for="emailReg">E-mail</label>
                        <input class="form-control" type="text" id="emailReg" name="emailReg" required="required">
                        <label for="addressReg">Address</label>
                        <input class="form-control" type="text" id="addressReg" name="addressReg" required="required">
                        <label for="phoneReg">Phone</label>
                        <input class="form-control" type="text" id="phoneReg" name="phoneReg" required="required">
                        <label for="dobReg">Date of Birth</label>
                        <input class="form-control" type="date" id="dobReg" name="dobReg" required="required">
                        <label for="nameReg">Name</label>
                        <input class="form-control" type="text" id="nameReg" name="nameReg" required="required">
                        <input class="form-control" type="hidden" id="photoReg" name="photoReg" value="null">
                        <input class="btn" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row footer-row">
            <div class="footer-col1 col-sm-4">
                <h3>About us</h3>
                <p><a class="footer-a" href="#">About the authors</a></p>
                <p><a class="footer-a" href="#">About the webpage</a></p>
                <p><a class="footer-a" href="#">Our vision</a></p>
                <p><a class="footer-a" href="#">Testimonials</a></p>
                <p><a class="footer-a" href="#">Contact us</a></p>
            </div>
            <div class="footer-col2 col-sm-4">
                <h3>Terms and conditions</h3>
                <p><a class="footer-a" href="#">Terms of use</a></p>
                <p><a class="footer-a" href="#">About cookies and cookie policy</a></p>
                <p><a class="footer-a" href="#">Data protection</a></p>
                <p><a class="footer-a" href="#">Privacy policy</a></p>
                <p><a class="footer-a" href="#">Copy rights</a></p>
            </div>
            <div class="footer-col3 col-sm-4">
                <h3>Something else</h3>
            </div>
        </div>
    </div>
</body>
</html>