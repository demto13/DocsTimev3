<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 12:40 PM
 */

require_once "../class/DB_Connect.php";

$conn = new DB_Connect();

if($conn->isConnected())
{
    echo"success";
}
else
{
    echo"Something went wrong";
}


$conn->disconnect();

if($conn->isConnected())
{
    echo"success";
}
else
{
    echo"<br />This is after disconnection. Should come up with this to show it is now disconnected from database.";
}



?>