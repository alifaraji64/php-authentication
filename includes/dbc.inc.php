<?php
$servername = 'localhost';
$dbusername = '';
$dbpassword = '';
$dbname = 'login-system';
$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
if(!$conn){
    die('connection failde'.mysqli_connect_error());
}