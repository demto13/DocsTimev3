<?php

/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 12:30 PM
 */

//This class is to create the connection between the database and the app


class DB_Connect
{
    private $hn = '';
    private $db = 'localdb';
    private $un = '';
    private $pw = '';
    protected $conn;
    protected $isConn;

    /*public function __construct()
    {
            $this->conn = new mysqli($this->hn, $this->un, $this->pw, $this->db);

            if($this->conn->connect_error)
            {
                echo '<p>Sorry cannot connect : </p>';
                echo '<p> mysql_error()</p>';
                die ($this->conn->connect_error);
            }
            else
            {
                $this->isConn = true;
            }

    }*/

    public function __construct()
    {
        $this->conn = null;

        try
        {
            $this->conn = new PDO("mysql: host = {$this->hn}; dbname = {$this->db};", $this->un, $this->pw);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->isConn = true;
        }
        catch(PDOException $e)
        {
            echo "Failed to connect : {$e->getMessage()} <br />";
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function isConnected()
    {
        return $this->isConn;
    }

    public function disconnect()
    {
        /*$this->isConn = false;
        $this->conn->close();*/

        $this->isConn = false;
        $this->conn = null;
    }





}
