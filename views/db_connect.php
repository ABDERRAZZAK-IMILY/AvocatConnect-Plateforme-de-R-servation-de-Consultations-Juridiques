<?php

$host = 'localhost';
$name = 'root';
$password = '';
$db = 'avocatconnect';


$conn = mysqli_connect($host , $name , $password , $db);

if (mysqli_connect_errno()){
    die("connection filed : " . mysqli_connect_error()); 
}else{

    echo "database connect";

}

?>