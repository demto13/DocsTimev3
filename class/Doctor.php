<?php

/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 3:37 PM
 */

require_once "Hash_Pwd.php";
require_once "DB_Connect.php";
require_once "DB_Handler.php";

class Doctor extends User_class
{
    public $userName;// = "User106";
    public $areaOfPractice;// = "Hospital";
    public $baseClinic;// = "Edinburgh Hospital";
    public $yearsOfPractice;// = 6;
    public $aboutMe;// = "I am a doctor in Edinburgh and had no constructor";

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function insert($values)
    {
        $stmt = $this->dbh->runQuery("Insert into docstime.doctor values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $values);
        return $stmt;
    }

    public function createProfile($un, $pwd, $name, $dob, $photo, $aop, $baseClinic, $yop, $aboutMe)
    {
        $this->userName = $un;
        $this->password = $pwd;
        $this->name = $name;
        $this->dob = $dob;
        $this->photo = $photo;
        $this->areaOfPractice = $aop;
        $this->baseClinic = $baseClinic;
        $this->yearsOfPractice = $yop;
        $this->aboutMe = $aboutMe;

        $checkParam = array($this->userName);
        $check = $this->dbh->runQuery("select * from docstime.doctor where userName = ?", $checkParam);


        /*if($check != null)
        {
            echo"Already exists";
          //header("Location index.php?err=userNameExists");
        }
        else
        {*/
           $values = ['null', $this->dob, $this->name, $this->areaOfPractice, $this->baseClinic, $this->yearsOfPractice,
               $this->aboutMe, $this->photo, $this->userName, $this->password];

            $this->insert($values);
        //}
    }

    public function login($temp_userName, $temp_pwd)
    {
        $hashPwd = new Hash_Pwd();
        $hashedPwd = $hashPwd->hashPwd($temp_pwd);

        $temp_un = array("$temp_userName");
        $stmt = $this->dbh->runQuery("SELECT * FROM docstime.doctor WHERE userName = ?", $temp_un);

        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if($userRow['password'] == $hashedPwd)
            {
                session_start();

                $_SESSION['userID'] = $userRow['did'];
                $_SESSION['userName'] = $userRow['userName'];
                $_SESSION['dob'] = $userRow['dob'];
                $_SESSION['name'] = $userRow['name'];
                $_SESSION['aop'] = $userRow['aop'];
                $_SESSION['base'] = $userRow['base'];
                $_SESSION['yop'] = $userRow['yop'];
                $_SESSION['about'] = $userRow['about'];
                $_SESSION['photo'] = $userRow['photo'];
                $_SESSION['type'] = "doctor";

                return true;
            }
            else
            {
                header("Location: Index.php?err=incorrectLogin");
                return false;
            }

    }

    public function uploadFiles($file, $userID)
    {
        $fileName = $file['name'];
        $fileType = $file['type'];
        $filetmp_name = $file['tmp_name'];
        $fileErr = $file['error'];
        $fileSize = $file['size'];

        echo"{$fileName}, $fileType, $filetmp_name, $fileErr, $fileSize";

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt)); // array method showing last element

        $allowed = array('jpg', 'jpeg', 'png'); // allowed extensions

        if(in_array($fileActualExt, $allowed))
        {
            if($fileErr === 0)
            {
                if($fileSize < 20000000)
                {
                    $fileNameNew = "User". $_SESSION['userID'] . "." . $fileActualExt;
                    //$_SESSION['photo'] = $fileNameNew;
                    $this->dbh->runQuery("UPDATE docstime.doctor SET photo = '$fileNameNew' WHERE did = ?", array("$userID"));
                    $fileDestination = 'uploads/pics/doctor/'. $fileNameNew;
                    move_uploaded_file($filetmp_name, $fileDestination);
                    header("Location: MainPage.php?upload=succ");
                }
                else
                {
                    header("Loacation: MainPage.php?err=fileTooBig");
                }
            }
            else
            {
                header("Loacation: MainPage.php?err=error");

            }
        }
        else
        {
            header("Loacation: MainPage.php?err=extIncorrect");

        }
    }

    public function searchDoc()
    {

    }
}