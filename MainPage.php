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

    echo"Welcome {$_SESSION['userID']} - {$_SESSION['userName']} - you are a : {$_SESSION['type']} Photo: {$_SESSION['photo']}:  you are logged in";

    if($_SESSION['photo'] != null)
    {
        if($type == "doctor")
        {
            echo"<img src='uploads/pics/doctor/{$_SESSION['photo']} ' alt='profile picture'>";
        }
        else
        {
            echo"<img src='uploads/pics/patient/{$_SESSION['photo']} ' alt='profile picture'>";
        }
    }
    else
    {
        echo"<img src='uploads/pics/defaultImage.jpeg' alt='profile picture'>";
    }

    echo <<<__END
    <a href="Index.php">index</a>;
__END;

    echo <<<__END
    <form action="MainPage.php" method="post">
    <input type="hidden" name="logout" value="logout">
    <input type="submit" value="Logout"><br/><br/><br/><br/>
    </form>
    
    <form action="UploadFile.php" method="post" enctype="multipart/form-data">
        <input type="file" name="userPic">
        <button type="submit" name="submitPhoto">Submit photo!</button>
    </form>
    
__END;



    if(isset($_POST['logout']))
    {
        $user->logout();
        header("location: Index.php");
    }
}

else
{
    header("Location: Index.php");
}
?>