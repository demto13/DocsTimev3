<?php

/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 3:36 PM
 */

// This class will give the facility to use security over passwords


class Hash_Pwd
{
    private $tempPwd;
    private $salt1;
    private $salt2;
    private $hashedpwd;

    public function __construct()
    {
        $this->salt1 = 'GHJ%rl';
        $this->salt2 = 'VKgjh4g';
    }

    public function hashPwd($tempPwd)
    {
        $this->tempPwd = $tempPwd;
        $this->hashedpwd = hash('ripemd128', "{$this->salt1}{$this->tempPwd}{$this->salt2}");
        return $this->hashedpwd;
    }
}