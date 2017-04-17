<?php

/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 12:47 PM
 */

//This class will handle queries and prepare statements to protect against sql injection


class DB_Handler
{
    protected $connect;
    protected $conn;

    public function __construct()
    {
        $this->connect = new DB_Connect();
        $this->conn = $this->connect->getConn();
    }

    public function runQuery($sqlQuery, $values)
    {
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute($values);
        return $stmt;
    }

    /*public function getSingleValue($tableName, $prop, $value, $columnName)
    {
        //$query = $this->conn->query("SELECT `$columnName` FROM `$tableName` WHERE $prop='".$value."'");
        //$f = $query->fetch();
        //$result = $f[$columnName];
        $this->runQuery();
        return $result;
    }*/

    public function disconnect()
    {
        $this->connect->disconnect();
    }


    /*public function getRow($tableInput)
    {
        $table = $this->mysql_entities_fix_string($this->conn->getConn(), $tableInput);
        $query = "select * from";
        $result = $this->conn->getConn()->query($query);

        if(!$result)
        {
            die("Database access failed: " . $this->conn->getConn()->error);
        }

        $rows = $result->num_rows;
        for ($j = 0; $j < $rows; $j++)
        {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_ASSOC);
        }
    }

    public function getRow2($tableInput, $col, $value)
    {
       $query = 'select * from ? where ? = ?';
       $stmt = $this->conn->getConn()->prepare($query);
       $stmt->bind_param('sss', $tableInput, $col, $value);
       $params = ["$tableInput", "$col", "$value"];
       $stmt->execute();

       if($this->conn->getConn()->error)
       {
           echo"$this->conn->getConn()->error_list";
       }

       if($stmt)
       {
           return true;
       }
       else
       {
           return false;
       }
    }*/




}