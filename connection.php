<?php
$hostname=$_ENV["HOST_NAME"];
$username=$_ENV["USER_NAME"];
$password=$_ENV["DATABASE_PASSWORD"];
$dbname=$_ENV["DATABASE_NAME"];


$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

$host = $protocol . $_SERVER['HTTP_HOST'];

$bookurshow_url=$host;

$conn=mysqli_connect($hostname,$username,$password,$dbname);
