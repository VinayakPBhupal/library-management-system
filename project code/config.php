<?php

$host="localhost";
$user="root";
$password="";
$db="library";

$data=mysqli_connect($host,$user,$password,$db);

if(!$data)
{
    die("connection failed");

}
?>

