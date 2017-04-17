<?php

/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 3:34 PM
 */


//User_class is the parent class of Doctor and Patient providing the necessary functions for a user


abstract class User_class
{
    protected $name;
    protected $userName;
    protected $dob;
    protected $photo;
    protected $password;
    protected $dbh;
    protected $conn;

    public function getDbh()
    {
        return $this->dbh;
    }

    public function login($temp_un, $temp_pwd)
    {

    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['userID']))
        {
            return true;
        }

        return false;
    }

    public function updateProfile()
    {

    }

    public function myAppointments()
    {

    }

    public function displayProfile()
    {

    }

    public function manageProfile()
    {

    }

    public function uploadDocs()
    {

    }


}