<?php


$user = 'root';
$pasword = ''; //To be completed if you have set a password to root
$database = 'eshop_db'; //To be completed to connect to a database. The database must exist.
$port = 3308; //Default must be NULL to use default port
$conn = new mysqli('127.0.0.1', $user, $pasword, $database, $port);

//$conn = mysqli_connect($servername,$user,$password,$database);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
// else{
//     echo "Connected Successfully.";
// }

