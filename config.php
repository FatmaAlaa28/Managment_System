<?php
$servername = "localhost";
$username = "root";
$pass = "rootroot";
$dbname = "management_system";

$connection = new mysqli($servername,$username,$pass,$dbname);

if($connection -> connect_error)
{
    die("Connection Failed: ".$connection -> connect_error);
}

?>