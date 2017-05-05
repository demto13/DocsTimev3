<?php
/**
 * Created by PhpStorm.
 * User: ToSzi
 * Date: 5/4/2017
 * Time: 5:30 PM
 */

// Call the passed in function

        if(function_exists($_GET['method']))
        {
            $_GET['method']();
        }
        else
        {
            echo"Function not recognised";
        }
        // Test - getDoctors();



// List methods
function getDoctors()
{
    $conn = mysqli_connect("localhost", "root", "", "docstime");

// Check connection
    if ($conn->connect_error) {
        die("Failed to connect to MySQL: " . $conn->connect_error);
    }

    //Test - echo "Connected successfully";

    $sql = "SELECT name, aop, base, about FROM doctor";
    $result = $conn->query($sql);

// array for holding doctors' values
    $users = array();

// filling in the array with doctors' details
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
            // Test - echo "Name: " . $row["name"] . " - Area of practice: " . $row["aop"] . " " . " - Base clinic: " . $row["base"] . " " . " - About: " . $row["about"] . " " . "<br>";
        }
    } else {
        echo "0 results";
    }
//encoding to json
    $users = json_encode($users);

//echoing json content

    echo $_GET['jsoncallback'] . '' . $users . '}';

    $conn->close();
}

?>