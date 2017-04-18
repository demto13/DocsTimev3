<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/17/2017
 * Time: 12:42 PM
 */

require_once "class/DB_Handler.php";
require_once "class/DB_Handler.php";
require_once "class/User_class.php";
require_once "class/Patient.php";
require_once "class/Doctor.php";

session_start();

$dbh = new DB_Handler();
$doctor = new Doctor($dbh);

$query = "select * from docstime.doctor where did != ?";
$values = array('0');


if(isset($_POST['nameSearch']))
{
    if($_POST['nameSearch'] != "")
    {
        $name = $_POST['nameSearch'];

        $query .= " AND name = ?";
        $values[] = $name;
    }

}

if(isset($_POST['aopSearch']))
{
    if($_POST['aopSearch'] != "")
    {
        $aop = $_POST['aopSearch'];
        $query .= " AND aop = ?";
        $values[] = $aop;
    }

}

if(isset($_POST['baseSearch']))
{
    if($_POST['baseSearch'] != "")
    {
        $base = $_POST['baseSearch'];
        $query .= " AND base = ?";
        $values[] = $base;
    }

}


echo"{$query}<br/>";
foreach($values as $value)
{
    echo"value - $value<br/>";
}

    echo"whilerow = stmt->fetch echo name<br/>";

    $stmt = $dbh->runQuery($query, $values);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        if($row['photo'] != "null")
        {
            $picSource = "'uploads/pics/doctor/{$row['photo']}'";

        }
        else
        {
            $picSource = "'uploads/pics/defaultimg.jpg'";
        }

        //echo"{$picSource}";
        echo"<img class='responsive' src={$picSource} alt='profile picture'>";

        echo"{$row['name']}";

        echo <<<__END
            <form action="ViewDocProfile.php" method="post">                
                <input type='submit' value='View Profile'>
                <input type="hidden" name="docID" value="{$row['did']}">
                <input type="hidden" name="docName" value="{$row['name']}">
                <input type="hidden" name="docAop" value="{$row['aop']}">
                <input type="hidden" name="docBase" value="{$row['base']}">
                <input type="hidden" name="docYop" value="{$row['yop']}">
                <input type="hidden" name="docAboutMe" value="{$row['about']}">
                <input type="hidden" name="docPhoto" value="{$row['photo']}">
            </form>
__END;


        echo"<br />";
    }


?>

