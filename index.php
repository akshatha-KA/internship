<?php

$name = $_GET['name'];
$contact = $_GET['contact'];
$emailID = $_GET['emailid'];
$message = $_GET['message'];

$username = "root";
$password="";
$servername = "localhost";
$database = "intern";
$tablename="websiteform";

$connection = new mysqli($servername,$username,$password,$database);
if($connection->connect_errno){
    echo"Connection issue 500";
}
else
{
    $insert = "INSERT INTO $tablename VALUES('','$name','$contact','$emailID','$message')";
    if($connection->query($insert)){
        echo "Success 200";
    }
    else
    {
        echo $connection->error;
    }

}


echo $name,$contact,$emailID,$message;
?>