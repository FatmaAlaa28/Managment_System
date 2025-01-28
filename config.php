<?php
$servername = "localhost";
$username = "root";
$pass = "rootroot";
$dbname = "session4";

$connection = new mysqli($servername,$username,$pass,$dbname);

if($connection -> connect_error)
{
    die("Connection Failed: ".$connection -> connect_error);
}

?>