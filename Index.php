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
        echo"<p>Incorrect login credentials</p>";
        }
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="loginBox">
                <div class="col col-left col-sm-6">
                    <img class=img-responsive" src="mainDocPic2.jpg" alt="main logo">
                </div>
                <div class="col col-right col-sm-6">
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
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
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
            <div class="docRegBox col-sm-6">
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
                        <input class="form-control" type="text" id="aopReg" name="aopReg" required="required">
                        <label for="baseReg">Base Clinic</label>
                        <input class="form-control" type="text" id="baseReg" name="baseReg" required="required">
                        <label for="dobReg">Date of Birth</label>
                        <input class="form-control" type="text" id="dobReg" name="dobReg" required="required">
                        <label for="nameReg">Name</label>
                        <input class="form-control" type="text" id="nameReg" name="nameReg" required="required">
                        <label for="yopReg">Years of Practice</label>
                        <input class="form-control" type="text" id="yopReg" name="yopReg" required="required">
                        <input class="form-control" type="hidden" id="photoReg" name="photoReg" value="null">
                        <input class="form-control" type="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="patRegBox col-sm-6">
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
                        <input class="form-control" type="text" id="dobReg" name="dobReg" required="required">
                        <label for="nameReg">Name</label>
                        <input class="form-control" type="text" id="nameReg" name="nameReg" required="required">
                        <input class="form-control" type="hidden" id="photoReg" name="photoReg" value="null">
                        <input class="form-control" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <pre>

        </pre>
            <?php

                if(isset($_POST['typeReg']))
                {
                    if($_POST['typeReg'] == "doctor")
                    {
                        echo <<<__END
                        
                            <form action="Register.php" method="post">
                                <label for="userNameReg">UserName</label>
                                <input type="text" id="userNameReg" name="userNameReg" required="required">
                                <label for="pwdReg">Password</label>
                                <input type="password" id="pwdReg" name="pwdReg" required="required">
                                <label for="aboutMeReg">About me</label>
                                <input type="text" id="aboutMeReg" name="aboutMeReg" required="required">
                                <label for="aopReg">Area of Practice</label>
                                <input type="text" id="aopReg" name="aopReg" required="required">
                                <label for="baseReg">Base Clinic</label>
                                <input type="text" id="baseReg" name="baseReg" required="required">
                                <label for="dobReg">Date of Birth</label>
                                <input type="text" id="dobReg" name="dobReg" required="required">
                                <label for="nameReg">Name</label>
                                <input type="text" id="nameReg" name="nameReg" required="required">
                                <label for="yopReg">Years of Practice</label>
                                <input type="text" id="yopReg" name="yopReg" required="required">
                                <input type="submit" value="Submit">
                            </form>


__END;


                    }
                    else
                    {
                        echo <<<__END
                        
                            


__END;
                    }
                }
            ?>


</body>
</html>