<?php 

$server = "localhost";
$db_user = "root";
$db_pass = "lgE09DNiM";
$db_name = "u531408_wacht";

$conn = new mysqli($server, $db_user, $db_pass, $db_name);
if($conn->connect_error){
    die('Connection failed' . $conn-connect_error);
}
?>