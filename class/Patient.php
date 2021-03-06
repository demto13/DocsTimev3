<?php

/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 7:09 PM
 */
class Patient extends User_class
{
    private $phone;
    private $address;
    private $email;
    private $medicalHistory;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function insert($values)
    {
        $stmt = $this->dbh->runQuery("Insert into docstime.patient values (?, ?, ?, ?, ?, ?, ?, ?, ?)", $values);
        return $stmt;
    }

    public function createProfile($un, $pwd, $name, $dob, $photo, $phone, $address, $email)
    {
        $this->userName = $un;
        $this->password = $pwd;
        $this->name = $name;
        $this->dob = $dob;
        $this->photo = $photo;
        $this->phone = $phone;
        $this->address = $address;
        $this->email = $email;
        $this->medicalHistory = null;



        $checkParam = array($this->userName);
        $check = $this->dbh->runQuery("select * from docstime.patient where userName = ?", $checkParam);
        $userRow = $check->fetch(PDO::FETCH_ASSOC);

        if($userRow['pid'] == "")
        {
            $values = ['null', $this->name, $this->dob,  $this->phone, $this->address, $this->email,
                $this->photo, $this->userName, $this->password];

            $this->insert($values);
            return true;
        }
        else
        {
            return false;
        }


    }

    public function login($temp_userName, $temp_pwd)
    {
        $hashPwd = new Hash_Pwd();
        $hashedPwd = $hashPwd->hashPwd($temp_pwd);

        $temp_un = array("$temp_userName");
        $stmt = $this->dbh->runQuery("SELECT * FROM docstime.patient WHERE userName = ?", $temp_un);

        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if($userRow['password'] == $hashedPwd)
            {
                session_start();

                $_SESSION['userID'] = $userRow['pid'];
                $_SESSION['userName'] = $userRow['userName'];
                $_SESSION['name'] = $userRow['name'];
                $_SESSION['dob'] = $userRow['dob'];
                $_SESSION['phone'] = $userRow['phone'];
                $_SESSION['address'] = $userRow['address'];
                $_SESSION['email'] = $userRow['email'];
                $_SESSION['photo'] = $userRow['photo'];
                $_SESSION['type'] = "patient";

                return true;
            }
            else
            {
                header("Location: Index.php?err=incorrectLogin");
                return false;
            }

    }

    public function uploadMedicalHistory($file, $msg, $userID)
    {
        $fileName = $file['name'];
        $fileType = $file['type'];
        $filetmp_name = $file['tmp_name'];
        $fileErr = $file['error'];
        $fileSize = $file['size'];

        echo"{$fileName}, $fileType, $filetmp_name, $fileErr, $fileSize";

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt)); // array method showing last element

        $allowed = array('pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'); // allowed extensions

        if(in_array($fileActualExt, $allowed))
        {
            if($fileErr === 0)
            {
                if($fileSize < 20000000)
                {
                    $fileNameNew = "User". $userID . "_" . uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/docs/'. $fileNameNew;
                    move_uploaded_file($filetmp_name, $fileDestination);

                    $values = ['null', $msg, $fileDestination, $userID];
                    $stmt = $this->dbh->runQuery("Insert into docstime.info values (?, ?, ?, ?)", $values);
                    return $stmt;

                    header("Location: MainPage.php?upload=succ");
                }
                else
                {
                    header("Location: MainPage.php?err=fileTooBig");
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
                    $this->dbh->runQuery("UPDATE docstime.patient SET photo = '$fileNameNew' WHERE pid = ?", array("$userID"));
                    $fileDestination = 'uploads/pics/patient/'. $fileNameNew;
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

    public function SearchDoc()
    {
        //Could transfer the code from SearchDoc.php as an enhancement
    }

    public function bookAppt($date, $time, $did, $pid)
    {
        $checkParam = array($did, $pid, $date, $time);
        $check = $this->dbh->runQuery("select * from docstime.appointments where did = ? AND pid = ? AND date = ? AND time = ?", $checkParam);

        $userRow = $check->fetch(PDO::FETCH_ASSOC);



        if($userRow['appid'] == null)
        {
            $values = ['null', $did, $pid, $date, $time];

            $stmt = $this->dbh->runQuery("Insert into docstime.appointments values (?, ?, ?, ?, ?)", $values);

            return true;
        }
        else
        {
            return false;
        }
    }

}