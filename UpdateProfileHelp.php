<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/20/2017
 * Time: 9:27 PM
 */

require_once "class/DB_Handler.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Patient.php";
require_once "class/Doctor.php";
require_once "class/Hash_Pwd.php";

session_start();

$dbh = new DB_Handler();
$doctor = new Doctor($dbh);
$hashing = new Hash_Pwd();

/*<label for="userNameUp">UserName</label>



                        <input class="form-control" type="text" id="nameUp" name="nameUp" required="required">
                        <input class="form-control" type="text" id="yopUp" name="yopUp" required="required">*/

//UPDATE t1 SET col1 = col1 + 1, col2 = col1;

if(($_SESSION['type']) == "doctor")
{
    $query = "update docstime.doctor set did = ?";
    $values = array("{$_SESSION['userID']}");


    if(isset($_POST['pwdUp']))
    {
        if($_POST['pwdUp'] != "")
        {
            $newPwd = $_POST['pwdUp'];

            $query .= ",pwd = ? ";
            $values[] = $hashing->hashPwd($newPwd);
        }

    }

    if(isset($_POST['aboutMeUp']))
    {
        if($_POST['aboutMeUp'] != "")
        {
            $newAboutMe = $_POST['aboutMeUp'];

            $query .= ",about = ? ";
            $values[] = $newAboutMe;
        }

    }

    if(isset($_POST['aopUp']))
    {
        if($_POST['aopUp'] != "")
        {
            $newaop = $_POST['aopUp'];
            $query .= ",aop = ? ";
            $values[] = $newaop;
        }

    }

    if(isset($_POST['baseUp']))
    {
        if($_POST['baseUp'] != "")
        {
            $newBase = $_POST['baseUp'];
            $query .= ",base = ? ";
            $values[] = $newBase;
        }

    }

    if(isset($_POST['dobUp']))
    {
        if($_POST['dobUp'] != "")
        {
            $newDob = $_POST['dobUp'];
            $query .= ",dob = ? ";
            $values[] = $newDob;
        }

    }

    if(isset($_POST['nameUp']))
    {
        if($_POST['nameUp'] != "")
        {
            $newName = $_POST['nameUp'];
            $query .= ",name = ? ";
            $values[] = $newName;
        }

    }

    if(isset($_POST['yopUp']))
    {
        if($_POST['yopUp'] != "")
        {
            $newYop = $_POST['yopUp'];
            $query .= ",yop = ? ";
            $values[] = $newYop;
        }

    }

    $query .= " where did = ?;";
    $values[] = $_SESSION['userID'];

    if($stmt = $dbh->runQuery($query, $values))
    {
        header("Location: MainPage.php?update=succ");
    }
    else
    {
        header("Location: MainPage.php?update=err");
    }

    /*echo"{$query}" . "and the values are : ";

    foreach ($values as $item)
    {
        echo"{$item}" . "    ";
    }*/
}

else

    /*                  <label for="userNameUp">UserName</label>
                        <label for="pwdUp">Password</label>
                        <label for="emailUp">E-mail</label>
                        <label for="addressUp">Address</label>
                        <label for="phoneUp">Phone</label>
                        <label for="dobUp">Date of Birth</label>
                        <label for="nameUp">Name</label>
                        */

{
    $query = "update docstime.patient set name = ?";
    $values = array("{$_SESSION['name']}");


    if(isset($_POST['userNameUp']))
    {
        if($_POST['userNameUp'] != "")
        {
            $newun = $_POST['userNameUp'];

            $query .= ",userName = ? ";
            $values[] = $newun;
        }

    }

    if(isset($_POST['pwdUp']))
    {
        if($_POST['pwdUp'] != "")
        {
            $newpwd = $_POST['pwdUp'];

            $query .= ",password = ? ";
            $values[] = $hashing->hashPwd($newpwd);;
        }

    }

    if(isset($_POST['emailUp']))
    {
        if($_POST['emailUp'] != "")
        {
            $newemail = $_POST['emailUp'];
            $query .= ",email = ? ";
            $values[] = $newemail;
        }

    }

    if(isset($_POST['addressUp']))
    {
        if($_POST['addressUp'] != "")
        {
            $newaddress = $_POST['addressUp'];
            $query .= ",address = ? ";
            $values[] = $newaddress;
        }

    }

    if(isset($_POST['phoneUp']))
    {
        if($_POST['phoneUp'] != "")
        {
            $newPhone = $_POST['phoneUp'];
            $query .= ",phone = ? ";
            $values[] = $newPhone;
        }

    }

    if(isset($_POST['dobUp']))
    {
        if($_POST['dobUp'] != "")
        {
            $newDob = $_POST['dobUp'];
            $query .= ",dob = ? ";
            $values[] = $newDob;
        }

    }

    if(isset($_POST['nameUp']))
    {
        if($_POST['nameUp'] != "")
        {
            $newName = $_POST['nameUp'];
            $query .= ",name = ? ";
            $values[] = $newName;
        }

    }

    $query .= " where did = ?;";
    $values[] = $_SESSION['userID'];

    /*if($stmt = $dbh->runQuery($query, $values))
    {
        header("Location: MainPage.php?update=succ");
    }
    else
    {
        header("Location: MainPage.php?update=err");
    }*/

    echo"{$query}" . "and the values are : ";

    foreach ($values as $item)
    {
        echo"{$item}" . "    ";
    }
}


?>