<?php

/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/9/2017
 * Time: 2:31 PM
 */

require_once "../class/DB_Connect.php";
require_once "../class/DB_Handler.php";

$dbh = new DB_Handler();

$params=['null', 'Hellobello', 'Today'];
$doc2 = $dbh->runQuery("insert into info VALUES (?, ?, ?)", $params);

if($doc2)
{
    echo"YAAAYYYYY";
}
else
{
    echo":-(";
}



?>