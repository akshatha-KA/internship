<?php

$nformationMessage ="";
$requestData="";
$responseData= new \stdClass();
$databaseConnectionStatus ="";
$databaseMessage="";

$servername = "localhost";
$database = "intern";
$tablename="websiteform";
$username = "root";
$password="hey";

if(isset($_POST))
{

    $name = $_GET['name'];
    $contact = $_GET['contact'];
    $emailID = $_GET['emailid'];
    $message = $_GET['message'];

    $connection = new mysqli($servername,$username,$password,$database);
if($connection->connect_errno){
    $databaseMessage= $connection ->connect_error;
    $databaseConnectionStatus="false";
    $informationMessage="500 Internal Server Error";
   }
else
   {
       $databaseMessage= $connection->connect_error;
       $databaseConnectionStatus="true";
    $insert = "INSERT INTO $tablename VALUES('','$name','$contact','$emailID','$message')";
    if($connection->query($insert)){
        $informationMessage="Data Successfully added";
   }
    else
    {
        $informationMessage="Error";
    }

}
}
else{
    $informationMessage="No data";
    $requestData = "Wrong Path";
    $databaseConnectionStatus="false";
    $databaseMessage ="Check the path";

}


$responseData->status = $databaseConnectionStatus;
$responseData->msg = $databaseMessage;
$responseData->info = $informationMessage;
$responseData->data = "Null";

echo json_encode($responseData,JSON_PRETTY_PRINT);

?>