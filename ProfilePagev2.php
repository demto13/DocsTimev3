<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 4/18/2017
 * Time: 12:00 PM
 */
session_start();

if ($_SESSION['searchDocResultPhoto'] != null)
{
    $photoDisplay  ="<img class='responsive' src='uploads/pics/doctor/{$_SESSION['searchDocResultPhoto']} ' alt='profile picture'>";

}
elseif($_SESSION['photo'] == null)
{
    $photoDisplay = "<img class='responsive' src='uploads/pics/defaultimg.jpg' alt='profile picture'>";
}


?>