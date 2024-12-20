<?php

include 'db_connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $avocat_id = $_POST['avocat_id'];
$ate_avirable = $_POST['date_available'];

$query = "INSERT INTO resivation (avocat_id , date_available) values (? , ?)";

$stm = $mysqli -> prepare($query);
$stm->bind_param("is" , $avocat_id , $ate_avirable);

if ($stm ->exeute()){
    echo 'data inserte';
}else {


    echo 'errrore';
}



}




?>